<?php
class Tbl_jobs_model extends MY_Model{
	public $_table = 'tbl_jobs';
	public $primary_key = 'job_id';
	public $belongs_to = array('store' => array( 'model' => 'Db/tbl/tbl_stores_model','primary_key' => 'store_id' ) );
	public function __construct()
	{
		parent::__construct();
	}


}