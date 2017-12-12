<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Del {

	public function __construct() 
	{
		parent::__construct();
		if (!$this->session->User_Type_Id || $this->session->User_Type_Id!=1 ) {
			redirect(base_url());	
		}	
	}

	public function index()
	{
		$data['page']='Dashboard';
		$view = 'admin/admin_home_view';
		
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function phpinfo()
	{
		phpinfo();
	}

	/*Genral Function section begins*/


	public function changeAllStatus()
	{
		$model_name=$this->input->post('type',TRUE);
		$pk_id=$this->input->post('pk_id',TRUE);
		$status=$this->input->post('is_active',TRUE);
		$this->$model_name->update($pk_id, array( 'is_active' => $status));
	}

	public function show_stores_list($section='')
	{
		switch ($section) {
			case 'Events':
						$data['page']='Event And Trunk Shows';
						$data['next_action']='store_trunkshows_list';
						break;
			case 'Career':
						$data['page']='Career/Jobs';
						$data['next_action']='store_jobs_list';
						break;
			default:
						$data['page']='Event And Trunk Shows';
						$data['next_action']='store_trunkshows_list';
						break;
		}
		$data['store_list']=$this->store->select('store_id,store_name')->get_many_by('is_active',true);
		$view = 'admin/admin_show_stores_list_for_action';
		echo Modules::run('template/admin_template', $view, $data);	
	} 
	/*Genral function ends*/


	/*Store
	/*Store Methods*/

	public function stores_list()
	{
		$data['store_list']=$this->store->get_all();
		$data['page']='Store List';
		$view = 'admin/stores/admin_store_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_store($store_id='')
	{
		$data['store_details']='';
		if($store_id)
		{
			$data['store_details']=$this->store->get($store_id);
		}
		$data['page']='Store List';
		$view = 'admin/stores/admin_manage_store_view';
		echo Modules::run('template/admin_template', $view, $data);
	}

	public function changeStoreStatus()
	{
		$this->store->update($this->input->post('store_id',TRUE), array( 'is_active' => $this->input->post('is_active',TRUE) ));
	}

	public function delete_stores()
	{
		if(isset($_POST['store_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$this->store->delete($this->input->post('store_id',TRUE));
		}
	}

	public function add_update_store()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('store_name', 'email_id', 'city','state','pincode', 'contact_number','address','store_desc'), $posted_data);
		if(isset($posted_data['store_id']))
		{
			$this->store->update($posted_data['store_id'], $required_array);
		}else{
			$this->store->insert($required_array);
		}
		redirect('admin/stores_list');
	}
	/*end of store pages*/




	/*About us
	/*About us Methods*/
	public function manage_about_us()
	{
		$data['page']='Manage About-us';
        $data['about_us']=$this->ref_pages->get_section_by_pageId(1);
		$view = 'admin/admin_manage_about_us';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function update_about_us(){
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('About_us_Title', 'Section-1', 'Section-2','Quote'), $posted_data);
		$data['about_us']=$this->tbl_pages->update_about_us($required_array);
	}
	/*end of store pages*/




	/*Event and trunk shows
	/*Event and trunk shows Methods*/

	public function store_trunkshows_list($store_id)
	{
		$data['event_list']=$this->tbl_trunkshows->get_many_by('store_id',$store_id);
		$data['store_details']=$this->store->select('store_name')->get($store_id);
		$data['page']='Event And Trunk Shows';
		$view = 'admin/trunkshows/admin_storewise_trunkshows_list';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function changeEventStatus()
	{
		$this->tbl_trunkshows->update($this->input->post('event_id',TRUE), array( 'is_active' => $this->input->post('is_active',TRUE) ));
	}

	public function manage_event($event_id='')
	{
		$data['event_details']='';
		$data['store_list']=$this->store->select('store_id,store_name')->get_many_by('is_active',true);
		if($event_id)
		{
			$data['event_details']=$this->tbl_trunkshows->get($event_id);
		}
		$data['page']='Event And Trunk Shows';
		$view = 'admin/trunkshows/admin_manage_event_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function add_update_events()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('event_name', 'store_id', 'start_date','end_date','event_desc'), $posted_data);
		if(isset($posted_data['event_id']))
		{
			$this->tbl_trunkshows->update($posted_data['event_id'], $required_array);
		}else{
			$this->tbl_trunkshows->insert($required_array);
		}
		redirect('admin/store_trunkshows_list/'.$posted_data['store_id']);
	}

	public function delete_events()
	{
		if(isset($_POST['event_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$this->tbl_trunkshows->delete($this->input->post('event_id',TRUE));
		}
	}
	/*end of event pages*/







	/*Career Pages
	/*Career pages*/
	public function store_jobs_list($store_id)
	{
		$data['jobs_list']=$this->tbl_jobs->get_many_by('store_id',$store_id);
		$data['store_details']=$this->store->select('store_name')->get($store_id);
		$data['page']='Jobs list';
		$view = 'admin/careers/admin_storewise_job_list';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_job($job_id="")
	{
		$data['job_details']='';
		$data['store_list']=$this->store->select('store_id,store_name')->get_many_by('is_active',true);
		if($job_id)
		{
			$data['job_details']=$this->tbl_jobs->get($job_id);
		}
		$data['page']='Jobs list';
		$view = 'admin/careers/admin_manage_job_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function add_update_job()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('job_title','job_desc','job_responsibility', 'store_id', 'job_requirements','job_benifit'), $posted_data);
		if(isset($posted_data['job_id']))
		{
			$this->tbl_jobs->update($posted_data['job_id'], $required_array);
		}else{
			$this->tbl_jobs->insert($required_array);
		}
		redirect('admin/Store_jobs_list/'.$posted_data['store_id']);
	}

	public function changeJobStatus()
	{
		$this->tbl_jobs->update($this->input->post('job_id',TRUE), array( 'is_active' => $this->input->post('is_active',TRUE) ));
	}

	public function delete_job()
	{
		if(isset($_POST['job_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$this->tbl_jobs->delete($this->input->post('job_id',TRUE));
		}
	}
	/*end of career pages*/



	/*
	/*Career Pages
	/*Career pages*/

	public function all_products()
	{
		$data['product_list']=$this->tbl_product->get_all_product();
		$data['page']='All Products';
		if (!$this->input->is_ajax_request()) {
			$view = 'admin/collection/admin_all_product_list';
			echo Modules::run('template/admin_template', $view, $data);	
		}else{

		}
		
	}


	public function manage_product($product_id='')
	{
		$data['product_details']='';
		if($product_id)
		{
			$data['product_details']=$this->tbl_product->get($product_id);
			$data['product_subcat_list']=$this->lnk_produt_to_subcat->get_many_by('product_id',$product_id);
			$data['product_images_list']=$this->lnk_produt_to_docs->get_product_images_nactive($product_id);
		}
		$data['brands_list']=$this->ref_brand->select('brand_id,brand_name')->get_many_by('is_active',true);
		$data['catagory_list']=$this->ref_cat->select('cat_id,cat_name')->get_many_by('is_active',true);
		$data['sub_catlist']=$this->ref_subcat->select('sub_cat_id,sub_cat_name,cat_id')->get_many_by('is_active',true);
		$data['collection_list']=$this->ref_coll->select('collection_id,collection_name')->get_many_by('is_active',true);
		$data['season_list']=$this->ref_season->select('season_id,season')->get_many_by('is_active',true);
		$data['page']='All Products';
		if (!$this->input->is_ajax_request()) {
			$view = 'admin/collection/admin_manage_product_view';
			echo Modules::run('template/admin_template', $view, $data);	
		}else{
			$view = 'admin/collection/ajax/collection/ajax_admin_manage_collection_view';
			$this->load->view($view,$data);
		}
	}

	public function add_update_product()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('product_name', 'collection_id', 'brand_id','season_id','product_desc'), $posted_data);

		if(isset($posted_data['product_id']))
		{
			$this->tbl_product->update($posted_data['product_id'], $required_array);
			$product_id=$posted_data['product_id'];
		}else{
			$this->tbl_product->insert($required_array);
			$product_id=$this->db->insert_id();
		}

		$subcat_array=$this->input->post('sub_cat_id');
				//array for delete update
		if(!empty($subcat_array)) //to avoid work later
		{
			foreach ($subcat_array as $key => $value) {
				$row['product_id']=$product_id;
				$row['sub_cat_id']=$value;
				$final_subcat_array[]=$row;
			}
		}
		$this->lnk_produt_to_subcat->delete_by(array('product_id'=>$product_id));
		if(isset($final_subcat_array))
		{
			$this->lnk_produt_to_subcat->insert_many($final_subcat_array);	
		}

		//$cpt = count($_FILES['userfile']);
		if($_FILES['userfile']['name'][0]!="")
		{
	    	if(!file_exists("./assets/images/upload/".$product_id))
	    	{
	    		mkdir("./assets/images/upload/".$product_id, 0777, true);
	    	}
			$config = array(
				'upload_path' => "./assets/images/upload/".$product_id."/",
				'overwrite' => TRUE,
				'allowed_types' => "gif|jpg|png",//* -for all file types
				'encrypt_name' => TRUE //encrypting the file name
				//'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			);
	     	$this->load->library('upload', $config);
	     	$files = $_FILES;
	     	$cpt=count($_FILES['userfile']['name']);
	     	//use of foreach here to speed things here
     	 	for($i=0; $i<$cpt; $i++)
            {
            	$_FILES['userfile']['name']= $files['userfile']['name'][$i];//keep orginal file name
            	$_FILES['userfile']['type']= $files['userfile']['type'][$i];
            	$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
         		$_FILES['userfile']['error']= $files['userfile']['error'][$i];
         		$_FILES['userfile']['size']= $files['userfile']['size'][$i];
         		$config['file_name'] = $_FILES['userfile']['name'];
		      	$this->upload->initialize($config);
		        if ( ! $this->upload->do_upload())
		        {
		            $error = array('error' => $this->upload->display_errors());
		            $this->mprint($error);
		        }
		        else
		        {
		        	//upload image and update ids in db
		            $fileInfo = $this->upload->data();//get uploaded file info here
		           	$images=$fileInfo['full_path'];
		            $imageupload = \Cloudinary\Uploader::upload($images);
		            $img[]=$imageupload;

		            //insert into document table
		           // $str= substr($imageupload['secure_url'], strpos($imageupload['secure_url'], 'upload/'));
		            $str=explode('upload/', $imageupload['secure_url']);
		            $inp['doc_path']=$str[1];
		            $inp['is_active']=true;
		           	$this->documents->insert($inp);
					$document_id=$this->db->insert_id();
					//insert in to lnk table
					$inp1['document_id']=$document_id;
					$inp1['product_id']=$product_id;
					$this->lnk_produt_to_docs->insert($inp1);
		            unlink($images);
		        }
         	}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	/*end of product page */





	/*
	/*Userlist Pages
	/*Userlist pages*/

	public function userlist()
	{
		$data['page']='Userlist';
		$data['users_list']=$this->users->get_many_by('userlevel_id',2);
		$view = 'admin/userlist/admin_userlist_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}


	public function delete_user()
	{
		if(isset($_POST['user_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$this->users->delete($this->input->post('user_id',TRUE));
		}
	}

	public function profile($user_id){
		$data['page']='Userlist';
		$data['user_details']=$this->users->get($user_id);
		$view = 'admin/userlist/admin_user_profile_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function userFavourites()
	{//ajax request
		$posted_data=$this->security->xss_clean($this->input->post());
		if(isset($posted_data['userid']))
		{
			$data=array();
			$user_id=$posted_data['userid'];
			$data['fav']=$fav_array=$this->lnk_usr_to_fav->get_fav_produt_with_prodname($user_id);
			if(!empty($fav_array))
			{
				foreach ($fav_array as $key => $value) {
					$product_ids[]=$value['product_id'];
				}
				$data['product_list']=$this->tbl_product->get_product_details($product_ids);
				//$data['image_list']= $this->lnk_produt_to_docs->get_product_images($product_ids) ;
			}
			$this->load->view('admin/userlist/ajax/admin_user_fav_list_view',$data);
		}
	}

	public function mostFavourites()
	{
		$data['fav']=$fav_array=$this->lnk_usr_to_fav->most_popular_products();

		if(!empty($fav_array))
		{
			foreach ($fav_array as $key => $value) {
				$product_ids[]=$value['product_id'];
				$product_likes[$value['product_id']]=$value['likes'];
			}
			$data['product_list']=$this->tbl_product->get_product_details($product_ids);
			$data['product_likes']=$product_likes;
			//$data['image_list']= $this->lnk_produt_to_docs->get_product_images($product_ids) ;
		}
		$this->load->view('admin/collection/ajax/admin_most_fav_list_view',$data);
	}


	/*Instagram*/
	/*Manage Instagram*/
	public function instagram()
	{
		$data['page']='Instagram';
		$data['insta_list']=$this->insta->get_all();
		$view = 'admin/insta/admin_insta_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_insta($insta_id='')
	{
		$data['page']='Instagram Link Detail';
		if($insta_id){
			$data['link_details']=$this->insta->get($insta_id);
		}
		$view = 'admin/insta/admin_manage_insta_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function get_instagramimage(){
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('url'), $posted_data);
		if(isset($required_array['url']))
		{
			$url=$required_array['url'];
			libxml_use_internal_errors(true);
			$doc = new DomDocument();
			$doc->loadHTML(file_get_contents($url));
			$xpath = new DOMXPath($doc);
			$query = '//*/meta[starts-with(@property, \'og:\')]';
			$metas = $xpath->query($query);
			foreach ($metas as $meta) {
				$property = $meta->getAttribute('property');
				if($property=="og:image")
				{
					$content = $meta->getAttribute('content');
					$required_array['image']=$content;
					break;
				}
			}
			if(isset($required_array['image']))
			{
				echo json_encode($required_array['image']);
			}else{
				echo "fail";
			}
		}
	}

	public function add_update_insta()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('short_desc','link_desc','image'), $posted_data);
		if(isset($posted_data['insta_link_id']))
		{
			$this->insta->update($posted_data['insta_link_id'], $required_array);
			//$this->session->set_flashdata('success',  'Instagram Link updated successfully');
		}else{
			$this->insta->insert($required_array);
			//$this->session->set_flashdata('success',  'Instagram Link inserted successfully');
		}
		redirect('admin/instagram/');
	}

	public function delete_insta()
	{
		if(isset($_POST['story_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$this->insta->delete($this->input->post('story_id',TRUE));
		}
	}


	/*end of insta */


	/*
	/*story Pages
	/*story pages*/

	public function story_list()
	{
		$data['page']='Story List';
		$data['stories_list']=$this->stories->get_all();
		$view = 'admin/stories/admin_stories_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_story($story_id='')
	{
		$data['page']='Story Details';
		$data['store_list']=$this->store->select('store_id,store_name')->get_many_by('is_active', 1);
		if($story_id){
			$data['story_details']=$this->stories->get($story_id);
			$data['image_list']= $this->lnk_story_to_docs->get_story_images($story_id);
		}
		$view = 'admin/stories/admin_manage_story_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function delete_story()
	{
		if(isset($_POST['story_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$this->stories->delete($this->input->post('story_id',TRUE));
		}
	}

	public function add_update_story()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('b_fname', 'g_fname', 'email','style','wedding_day', 'purchased_from_store','weddingstory_desc','service_id','service_name','service_website'), $posted_data);
		if(isset($posted_data['story_id']))
		{
			$this->stories->update($posted_data['story_id'], $required_array);
			$product_id=$posted_data['story_id'];
		}else{
			$this->stories->insert($required_array);
			$product_id=$this->db->insert_id();//story_id aka product_id
		}


		if($_FILES['userfile']['name'][0]!="")
		{
	    	if(!file_exists("./assets/images/upload/".$product_id))
	    	{
	    		mkdir("./assets/images/upload/".$product_id, 0777, true);
	    	}
			$config = array(
				'upload_path' => "./assets/images/upload/".$product_id."/",
				'overwrite' => TRUE,
				'allowed_types' => "gif|jpg|png",//* -for all file types
				'encrypt_name' => FALSE //encrypting the file name
				//'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			);
	     	$this->load->library('upload', $config);
	     	$files = $_FILES;
	     	$cpt=count($_FILES['userfile']['name']);
	     	//use of foreach here to speed things here
     	 	for($i=0; $i<$cpt; $i++)
            {
            	$_FILES['userfile']['name']= $files['userfile']['name'][$i];//keep orginal file name
            	$_FILES['userfile']['type']= $files['userfile']['type'][$i];
            	$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
         		$_FILES['userfile']['error']= $files['userfile']['error'][$i];
         		$_FILES['userfile']['size']= $files['userfile']['size'][$i];
         		$config['file_name'] = $_FILES['userfile']['name'];
		      	$this->upload->initialize($config);
		        if ( ! $this->upload->do_upload())
		        {
		            $error = array('error' => $this->upload->display_errors());
		            $this->mprint($error);
		        }
		        else
		        {
		        	//upload image and update ids in db
		            $fileInfo = $this->upload->data();//get uploaded file info here
		           	$images=$fileInfo['full_path'];
		            $imageupload = \Cloudinary\Uploader::upload($images);
		            $img[]=$imageupload;

		            //insert into document table
		           // $str= substr($imageupload['secure_url'], strpos($imageupload['secure_url'], 'upload/'));
		            $str=explode('upload/', $imageupload['secure_url']);
		            $inp['doc_path']=$str[1];
		           	$this->documents->insert($inp);
					$document_id=$this->db->insert_id();
					//insert in to lnk table
					$inp1['image_id']=$document_id;
					$inp1['story_id']=$product_id;
					$this->lnk_story_to_docs->insert($inp1);
		            unlink($images);
		        }
         	}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function season()
	{
		$data['page']='Collection List';
		$data['season_list']=$this->ref_season->get_all();
		$view = 'admin/collection/season/season_list';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_season($season_id='')
	{
		$data['season_details']='';
		if(isset($season_id) && strlen(trim($season_id)))
		{
			$data['season_details']=$this->ref_season->get($season_id);
		}
		$data['page']='Season details';

		if (!$this->input->is_ajax_request()) {
			$view = 'admin/collection/season/manage_season_view';
			echo Modules::run('template/admin_template', $view, $data);	
		}else{
			$view = 'admin/collection/ajax/admin_manage_data_view';
			$this->load->view($view,$data);
		}
	}

	public function upload_season()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('season'), $posted_data);
		if(isset($posted_data['season_id']))
		{
			$this->ref_season->update($posted_data['season_id'], $required_array);
			$product_id=$posted_data['season_id'];
		}else{
			if(isset($required_array['season']) && strlen(trim($required_array['season'])))
			{
				$this->ref_season->insert($required_array);
				$product_id=$this->db->insert_id();//story_id aka product_id
			}
		}

		if(isset($_FILES['userfile']) && strlen(trim($_FILES['userfile']['name'])))
		{
			if(!file_exists("./assets/upload/season/data/".$product_id))
	    	{
	    		mkdir("./assets/upload/season/data/".$product_id, 0777, true);
	    	}
			$config = array(
				'upload_path' => "./assets/upload/season/data/".$product_id."/",
				'overwrite' => TRUE,
				'allowed_types' => "csv"
				//'encrypt_name' => TRUE //encrypting the file name
				//'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			);
	     	$this->load->library('upload', $config);
	        if (!$this->upload->do_upload())
	        {
	            $error = array('error' => $this->upload->display_errors());
	            $this->mprint($error);
	        }
	        else{
	            $fileInfo = $this->upload->data();//get uploaded file info here
	           	$images=$fileInfo['full_path'];
	           	$allowed_types=array('.csv');
	           	if(in_array($fileInfo['file_ext'],$allowed_types ))
	           	{
	           		$this->load->library('Csvreader');
				    $csvData = $this->csvreader->parse_file($fileInfo['full_path']);
				    //upload the data into file//preparring the raw material
				    //1 fetch all catagories
				    $collections=$this->ref_coll->select('collection_id,collection_name')->get_all();
				    foreach ($collections as $collection) {
				    	$colarray[$collection->collection_id]=$collection->collection_name;
				    }
				    $col_flip=array_flip($colarray);

				    //2 bring brands
				    $brands=$this->ref_brand->select('brand_id,brand_name')->get_all();
				    foreach ($brands as $brand) {
				    	$brand_array[$brand->brand_id]=$brand->brand_name;
				    }
				    $brand_flip=array_flip($brand_array);
				    //3- catagorise the subcatogary to insert into db
				    //bring all subcatagory
				    $subcats=$this->ref_subcat->select('sub_cat_id,sub_cat_name')->get_all();
				    foreach ($subcats as $subcat) {
				    	$subcat_array[$subcat->sub_cat_id]=$subcat->sub_cat_name;
				    }
				    //4- season id= $product_id;
				    $seasons=$this->ref_season->select('season_id,season')->get_all();
				    foreach ($seasons as $season) {
				    	$season_array[$season->season_id]=$season->season;
				    }
				    $season_flip=array_flip($season_array);
				    $season_id=$product_id;
				    //check if the product is present
				    $dup_prod=array();
				    foreach ($csvData as $product) {
				    	if(strlen(trim($product['Style Number/Name'])))
				    	{
				    		$style_no=$product['Style Number/Name'];
				    		if(!in_array($style_no,$dup_prod))
				    		{
				    			array_push($dup_prod, $style_no);
				    			$unique_product[]=$product;//for future
				    			$product_details=array();
				    			/*common part*/
				    			if(isset($col_flip[$product['Collection']]))
					    		{
					    			$product_details['collection_id']=$col_flip[$product['Collection']];
					    		}else{
					    			$product_details['collection_id']=NULL;
					    		}
					    		if(isset($brand_flip[$product['Brands']]))
					    		{
					    			$product_details['brand_id']=$brand_flip[$product['Brands']];
					    		}else{
					    			$product_details['brand_id']=NULL;
					    		}
					    		$product_details['product_name']=$style_no;
					    		/*end common part*/


					    		$p_details=$this->tbl_product->select('product_id')->get_many_by('product_name',$style_no);

						    	if(!empty($p_details)) //if the record is already present
						    	{//update the product
						    		$inserted[]=$style_no;
						    		if(isset($season_flip[$product['Season']]))
						    		{
						    			$product_details['season_id']=$season_flip[$product['Season']];
						    		}else{
						    			$product_details['season_id']=NULL;
						    		}
						    		$product_details['product_id']=$p_details[0]->product_id;
						    		$row_update[]=$product_details;
						    	}else{//insert the product  //record is not present
						    		$inserted[]=$style_no;
						    		if(isset($season_flip[$product['Season']]))
						    		{
						    			$product_details['season_id']=$season_flip[$product['Season']];
						    		}else{
						    			$product_details['season_id']=$season_id;
						    		}
						    		$row[]=$product_details;
					    		}
					    	}
				    	}
				    }
				    if(isset($row) && !empty($row))
				    {
				    	$this->db->insert_batch('tbl_products', $row); 
				    }else{
				    	if(isset($row_update) && !empty($row_update))
				    	{
				    		$this->db->update_batch('tbl_products', $row_update, 'product_id');
				    	}
				    }
				    
				    foreach ($unique_product as $key => $product) {
				    	$style_no=$product['Style Number/Name'];
				    	$product_id=$this->tbl_product->select('product_id')->get_many_by('product_name',$style_no);
				    	if(!empty($product_id))
				    	{
				    		$this->db->delete('lnk_product_to_subcat', array('product_id' => $product_id[0]->product_id)); 
				    		$row_link=array();
				    		foreach ($subcat_array as $key => $value) {
				    			if(isset($product[$value]) && ($product[$value]=='Yes' || $product[$value]=='yes'))
				    			{
				    				$item['product_id']=$product_id[0]->product_id;
				    				$item['sub_cat_id']=$key;
				    				$row_link[]=$item;
				    			}
				    		}
				    		if(isset($row_link) && !empty($row_link))
				    		{
				    			$this->db->insert_batch('lnk_product_to_subcat', $row_link); 
				    		}
				    	}else{
				    		$failed_product[]=$style_no;
				    	}
				    }
				    
	           	}else{
	           		$error = array('error' => 'Invalid Filetypes');
	           		$this->mprint($error);
	           	}
	        }
		}
		if(isset($inserted))
		{
			$this->session->set_flashdata('successProduct',$inserted);
		}
		if(isset($failed_product))
		{
			$this->session->set_flashdata('failedProduct',$failed_product);
		}
		redirect('admin/season');
	}

	
	public function extract_zip_upload()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('filename','season_id'), $posted_data);
		$season_id=$required_array['season_id'];
		$zipfile='assets/images/zip/'.$required_array['filename'];
		$this->load->library('unzip');
   		$this->unzip->allow(array('jpeg', 'jpg'));
   		$b_path='assets/images/tmp/'.$required_array['filename'];
   		if(!file_exists($b_path))
   		{
   			mkdir($b_path, 0777, true);
   		}
   		$this->unzip->extract($zipfile, $b_path);
   		$season_products=$this->tbl_product->select('product_id,product_name')->get_many_by('is_active',true);
   		$success=array();
   		foreach ($season_products as $product) {
   			$c_path=$b_path.'/'.$product->product_name;
   			$product_id=$product->product_id;
   			$real_path=$b_path.'/'.$product->product_name.'/';
   			if(file_exists($c_path))
   			{
   				$files=$this->checkFilesInFolder($real_path);
   				if(!empty($files))
   				{
   					$success[]=$product->product_name;
   					foreach ($files as $index => $filename) {
   						if($filename!="Thumbs.db")
   						{
	   						$c_filename=$real_path.$filename;
	       					$imageupload = \Cloudinary\Uploader::upload($c_filename);
				            $img[]=$imageupload;
				            $str=explode('upload/', $imageupload['secure_url']);
				            $inp['doc_path']=$str[1];
				            $inp['is_active']=true;
				           	$this->documents->insert($inp);
							$document_id=$this->db->insert_id();
							//insert in to lnk table
							$inp1['document_id']=$document_id;
							$inp1['product_id']=$product_id;
							$this->lnk_produt_to_docs->insert($inp1);
				            unlink($c_filename);
			        	}
		            }
		            rmdir($c_path);
   				}
   			}
   		}
   		$files=$failed=$this->checkFilesInFolder($b_path);
   		if(!empty($files))
		{
			foreach ($files as $index => $filename) {
				$dir=$b_path.'/'.$filename;
				$this->deleteDirectory($dir);
			}
		}
   		rmdir($b_path);
   		$this->session->set_flashdata('successProduct',$success);
   		$this->session->set_flashdata('failedProduct',$failed);
		redirect('admin/season');
	}

	public function  deleteDirectory($dir) {
	    if (!file_exists($dir)) {
	        return true;
	    }
	    if (!is_dir($dir)) {
	        return unlink($dir);
	    }
	    foreach (scandir($dir) as $item) {
	        if ($item == '.' || $item == '..') {
	            continue;
	        }
	        if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
	            return false;
	        }
	    }
	    return rmdir($dir);
	}

	public function upload_season_zip()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('season_id'), $posted_data);

		$season_id=$required_array['season_id'];

		if(!file_exists("./assets/upload/season/images/".$season_id))
	    	{
	    		mkdir("./assets/upload/season/images/".$season_id, 0777, true);
	    	}
			$config = array(
				'upload_path' => "./assets/upload/season/images/".$season_id."/",
				'overwrite' => TRUE,
				'allowed_types' => "*"
				//'encrypt_name' => TRUE //encrypting the file name
				//'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			);
	     	$this->load->library('upload', $config);
	        if (!$this->upload->do_upload())
	        {
	            $error = array('error' => $this->upload->display_errors());
	            $this->mprint($error);
	        }
	        else{
	            	$fileInfo = $this->upload->data();//get uploaded file info here
           			$images=$fileInfo['full_path'];

	           		$allowed_types=array('.zip');
		           	if(in_array($fileInfo['file_ext'],$allowed_types))
		           	{
		           		$this->load->library('unzip');
		           		$this->unzip->allow(array('jpeg', 'jpg'));
		           		//$this->unzip->extract($fileInfo['full_path'], $config['upload_path']);
		           		$this->unzip->extract($fileInfo['full_path']);
		           		$upload_path=$config['upload_path'];
		           		//$apth="assets/upload/season/images/".$season_id."/";
		           		//unlink($apth.$fileInfo['file_name']);
		           		// /full_path,file_name
		           		$files=$this->checkFilesInFolder($upload_path);

		           
		           		$season_products=$this->tbl_product->select('product_id,product_name')->get_many_by('season_id',$season_id);

		           		foreach ($season_products as $product) {
		           			$c_path=$upload_path.$product->product_name;
		           			$product_id=$product->product_id;
		           			$real_path=$fileInfo['file_path'].$product->product_name.'/';
		           			if(file_exists($c_path))
		           			{
		           				$files=$this->checkFilesInFolder($c_path);
		           				if(!empty($files))
		           				{
		           					foreach ($files as $index => $filename) {
		           						$c_filename=$real_path.$filename;
			           					$imageupload = \Cloudinary\Uploader::upload($c_filename);
							            $img[]=$imageupload;
							            $str=explode('upload/', $imageupload['secure_url']);
							            $inp['doc_path']=$str[1];
							            $inp['is_active']=true;
							           	$this->documents->insert($inp);
										$document_id=$this->db->insert_id();
										//insert in to lnk table
										$inp1['document_id']=$document_id;
										$inp1['product_id']=$product_id;
										$this->lnk_produt_to_docs->insert($inp1);
							            unlink($c_filename);
						            }
		           				}
		           			}
		           			
		           		}
		           		//get season items, 
		           		//find the items from respective folder
		           		//upload it on by one and update your document and links
		           	}
	           }
	    $this->session->set_flashdata('success',  'Zip file Imported successfully');
		redirect('admin/season');
	}

	public function collection_list()
	{
		$data['collection_list']=$this->ref_coll->get_all();
		$data['brands_list']=$this->ref_brand->get_all();
		$data['catagory_list']=$this->ref_cat->get_all();
		$data['season_list']=$this->ref_season->get_all();
		$data['page']='Collection List';
		$view = 'admin/collection/admin_collection_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function collection_list1(){
		$data['collection_list']=$this->ref_coll->get_all();
		$data['brands_list']=$this->ref_brand->get_all();
		$data['catagory_list']=$this->ref_cat->get_all();
		$data['season_list']=$this->ref_season->get_all();
		$data['product_list']=$this->tbl_product->get_all_product();
		$data['page']='Collection List';
		$view = 'admin/collection/admin_collection_list_new_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_collection($collection_id)
	{
		$collection=$this->ref_coll->get_list_with_images($collection_id);
		if(!empty($collection))
		{
			$data['collectionDetails']=$collection;
			$data['page']='Collection List';
			$view = 'admin/collection/admin_manage_collection_view';
			echo Modules::run('template/admin_template', $view, $data);
		}else{
			redirect('admin/');
		}
	}



/* manage brands
/* manage brands

*/
	public function manage_brand($brand_id='')
	{
		$data['brand_details']='';
		if($brand_id)
		{
			$data['brand_details']=$this->ref_brand->get($brand_id);
			$data['brand_images']=$this->lnk_brands_to_docs->get_brand_images($brand_id);
		}
		$data['page']='Manage brand';
		$view = 'admin/collection/brands/admin_manage_brand_view';
		echo Modules::run('template/admin_template', $view, $data);
	}

	public function add_update_brands()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('brand_name'), $posted_data);

		if(isset($posted_data['brand_id']))
		{
			$this->ref_brand->update($posted_data['brand_id'], $required_array);
			$product_id=$posted_data['brand_id'];
			$this->session->set_flashdata('success',  'Brand updated successfully');
		}else{
			$this->ref_brand->insert($required_array);
			$product_id=$this->db->insert_id();
			$this->session->set_flashdata('success',  'Brand Added successfully');
		}

		//$cpt = count($_FILES['userfile']);
		if($_FILES['userfile']['name'][0]!="")
		{
	    	if(!file_exists("./assets/images/upload/".$product_id))
	    	{
	    		mkdir("./assets/images/upload/".$product_id, 0777, true);
	    	}
			$config = array(
				'upload_path' => "./assets/images/upload/".$product_id."/",
				'overwrite' => TRUE,
				'allowed_types' => "jpg|png|jpeg",//* -for all file types
				'encrypt_name' => TRUE //encrypting the file name
				//'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			);
	     	$this->load->library('upload', $config);
	     	$files = $_FILES;
	     	$cpt=count($_FILES['userfile']['name']);
	     	//use of foreach here to speed things here
     	 	for($i=0; $i<$cpt; $i++)
            {
            	$_FILES['userfile']['name']= $files['userfile']['name'][$i];//keep orginal file name
            	$_FILES['userfile']['type']= $files['userfile']['type'][$i];
            	$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
         		$_FILES['userfile']['error']= $files['userfile']['error'][$i];
         		$_FILES['userfile']['size']= $files['userfile']['size'][$i];
         		$config['file_name'] = $_FILES['userfile']['name'];
		      	$this->upload->initialize($config);
		        if ( ! $this->upload->do_upload())
		        {
		            $error = array('error' => $this->upload->display_errors());
		            $this->mprint($error);
		        }
		        else
		        {
		        	//upload image and update ids in db
		            $fileInfo = $this->upload->data();//get uploaded file info here
		           	$images=$fileInfo['full_path'];
		            $imageupload = \Cloudinary\Uploader::upload($images);
		            $img[]=$imageupload;

		            //insert into document table
		           // $str= substr($imageupload['secure_url'], strpos($imageupload['secure_url'], 'upload/'));
		            $str=explode('upload/', $imageupload['secure_url']);
		            $inp['doc_path']=$str[1];
		            $inp['is_active']=true;
		           	$this->documents->insert($inp);
					$document_id=$this->db->insert_id();
					//insert in to lnk table
					$inp1['image_id']=$document_id;
					$inp1['brand_id']=$product_id;
					$this->lnk_brands_to_docs->insert($inp1);
		            unlink($images);
		        }
         	}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}



/*Download section*/
/* download*/
	public function exportUsers()
	{
		$subscribers=$this->users->get_many_by('userlevel_id',2);
		require_once APPPATH . '/third_party/Phpexcel/Bootstrap.php';

		// Create new Spreadsheet object
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$spreadsheet->getProperties()->setCreator('Webmaster Impression Bridal')
				->setLastModifiedBy('Admin')
				->setTitle('UserList')
				->setSubject('All Userlist')
				->setDescription('this file contain all userlist');

		$styleArray = array(
				'font' => array(
						'bold' => true,
				),
				'alignment' => array(
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
						'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				),
				'borders' => array(
						'top' => array(
								'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						),
				),
				'fill' => array(
						'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
						'rotation' => 90,
						'startcolor' => array(
								'argb' => 'FFA0A0A0',
						),
						'endcolor' => array(
								'argb' => 'FFFFFFFF',
						),
				),
		);

		$spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($styleArray);

		foreach(range('A','F') as $columnID) {
			$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
					->setAutoSize(true);
		}

		$spreadsheet->setActiveSheetIndex(0)
				->setCellValue("A1",'UserId')
				->setCellValue("B1",'UserEmail')
				->setCellValue("C1",'SignUp Date')
				->setCellValue("D1",'Last Logged')
				->setCellValue("E1",'Zipcode')
				->setCellValue("F1",'Status');

		$x= 2;
		foreach($subscribers as $sub){
			$spreadsheet->setActiveSheetIndex(0)
					->setCellValue("A$x",$sub->user_id)
					->setCellValue("B$x",$sub->email_id)
					->setCellValue("C$x",date("jS F Y, g:i a", strtotime($sub->signup_date)))
					->setCellValue("D$x",date("jS F Y, g:i a", strtotime($sub->last_login)))
					->setCellValue("E$x",$sub->zipcode)
					->setCellValue("F$x",(($sub->is_active==true)? "Active" : "Inactive"));
			$x++;
		}

		$spreadsheet->getActiveSheet()->setTitle('Users Information');

		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="subscribers_sheet.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
		$writer->save('php://output');
		exit;

	}

	public function exportStyleList()
	{
		$subscribers=$this->tbl_product->get_all_product();
		require_once APPPATH . '/third_party/Phpexcel/Bootstrap.php';

		// Create new Spreadsheet object
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$spreadsheet->getProperties()->setCreator('Webmaster Impression Bridal')
				->setLastModifiedBy('Admin')
				->setTitle('StyleList')
				->setSubject('All StyleList')
				->setDescription('this file contain all Styles');

		$styleArray = array(
				'font' => array(
						'bold' => true,
				),
				'alignment' => array(
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
						'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				),
				'borders' => array(
						'top' => array(
								'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						),
				),
				'fill' => array(
						'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
						'rotation' => 90,
						'startcolor' => array(
								'argb' => 'FFA0A0A0',
						),
						'endcolor' => array(
								'argb' => 'FFFFFFFF',
						),
				),
		);

		$spreadsheet->getActiveSheet()->getStyle('A1:E1')->applyFromArray($styleArray);

		foreach(range('A','E') as $columnID) {
			$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
					->setAutoSize(true);
		}

		$spreadsheet->setActiveSheetIndex(0)
				->setCellValue("A1",'Style No')
				->setCellValue("B1",'Collection')
				->setCellValue("C1",'Brand')
				->setCellValue("D1",'Season')
				->setCellValue("E1",'Status');

		$x= 2;
		foreach($subscribers as $sub){
			$spreadsheet->setActiveSheetIndex(0)
					->setCellValue("A$x",$sub->product_name)
					->setCellValue("B$x",$sub->collection_name)
					->setCellValue("C$x",$sub->brand_name)
					->setCellValue("D$x",$sub->season)
					->setCellValue("E$x",(($sub->is_active==true)? "Active" : "Inactive"));
			$x++;
		}

		$spreadsheet->getActiveSheet()->setTitle('Styles List');

		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Stylelist_sheet.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
		$writer->save('php://output');
		exit;

	}
}


