<?php
class Tbl_documents_model extends MY_Model{
	public $_table = 'tbl_documents';
	public $primary_key = 'document_id';
	public function __construct()
	{
		parent::__construct();
	}
}