<?php
class Lnk_user_to_favorites_model extends MY_Model{
	public $_table = 'lnk_user_to_favorites';
	public $primary_key = 'utf_id';
	public function __construct()
	{
		parent::__construct();
	}

/*	public function get_favorites_product_info($product_id_array)
	{
		if(is_array($product_id_array))
		{
		return $this->db->select('tbl_documents.doc_path,lnk_product_to_documents.product_id,tbl_products.product_name')
			->join('tbl_documents','lnk_product_to_documents.document_id = tbl_documents.document_id','left')
			->join('tbl_products','lnk_product_to_documents.product_id = tbl_products.product_id','left')
			->group_by('lnk_product_to_documents.product_id')
			->where("tbl_documents.is_active",true)
			->where("tbl_products.is_active",true)
			->where_in("lnk_product_to_documents.product_id",$product_id_array)
			->get('lnk_product_to_documents')->result_array();
		}
	}*/

	public function get_fav_produt_with_prodname($user_id)
	{
		return $this->db->select('tbl_products.product_name,tbl_products.product_id')
			->join('tbl_products','lnk_user_to_favorites.product_id = tbl_products.product_id')
			->get_where('lnk_user_to_favorites',array("tbl_products.is_active" =>true,"lnk_user_to_favorites.user_id"=> $user_id))->result_array();
	}

	public function most_popular_products()
	{
		return $this->db->select('tbl_products.product_name,tbl_products.product_id,count(user_id) AS likes', false)
		->join('tbl_products','lnk_user_to_favorites.product_id = tbl_products.product_id')
		->group_by('lnk_user_to_favorites.product_id')->order_by('likes','ASC')->get('lnk_user_to_favorites')->result_array(); 
	}
}