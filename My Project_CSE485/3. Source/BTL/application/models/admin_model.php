<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function add_books($tensach,$tacgia,$tenchuyenmuc,$trichdan,$gioithieu,$anhsach,$filesach)
	{
		$dulieu = array(
			'tensach' =>$tensach ,
			'tacgia' =>$tacgia ,
			'tenchuyenmuc' =>$tenchuyenmuc ,
			'trichdan' =>$trichdan ,
			'gioithieu' =>$gioithieu ,
			'anhsach' =>$anhsach ,
			'filesach' =>$filesach
		);
		$this->db->insert('sach', $dulieu);   
		return $this->db->insert_id();
	}
	public function show()
	{
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$show=$this->db->get('sach');
		$show=$show->result_array();
		return $show;
	}
	public function delete($id)
	{
		$this->db->where('id', $id);
	}
	public function show_cm()
	{
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$show=$this->db->get('chuyenmuc');
		$show=$show->result_array();
		return $show;
	}
	public function add_cm($tenchuyenmuc)
	{
		$chuyenmuc= array('tenchuyenmuc' =>$tenchuyenmuc );
		$this->db->insert('chuyenmuc', $chuyenmuc);   
		return $this->db->insert_id();

	}
	public function getData($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$dulieu=$this->db->get('sach');
		$dulieu=$dulieu->result_array();
		return $dulieu;
	}
	public function book_edit($id,$ten,$tacgia,$chuyenmuc,$trichdan,$gioithieu,$anhsach,$filesach)
	{
		$dulieu = array(
			'id'=>$id,
			'tensach' =>$ten , 
			'tacgia' =>$tacgia , 
			'tenchuyenmuc' =>$chuyenmuc , 
			'trichdan' =>$trichdan , 
			'gioithieu' =>$gioithieu , 
			'anhsach' =>$anhsach , 
			'filesach' =>$filesach 
		);
		$this->db->where('id', $id);
		$this->db->update('sach', $dulieu);
		return 1;
	}
	public function xoa($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('sach');
		return 1;
	}
	public function dir_edit_show($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu=$this->db->get('chuyenmuc');
		$dulieu=$dulieu->result_array();
		return $dulieu;

	}
	public function dir_edit_act($id,$tenchuyenmuc)
	{
		$object= array('id' => $id ,'tenchuyenmuc' => $tenchuyenmuc );
		$this->db->where('id', $id);
		$ketqua=$this->db->update('chuyenmuc', $object);
		return 1;
	}
	public function xoa_dir($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('chuyenmuc');
		return 1;
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */