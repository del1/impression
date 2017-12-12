<?php
class Tbl_stores_model extends MY_Model{
	public $_table = 'tbl_stores';
	public $primary_key = 'store_id';
	public function __construct()
	{
		parent::__construct();
	}
}