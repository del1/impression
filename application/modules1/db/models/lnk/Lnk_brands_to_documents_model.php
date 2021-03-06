<?php
class Lnk_brands_to_documents_model extends MY_Model{
	public $_table = 'lnk_brands_to_images';
	public $primary_key = 'bti_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_brand_images($brand_id)
	{
		return $this->db->select('tbl_documents.*')
			->join('tbl_documents','lnk_brands_to_images.image_id = tbl_documents.document_id')
			->get_where('lnk_brands_to_images',array("lnk_brands_to_images.brand_id" => $brand_id))->result_array();
	}

	public function get_unique_brand_images($brand_ids='')
	{
		if(!empty($brand_ids) && is_array($brand_ids))
		{
			return $this->db->select('tbl_documents.doc_path,lnk_brands_to_images.image_id,lnk_brands_to_images.brand_id')
			->join('tbl_documents','lnk_brands_to_images.image_id = tbl_documents.document_id')
			->group_by('lnk_brands_to_images.brand_id')
			->where("tbl_documents.is_active",true)
			->where_in("lnk_brands_to_images.brand_id",$brand_ids)
			->get('lnk_brands_to_images')->result();
		}
	}
}