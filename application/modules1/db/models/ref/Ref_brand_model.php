<?php
class Ref_brand_model extends MY_Model{
	public $_table = 'ref_brands';
	public $primary_key = 'brand_id';
	public function __construct()
	{
		parent::__construct();
	}
}