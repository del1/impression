<?php
class Tbl_reset_links_model extends MY_Model{
	public $_table = 'tbl_resent_links';
	public $primary_key = 'link_id';
	public function __construct()
	{
		parent::__construct();
	}
}