<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	// Hàm xử lý thêm sách
	public function add_books($tensach,$tacgia,$tenchuyenmuc,$trichdan,$gioithieu,$anhsach,$filesach)
	{
		// Gán dữ liệu lấy từ view thành mảng
		$dulieu = array(
			'tensach' =>$tensach ,
			'tacgia' =>$tacgia ,
			'tenchuyenmuc' =>$tenchuyenmuc ,
			'trichdan' =>$trichdan ,
			'gioithieu' =>$gioithieu ,
			'anhsach' =>$anhsach ,
			'filesach' =>$filesach
		);
		// Hàm xử lý insert
		$this->db->insert('sach', $dulieu);   
		return $this->db->insert_id();
	}
	// Hàm hiện thị sách
	public function show()
	{
		$this->db->select('*');
		$this->db->order_by('id','desc'); // Sắp xếp
		$show=$this->db->get('sach');
		$show=$show->result_array();// Biến $show thành mảng
		return $show;
	}
	// Hàm xóa sách
	public function delete($id)
	{
		$this->db->where('id', $id);
	}
	// Hàm show chuyên mục
	public function show_cm()
	{
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$show=$this->db->get('chuyenmuc');
		//Select from db theo id và thứ tự desc, get chuyên mục from db, trả về một mảng
		$show=$show->result_array();
		return $show;
	}
	// Hàm thêm chuyên mục
	public function add_cm($tenchuyenmuc)
	{
		//Truyền vào biến $tenchuyenmuc, tạo 1 mảng có key là tenchuyenmuc trùng với tên trường trong CSDL và value là biến $tenchuyenmuc truyền vào
		$chuyenmuc= array('tenchuyenmuc' =>$tenchuyenmuc );
		$this->db->insert('chuyenmuc', $chuyenmuc);
		//Insert mảng ở trên vào bảng chuyenmuc trong  CSDL  
		return $this->db->insert_id(); 
		}
	// Lấy về dữ liệu để sửa
	public function getData($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$dulieu=$this->db->get('sach');
		$dulieu=$dulieu->result_array();
		return $dulieu;
	}
	// Hàm sửa sách
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
	// Hàm xóa sách
	public function xoa($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('sach');
		return 1;
	}
	// Lấy vào id chuyên mục để sửa
	public function dir_edit_show($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu=$this->db->get('chuyenmuc');
		$dulieu=$dulieu->result_array();
		return $dulieu;

	}
	// Hàm sửa chuyên mục
	public function dir_edit_act($id,$tenchuyenmuc)
	{
		$object= array('id' => $id ,'tenchuyenmuc' => $tenchuyenmuc );
		$this->db->where('id', $id);
		$ketqua=$this->db->update('chuyenmuc', $object);
		return 1;
	}
	// Hàm xóa chuyên mục
	public function xoa_dir($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('chuyenmuc');
		return 1;
	}
	// Hàm checklogin
	public function cklogin($ten,$pass)
	{
		$dulieu=array('id' => '1',
			'ten' =>$ten ,
			'password' => $pass );
		$ten0=$dulieu['ten'];
		$pass0=$dulieu['password'];
		$this->db->select('*');
		$ketqua=$this->db->get('user');
		$ketqua=$ketqua->result_array();
	foreach ($ketqua as $key => $value) {
		$ten1=$value['ten'];
		$pass1=$value['password'];
	}
	$check=0;
	if ($ten0==$ten1 && $pass0==$pass1) {
		$check=1;
	}
	else {
		$check=0;
	}
	return $check;
}
}

	/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */