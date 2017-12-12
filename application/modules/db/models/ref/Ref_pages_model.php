<?php
class Ref_pages_model extends MY_Model{
	public $_table = 'ref_pages';
	public $primary_key = 'page_id';
    public $has_many = array( 'sections' => array( 'model' => 'Db/tbl/tbl_page_sections_model','primary_key'=>'ps_id' ) );
	public function __construct()
	{
		parent::__construct();
	}

	public function get_section_by_pageId($page_id)
	{
	    return $this->db->select('tbl_page_sections.*,ref_pages.page_name')
				->join('tbl_page_sections','ref_pages.page_id = tbl_page_sections.page_id')
				->get_where('ref_pages',array("ref_pages.page_id" => $page_id))->result_array();
	}
}