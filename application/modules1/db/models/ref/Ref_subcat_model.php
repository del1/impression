<?php
class Ref_subcat_model extends MY_Model{
	public $_table = 'ref_subcat_to_cat';
	public $primary_key = 'sub_cat_id';
	public $belongs_to = array('cat' => array( 'model' => 'Db/ref/ref_catagory_model','primary_key' => 'cat_id' ) );
	public function __construct()
	{
		parent::__construct();
	}

	public function get_subcats_with_cat()
	{
		return $this->db->select('ref_subcat_to_cat.*,ref_catagory.cat_name')
			->join('ref_catagory','ref_subcat_to_cat.cat_id = ref_catagory.cat_id')
			->get_where('ref_subcat_to_cat',array("ref_subcat_to_cat.is_active" =>true,"ref_catagory.is_active"=>true))->result_array();
	}
}