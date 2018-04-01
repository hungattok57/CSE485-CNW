<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class view_cm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}
// public function detail_cm()
// {
// 	$this->load->view('header'); // Thêm header
// 	$this->load->view('view_detail_cm');//Load trang view
// 	$this->load->model('admin_model');
// 	$this->show

// }
public function detail_cm($tenchuyenmuc)
{
	$this->load->view('header'); // Thêm header
	$this->load->model('home_model');
	$ketqua=$this->home_model->get_detail_cm($tenchuyenmuc);
	$ketqua = array('ketquaview' => $ketqua );
	$this->load->view('view_detail_cm',$ketqua);
}

}

/* End of file view_cm.php */
/* Location: ./application/controllers/view_cm.php */