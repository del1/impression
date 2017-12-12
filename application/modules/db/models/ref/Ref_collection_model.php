<?php
class Ref_collection_model extends MY_Model{
	public $_table = 'ref_collection';
	public $primary_key = 'collection_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_list_with_images($collection_id='')
	{
		if($collection_id)
		{
			return $this->db->select('ref_collection.*,tbl_documents.doc_path')
			->join('tbl_documents','ref_collection.image_id = tbl_documents.document_id','left')
			->get_where('ref_collection',array("ref_collection.collection_id" =>$collection_id))->result_array();
		}else{
			return $this->db->select('ref_collection.*,tbl_documents.doc_path')
			->join('tbl_documents','ref_collection.image_id = tbl_documents.document_id','left')
			->get_where('ref_collection',array("ref_collection.is_active" =>true))->result_array();
		}
		
	}
}