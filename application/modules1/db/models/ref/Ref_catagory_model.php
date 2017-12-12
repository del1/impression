<?php
class Ref_catagory_model extends MY_Model{
	public $_table = 'ref_catagory';
	public $primary_key = 'cat_id';
	public $has_many = array( 'subcat' => array( 'model' => 'Db/ref/ref_subcat_model','primary_key'=>'sub_cat_id' ) );
	public function __construct()
	{
		parent::__construct();
	}
}