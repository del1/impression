<?php
class Tbl_users_model extends MY_Model{
	public $_table = 'tbl_users';
	public $primary_key = 'user_id';
	public function __construct()
	{
		parent::__construct();
	}
}