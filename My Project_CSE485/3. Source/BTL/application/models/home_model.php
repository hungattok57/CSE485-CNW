<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
// Hàm hiển thị sách cho view
public function get_detail_cm($tenchuyenmuc)
	{
		$this->db->select('*');
		$this->db->where('tenchuyenmuc', $tenchuyenmuc);
		$this->db->order_by('id','desc'); // Xắp xếp
		$show=$this->db->get('sach');
		$show=$show->result_array();// Biến $show thành mảng
		return $show;
	}
		public function show($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->order_by('id','desc'); // Xắp xếp
		$show=$this->db->get('sach');
		$show=$show->result_array();// Biến $show thành mảng
		return $show;
	}
}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */