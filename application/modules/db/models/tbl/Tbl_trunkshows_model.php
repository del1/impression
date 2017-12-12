<?php
class Tbl_trunkshows_model extends MY_Model{
	public $_table = 'tbl_trunkshows';
	public $primary_key = 'event_id';
	public $belongs_to = array('store' => array( 'model' => 'Db/tbl/tbl_stores_model','primary_key' => 'store_id' ) );
	public function __construct()
	{
		parent::__construct();
	}


	public function get_events_by_storeId($store_id)
	{
		return $this->db->select('tbl_trunkshows.*,tbl_stores.store_name')
			->join('tbl_stores','tbl_trunkshows.store_id = tbl_stores.store_id')
			->get_where('tbl_trunkshows',array("tbl_trunkshows.store_id" => $store_id))->result_array();
	}

	public function get_active_events_by_store($store_id)
	{
		return $this->db->select('tbl_trunkshows.*')->order_by('start_date','ASC')
			->get_where('tbl_trunkshows',array("tbl_trunkshows.store_id" => $store_id,"is_active"=>true))
			->result_array();
	}

	public function get_future_events_by_store()
	{
		$today=date("Y-m-d");
		$arr=array('is_active'=>true,'start_date >='=>$today);
		return $this->db->select('tbl_trunkshows.*')->order_by('start_date','ASC')
			->get_where('tbl_trunkshows',$arr)
			->result_array();
	}
}