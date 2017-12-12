<?php
class Tbl_insta_model extends MY_Model{
	public $_table = 'tbl_insta';
	public $primary_key = 'insta_link_id';
	public function __construct()
	{
		parent::__construct();
	}
}