<?php
class Lnk_product_to_documents_model extends MY_Model{
	public $_table = 'lnk_product_to_documents';
	public $primary_key = 'ptd_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_product_images($product_id)
	{
		if(!is_array($product_id)){
		return $this->db->select('tbl_documents.*')
			->join('tbl_documents','lnk_product_to_documents.document_id = tbl_documents.document_id')
			->get_where('lnk_product_to_documents',array("lnk_product_to_documents.product_id" => $product_id,"tbl_documents.is_active"=>true))->result_array();
		}else{
			return $this->db->select('tbl_documents.doc_path,lnk_product_to_documents.product_id')
			->join('tbl_documents','lnk_product_to_documents.document_id = tbl_documents.document_id')
			->group_by('lnk_product_to_documents.product_id')
			->where("tbl_documents.is_active",true)
			->where_in("lnk_product_to_documents.product_id",$product_id)
			->get('lnk_product_to_documents')->result_array();
		}
	}

	public function get_product_images_nactive($product_id)
	{
		if(!is_array($product_id)){
		return $this->db->select('tbl_documents.*')
			->join('tbl_documents','lnk_product_to_documents.document_id = tbl_documents.document_id')
			->get_where('lnk_product_to_documents',array("lnk_product_to_documents.product_id" => $product_id))->result_array();
		}else{
			return $this->db->select('tbl_documents.doc_path,lnk_product_to_documents.product_id')
			->join('tbl_documents','lnk_product_to_documents.document_id = tbl_documents.document_id')
			->group_by('lnk_product_to_documents.product_id')
			->where_in("lnk_product_to_documents.product_id",$product_id)
			->get('lnk_product_to_documents')->result_array();
		}
	}
	
}