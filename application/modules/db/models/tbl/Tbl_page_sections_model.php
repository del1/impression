<?php
class Tbl_page_sections_model extends MY_Model{
	public $_table = 'tbl_page_sections';
	public $primary_key = 'ps_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function update_about_us($data)
	{
		if(is_array($data) && !empty($data))
		{
			foreach ($data as $key => $value) {
				$input['section_desc']=$value;
				$this->db->where('section_name',$key); 
        		$this->db->update('tbl_page_sections',$input);
			}
		}
	}
}