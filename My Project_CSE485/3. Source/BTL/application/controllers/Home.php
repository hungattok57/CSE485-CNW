<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->view('home',$dulieu);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */