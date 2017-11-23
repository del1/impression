<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."third_party/MX/Controller.php";
/*
//using other controller methods
//$data['message1']=modules::load('User/User/')->playSessionValue('unset','message1');

*/
class Del extends MX_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('db/ref/Ref_collection_model','ref_coll');
		$this->load->model('db/ref/Ref_brand_model','ref_brand');
		$this->load->model('db/ref/Ref_catagory_model','ref_cat');
		$this->load->model('db/ref/Ref_subcat_model','ref_subcat');
		$this->load->model('db/ref/Ref_season_model','ref_season');
		$this->load->model('db/ref/Ref_pages_model','ref_pages');

		$this->load->model('db/lnk/Lnk_product_to_subcat_model','lnk_produt_to_subcat');
		$this->load->model('db/lnk/Lnk_product_to_documents_model','lnk_produt_to_docs');
		$this->load->model('db/lnk/Lnk_user_to_favorites_model','lnk_usr_to_fav');
		$this->load->model('db/lnk/Lnk_story_to_images_model','lnk_story_to_docs');
		$this->load->model('db/lnk/Lnk_brands_to_documents_model','lnk_brands_to_docs');

		$this->load->model('db/tbl/Tbl_stores_model','store');
		$this->load->model('db/tbl/Tbl_stories_model','stories');
		$this->load->model('db/tbl/Tbl_page_sections_model','tbl_pages');
		$this->load->model('db/tbl/Tbl_trunkshows_model','tbl_trunkshows');
		$this->load->model('db/tbl/Tbl_jobs_model','tbl_jobs');
		$this->load->model('db/tbl/Tbl_product_model','tbl_product');
		$this->load->model('db/tbl/Tbl_users_model','users');
		$this->load->model('db/tbl/Tbl_documents_model','documents');
		$this->load->model('db/tbl/Tbl_insta_model','insta');
		
		
		$auth_user = $this->session->get_userdata('userdata');
		if(@$auth_user['User_Id']){
			/*$this->userId=$auth_user['User_Id'];
			$this->userTypeId=$auth_user['User_Type_Id'];
			$this->userEmailId=$auth_user['Email_Address'];
			$this->userName=$auth_user['Username'];*/
		}
	}
	public function mprint($variable)
	{
		echo '<PRE>'.htmlspecialchars(print_r($variable, true)).'</PRE>';
		flush();
		die;
	}
	public function sprint($variable)
	{
		echo '<PRE>'.htmlspecialchars(print_r($variable, true)).'</PRE>';
		flush();
	}

	public function updateLog($artcid,$msg){
		// updated by divya 18 july
		$aArt=str_pad($artcid, 6, '0', STR_PAD_LEFT); 
		$artName ="AW".$aArt;

		$newfile = "assets/txt_log/".$artName;
		if (file_exists($newfile)) 
		{
          	$fh = fopen($newfile, 'a');
	        $today=date("Y-m-d H:i:s");	
	     	$content=strtoupper("[".date("F j, Y g:i a", strtotime(date("Y-m-d H:i:s")))."]");
	     	$content.=" ".$msg. " \n"; 
	        fwrite($fh, $content);
	        fclose($fh);
        }
	}		

	public function checkFilesInFolder($filepath)
	{//get the list of files in the directory
	 	$filelist=array();
		if(file_exists($filepath))
		{
			if ($handle = opendir($filepath.'/')) {
	    		while (false !== ($entry = readdir($handle))) {
		        	if ($entry != "." && $entry != "..") {
		        	$ib[]=$entry;
		        	}
	    		}
	    		closedir($handle);
			}
			if (isset($ib)) {
				$filelist=@$ib;
			}
		}//end of if file_exist
		return $filelist;
	}

}