<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_sach extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	// Hàm lấy vào thông tin sách

	public function book($id)
{
	$this->load->model('admin_model');
	$edit=$this->admin_model->getData($id);
	// Show danh sách thư mục
	$this->load->model('admin_model');
	$show=$this->admin_model->show_cm();
		// Biến $show thành mảng
	$edit_book = array(
		'dulieuedit' => $edit, 
		'dulieucm' =>$show );
	$this->load->view('edit_book',$edit_book);
}
public function sua_sach()
{
// Post dữ liệu từ form Edit vào Controllers
	$id=$this->input->post('id');
	$ten=$this->input->post('tensach');
	$tacgia=$this->input->post('tacgia');
	$chuyenmuc=$this->input->post('tenchuyenmuc');
	$trichdan=$this->input->post('trichdan');
	$gioithieu=$this->input->post('gioithieu');
	
	



// Xử lý Upload File 
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
			//echo "<br />File đã tồn tại ! Vui lòng tải file mới";
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
			//echo "<br />Chỉ có thể upload file ảnh.";
		$uploadOk = 0;
	}
		// Kiểm tra biến kiểm tra
	if ($uploadOk == 0) {
		//echo "<br />Upload thất bại. Kiểm tra lại các bước";
	// Tiến hành Upload khi biến kiểm tra bằng 1
	} else {
		if (move_uploaded_file($_FILES["anhsach"]["tmp_name"], $target_file)) {
			//
		} else {
			//
		}
	}
	  $anhsach=basename( $_FILES["anhsach"]["name"]); // Bởi vì giá trị ban đầu khi ấn upload đã bao gồm url rồi nên chỉ cần lấy basename thôi (set value là url rồi)
	if ($anhsach) {
		$anhsach=base_url()."images/".basename( $_FILES["anhsach"]["name"]);
	}
	else{
		$anhsach=$this->input->post('anhsach_1');
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

			//$filesach=$this->input->post('filesach_1');
		}

	}

	else {

		// echo "Chỉ có thể upload file sách(pdf/prc/epub/mobi)<br>";

	}
	$filesach=basename( $_FILES['filesach']['name']); // Tương tự ảnh
	if ($filesach) {
		$filesach=base_url()."sach_data/".basename( $_FILES['filesach']['name']);
	}
	else{
		$filesach=$this->input->post('filesach_1');
	}
	// Truyền dữ liệu vào xử lý model

	$this->load->model('admin_model');	
	$ketqua_edit=$this->admin_model->book_edit($id,$ten,$tacgia,$chuyenmuc,$trichdan,$gioithieu,$anhsach,$filesach);
	if ($ketqua_edit=1) {
		//$this->load->view('edit_success');
	}
	else{
		echo "Lỗi rồi nhá";
	}
}
}

/* End of file Edit_sach.php */
/* Location: ./application/controllers/Edit_sach.php */