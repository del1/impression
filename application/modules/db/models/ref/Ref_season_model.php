<?php
class Ref_season_model extends MY_Model{
	public $_table = 'ref_seasons';
	public $primary_key = 'season_id';
	public function __construct()
	{
		parent::__construct();
	}
}