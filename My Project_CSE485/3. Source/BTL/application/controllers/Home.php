<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Load dữ liệu sách vào controllers
		$this->load->model('admin_model');
		$show=$this->admin_model->show();
		// Load dữ liệu chuyên mục vào controller
		$this->load->model('admin_model');
		$showcm=$this->admin_model->show_cm();
		// Biến thành mảng
		$dulieu= array('dulieu' => $show ,
		'dulieucm' => $showcm );
		// Truyền dữ liệu sang view
		$this->load->view('home',$dulieu);
	}
	public function header()
	{
		$this->load->view('header');
	}
public function view_sp($id)
	{
		$this->load->model('home_model');
		$ketqua=$this->home_model->show($id);
		$ketqua = array('ketqua' => $ketqua, );
		$this->load->view('header');
		$this->load->view('view_sp',$ketqua);
	}
	public function gioithieu()
	{
		$this->load->view('header');
		$this->load->view('gioithieu');
	}
	public function contact()
	{
		$this->load->view('header');
		$this->load->view('contact');
	}
	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */