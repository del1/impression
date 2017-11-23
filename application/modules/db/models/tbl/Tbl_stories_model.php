<?php
class Tbl_stories_model extends MY_Model{
	public $_table = 'tbl_stories';
	public $primary_key = 'story_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_stories_by_image()
	{
		return $this->db->select('tbl_stories.b_fname,tbl_stories.g_fname,tbl_stories.style, tbl_stories.weddingstory_desc,tbl_documents.doc_path')
		->join('lnk_story_to_images','tbl_stories.story_id = lnk_story_to_images.story_id','left')
		->join('tbl_documents','lnk_story_to_images.image_id = tbl_documents.document_id','left')
		->group_by('lnk_story_to_images.story_id')
		->where("tbl_documents.is_active",true)
		->where("tbl_stories.is_active",true)
		->get('tbl_stories')->result_array();
	}
}