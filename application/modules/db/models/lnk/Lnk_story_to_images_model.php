<?php
class Lnk_story_to_images_model extends MY_Model{
	public $_table = 'lnk_story_to_images';
	public $primary_key = 'sti_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_story_images($story_id)
	{
		return $this->db->select('tbl_documents.*')
			->join('tbl_documents','lnk_story_to_images.image_id = tbl_documents.document_id')
			->get_where('lnk_story_to_images',array("lnk_story_to_images.story_id" =>$story_id))->result_array();
	}
}