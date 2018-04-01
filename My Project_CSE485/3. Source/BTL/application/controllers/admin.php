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
	$show=$this->admin_model->show_cm();
		// Biến $show thành mảng
	$dulieucm = array('dulieucm' =>$show );
	$this->load->view('admin_dir',$dulieucm);

}

public function add_dir()
{
	
	$tenchuyenmuc=$this->input->post('tenchuyenmuc');
	$this->load->model('admin_model');
	$ketqua=$this->admin_model->add_cm($tenchuyenmuc);
	if ($ketqua) {
		$this->load->view('add_dir_success');
	}
	else{
		echo "Thêm thất bại. Vui lòng kiểm tra lại code !";
	}
}
public function delete($id)
{
	$this->load->model('admin_model');
	$xoa=$this->admin_model->xoa($id);
	if ($xoa=1) {
		$this->load->view('del_success');
	}
}
public function edit_dir_in($id)
{
	$this->load->model('admin_model');
	$dulieu=$this->admin_model->dir_edit_show($id);
	$dulieu= array('dulieucmedit' => $dulieu);
	$this->load->view('admin_dir_edit',$dulieu);
}
public function edit_dir()
{
	$id=$this->input->post('id');
	$tenchuyenmuc=$this->input->post('tenchuyenmuc');
	$this->load->model('admin_model');
	$ketqua=$this->admin_model->dir_edit_act($id,$tenchuyenmuc);
	if ($ketqua=1) {
		$this->load->view('edit_dir_success');
	}
	else{
		echo "Lỗi rồi nhé !";
	}
}
public function del_dir($id)
{
	$this->load->model('admin_model');
	$xoa=$this->admin_model->xoa($id);
	if ($xoa=1) {
		$this->load->view('del_success');
	}
}
public function login()
{
	$this->load->view('login');
}
}
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */