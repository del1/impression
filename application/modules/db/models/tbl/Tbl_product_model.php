<?php
class Tbl_product_model extends MY_Model{
	public $_table = 'tbl_products';
	public $primary_key = 'product_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_product()
	{
		return $this->db->select('tbl_products.*,ref_collection.collection_name, ref_brands.brand_name,ref_seasons.season')
			->join('ref_collection','tbl_products.collection_id = ref_collection.collection_id')
			->join('ref_brands','tbl_products.brand_id = ref_brands.brand_id')
			->join('ref_seasons','tbl_products.season_id = ref_seasons.season_id')
			->get('tbl_products')->result();
	}

	public function get_product_details($product_id)
	{
		if(is_array($product_id))
		{
			return $this->db->select('tbl_products.*,ref_collection.collection_name, ref_brands.brand_name,ref_seasons.season')
			->join('ref_collection','tbl_products.collection_id = ref_collection.collection_id')
			->join('ref_brands','tbl_products.brand_id = ref_brands.brand_id')
			->join('ref_seasons','tbl_products.season_id = ref_seasons.season_id')
			->where_in("tbl_products.product_id",$product_id)
			->get('tbl_products')->result();

		}else{
			return $this->db->select('tbl_products.*,ref_collection.collection_name, ref_brands.brand_name,ref_seasons.season')
			->join('ref_collection','tbl_products.collection_id = ref_collection.collection_id')
			->join('ref_brands','tbl_products.brand_id = ref_brands.brand_id')
			->join('ref_seasons','tbl_products.season_id = ref_seasons.season_id')
			->get('tbl_products')->result();
		}
	}

	public function get_product_list_within($product_id)
	{
		return $this->db->select('tbl_products.*')
			->where_in("product_id",$product_id)
			->get('tbl_products')->result();
	}

	
}