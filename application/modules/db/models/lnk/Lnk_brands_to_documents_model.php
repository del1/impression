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
}