<?php
class Lnk_product_to_subcat_model extends MY_Model{
	public $_table = 'lnk_product_to_subcat';
	public $primary_key = 'pts_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function select_active_product($sub_cat_id)
	{
		return $this->db->select('lnk_product_to_subcat.product_id')
			->join('tbl_products','lnk_product_to_subcat.product_id = tbl_products.product_id')
			->get_where('lnk_product_to_subcat',array("tbl_products.is_active" =>true,"lnk_product_to_subcat.sub_cat_id"=> $sub_cat_id))->result();
	}
}