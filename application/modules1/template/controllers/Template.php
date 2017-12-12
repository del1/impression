<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends Del {

	public function __construct() 
	{
		parent::__construct();
		//$this->load->library('parser');
	}


	public function impression_Template($view, $data) {
		$data['collection_list']=$this->ref_coll->select('collection_id,collection_name')->get_many_by('is_active', 1);
		$data['store_list']=$this->store->select('store_id,store_name')->get_many_by('is_active', 1);
	  	$this->load->view('Header',$data);
		$this->load->view($view,$data);
		$this->load->view('Footer');
	}

	public function admin_template($view, $data) {
	  	$this->load->view('Admin/Admin_header',$data);
	  	$this->load->view('Admin/Admin_left_sidebar',$data);
		$this->load->view($view,$data);
		$this->load->view('Admin/Admin_footer');
	}
}