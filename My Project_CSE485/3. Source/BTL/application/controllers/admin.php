<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Load dữ liệu vào controllers
		$this->load->model('admin_model');
		$show=$this->admin_model->show();
		// Biến $show thành mảng
		$dulieu = array('dulieu' =>$show );
		$showcm=$this->admin_model->show_cm();
		// Biến $show thành mảng
		$dulieucm = array('dulieucm' =>$showcm,
			'dulieu' =>$show  );
		$this->load->view('admin',$dulieucm);
		

	}
	public function add_book()
	{

		// 			Upload file ảnh			\\
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["anhsach"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		//  	Kiểm tra xem ảnh là thật hay giả \\
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["anhsach"]["tmp_name"]);
			if($check !== false) {
				echo "<br />File là ảnh - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "<br />File không phải là ảnh.";
				$uploadOk = 0;
			}
		}
		// Kiểm tra sự tồn tại của file
		if (file_exists($target_file)) {
			echo "<br />File đã tồn tại ! Vui lòng tải file mới";
			$uploadOk = 0;
		}
		// Kiểm tra kích thước file
		if ($_FILES["anhsach"]["size"] > 500000) {
			echo "<br />File quá lớn.";
			$uploadOk = 0;
		}
		// Định dảng ảnh cho phép
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "<br />Chỉ có thể upload file ảnh.";
		$uploadOk = 0;
	}
		// Kiểm tra biến kiểm tra
	if ($uploadOk == 0) {
		echo "<br />Upload thất bại. Kiểm tra lại các bước";
	// Tiến hành Upload khi biến kiểm tra bằng 1
	} else {
		if (move_uploaded_file($_FILES["anhsach"]["tmp_name"], $target_file)) {
			$anhsach=base_url()."images/".basename( $_FILES["anhsach"]["name"]);
		} else {
			echo "Upload Thất Bại";
		}
	}

	// Upload Sách \\
	$targetfolder = "sach_data/"; // Set thư mục chứa sách
	$targetfolder = $targetfolder . basename( $_FILES['filesach']['name']) ; // Link sách

	$ok=1;

	$file_type = strtolower(pathinfo($targetfolder,PATHINFO_EXTENSION)); // Set biến kiểu file
// Kiểm tra file type
	if ($file_type=="pdf" || $file_type=="epub" || $file_type=="mobi") {

		if(move_uploaded_file($_FILES['filesach']['tmp_name'], $targetfolder))

		{
			$filesach=base_url()."sach_data/".basename( $_FILES['filesach']['name']);

			//echo "The file ". basename( $_FILES['file']['name']). " is uploaded";

		}

		else {

			//echo "Lỗi";
		}

	}

	else {

		echo "Chỉ có thể upload file sách(pdf/prc/epub/mobi)<br>";

	}
	// Lấy dữ liệu từ form  trong View
	$tensach=$this->input->post('tensach');
	$tacgia=$this->input->post('tacgia');
	$tenchuyenmuc=$this->input->post('tenchuyenmuc');
	$trichdan=$this->input->post('trichdan');
	$gioithieu=$this->input->post('gioithieu');
	$filesach=base_url()."sach_data/".basename( $_FILES['filesach']['name']);
	$anhsach=base_url()."images/".basename( $_FILES["anhsach"]["name"]);

		// Load Model sang Controll
	$this->load->model('admin_model');
	$ketqua=$this->admin_model->add_books($tensach,$tacgia,$tenchuyenmuc,$trichdan,$gioithieu,$anhsach,$filesach);
	if ($ketqua) {
		$this->load->view('add_success');
	}
	// Show Dữ liệu ra view
}
public function admin_dir()
{
	// Load dữ liệu vào controllers
	$this->load->model('admin_model');
	// Load hàm xử lý show cm
	$show=$this->admin_model->show_cm();
		// Biến $show thành mảng
	$dulieucm = array('dulieucm' =>$show );
	// Truyền dữ liệu vào view
	$this->load->view('admin_dir',$dulieucm);

}

public function add_dir()
{
	// Lấy tên chuyên mục từ form
	$tenchuyenmuc=$this->input->post('tenchuyenmuc');
	// Load model xử lý
	$this->load->model('admin_model');
	// Gọi hàm xử lý trong model
	$ketqua=$this->admin_model->add_cm($tenchuyenmuc);
	// Kiểm tra 
	if ($ketqua) {
		$this->load->view('add_dir_success');// Load sang view
	}
	else{
		echo "Thêm thất bại. Vui lòng kiểm tra lại code !";
	}
}
// Xóa sách
public function delete($id)
{
	// Load model 
	$this->load->model('admin_model');
	// Load hàm xử lý xóa sách
	$xoa=$this->admin_model->xoa($id);
	// Kiểm tra
	if ($xoa=1) {
		$this->load->view('del_success'); // Load sang view
	}
}
// Lấy vào dữ liệu sửa chuyên mục từ form
public function edit_dir_in($id)
{
	// Load model 
	$this->load->model('admin_model');
	// Load hàm xử lý
	$dulieu=$this->admin_model->dir_edit_show($id);
	// Biến $dulieu thành mảng
	$dulieu= array('dulieucmedit' => $dulieu);
	// Truyền $dulieu vào view
	$this->load->view('admin_dir_edit',$dulieu);
}
// Hàm thực thi sửa chuyên mục
public function edit_dir()
{
	// Lấy dữ liệu từ form
	$id=$this->input->post('id');
	$tenchuyenmuc=$this->input->post('tenchuyenmuc');
	// Load model
	$this->load->model('admin_model');
	// Load hàm xử lý
	$ketqua=$this->admin_model->dir_edit_act($id,$tenchuyenmuc);
	// Kiểm tra
	if ($ketqua=1) {
		$this->load->view('edit_dir_success');// Load sang view
	}
	else{
		echo "Lỗi rồi nhé !";
	}
}
// Hàm xóa chuyên mục
public function del_dir($pt)
{
	// Lấy model
	$this->load->model('admin_model');
	// load hàm thực thi
	$xoa=$this->admin_model->xoa($pt);
	if ($xoa=1) {
		$this->load->view('del_success'); // TRuyền sang view
	}
}
// Hàm xử lý đăng nhập
public function login()
{
	$this->load->view('login');
}
public function login_act()
{
	// Lấy dữ liệu từ form đăng nhập
	$ten=$this->input->post('ten');
	$pass=$this->input->post('pass');
	// Load model và hàm thực thi
	$this->load->model('admin_model');
	$ketqua=$this->admin_model->cklogin($ten,$pass);
	// var_dump($ketqua);
	if ($ketqua==1) {
		// $array = array(
		// 	'ten' => $ten,
		// 	'password' => $pass,
		// );
		
		// $this->session->set_userdata( $array );
	}
	else{
		echo "Đăng nhập thất bại";
	}
	
}
}
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */