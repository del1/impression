<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impression extends Del {
	public $data='';
	public function __construct() 
	{
		parent::__construct();
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['store_list1']=$this->store->get_many_by('is_active',true);
		$view = 'impression/home_view';
		$data['insta_list']=$this->insta->get_many_by('is_active',true);
		$data['story_Image_list']=$this->stories->get_stories_by_image();
		echo Modules::run('template/impression_Template', $view, $data);	
	}

	public function search()
	{
		if(isset($_GET['srchterm'])){
			$product_name=$this->input->get('srchterm');
			$result=$this->tbl_product->search_product($product_name);
			if(!empty($result))
			foreach ($result as $key => $value) {
				$intersect[]=$value->product_id;
			}
		}else
		{
			$posted_data=$this->security->xss_clean($this->input->get());
			if(isset($posted_data['cat']) && strlen(trim($posted_data['cat'])))
			{
				$where['season_id']=$posted_data['cat'];
			}
			if(isset($posted_data['sil']) && strlen(trim($posted_data['sil'])))
			{
				$sub[]=$posted_data['sil'];
			}
			if(isset($posted_data['neck']) && strlen(trim($posted_data['neck'])))
			{
				$sub[]=$posted_data['neck'];
			}
			if(isset($posted_data['waist']) && strlen(trim($posted_data['waist'])))
			{
				$sub[]=$posted_data['waist'];
			}
			if (isset($sub) && !empty($sub)) {
				$sub_data=array();
				foreach ($sub as $key => $value) {
					$data[$key]=$this->lnk_produt_to_subcat->select_active_product($value);
					foreach ($data[$key] as $key1 => $value1) {
						$sub_data[$key][]=$value1->product_id;
					}
				}
			}
			if(isset($where) && !empty($where))
			{
				$cat_data=array();
				$ct=array("season_id"=>$where['season_id'], "is_active"=>true);
				$data=$this->tbl_product->select('product_id')->get_many_by($ct);
				foreach ($data as $key1 => $value1) {
					$cat_data[]=$value1->product_id;
				}
			}
			if(isset($sub_data) && count($sub_data) >= 1)
			{
				if(count($sub_data) == 1)
				{
					$intersect =$sub_data[0];
					if(isset($cat_data) && !empty($cat_data))
					{
						$intersect=array_intersect($intersect, $cat_data);
					}
				}else{
					$intersect = call_user_func_array('array_intersect',$sub_data);
					if(isset($cat_data) && !empty($cat_data))
					{
						$intersect=array_intersect($intersect, $cat_data);
					}
				}
			}else{
				if(isset($cat_data) && !empty($cat_data))
				{
					$intersect =$cat_data;
				}else{
					$intersect =array();
				}
			}
		}
		return $intersect;
	}

	public function getapi(){
		$campaigns 	= $this->mailchimp->call('GET', 'lists/'.LISTID.'/members');
		$this->sprint($campaigns);
		/*$campaigns 	= $this->mailchimp->call('GET', 'lists');
		$this->sprint($campaigns);*///send_welcome->true
		/*$array=array('email_address'=>'mahesh.sakore@connexistech.com','status'=> 'pending','merge_fields'=>array('FNAME'=>"Mahesh",'LNAME'=>'sakore'),'ip_signup'=>$_SERVER['SERVER_ADDR'],'timestamp_signup'=>date('Y-m-d H:i:s'));
		$campaigns 	= $this->mailchimp->call('POST', 'lists/'.LISTID.'/members',$array);
		$this->sprint($campaigns);*/

	}
	public function collection($collection_id=''){

		if($this->session->User_Id)
		{
			$data['user_favorite_products']=$this->lnk_usr_to_fav->get_fav_produt_with_prodname($this->session->User_Id);
		}
		$data['brands_list']=$this->ref_brand->select('brand_id,brand_name')->get_many_by('is_active',true);
		$data['sub_catlist']=$this->ref_subcat->get_subcats_with_cat();
		$data['season_list']=$this->ref_season->select('season_id,season')->get_many_by('is_active',true);

		
		if(isset($_GET['srchterm']) || isset($_GET['cat']) || isset($_GET['sil'])|| isset($_GET['neck']) || isset($_GET['waist']))
		{
			$intersect=$this->search();
			$query_string=http_build_query($_GET);
			$config=$this->configsettings();
			$config['suffix']="?".$query_string;
			$config['base_url'] = base_url('impression/collection/');
			$config['first_url'] = $config['base_url'].'?'.$query_string;
			$config['total_rows'] =count($intersect);

			$this->pagination->initialize($config); 
			if(count($intersect))
			{
				//raw product list
				$intersect1=array_slice($intersect, $this->uri->segment(3), $config['per_page']);
				$data['product_list'] =$product_list=$this->tbl_product->get_product_list_within($intersect1);
			}else{
				$data['product_list'] =$product_list=array();
			}
		 	if(!empty($product_list))
	        {
	       		$data['image_list']= $this->lnk_produt_to_docs->get_product_images($intersect1) ;
	       	}
	        $data['links'] = $this->pagination->create_links();
	        $data['breadCrumb']["Home"]=base_url('/');
	        $data['breadCrumb']["Collections"]=base_url('impression/collection');
			$view = 'impression/list_result';
		}elseif($collection_id)
		{ 
			//normal product list
			$config=$this->configsettings();
			$config['base_url'] = base_url('impression/collection/'.$collection_id);
	        $config['total_rows'] =$this->tbl_product->count_by(array('is_active'=>true,"collection_id"=>$collection_id));
	        $this->pagination->initialize($config); 
	        $data['product_list'] =$product_list= $this->tbl_product->limit($config['per_page'], $this->uri->segment(4))->get_many_by(array('is_active'=>true,"collection_id"=>$collection_id));

	        if(!empty($product_list))
	        {
	        	foreach ($product_list as $product) {
	        		$product_ids[]=$product->product_id;
	        	}
	       		$data['image_list']= $this->lnk_produt_to_docs->get_product_images($product_ids) ;
	       	}
	        $data['links'] = $this->pagination->create_links();
	        $data['breadCrumb']["Home"]=base_url('/');
	        $data['breadCrumb']["Collections"]=base_url('impression/collection');
	        $last=$this->ref_coll->select('collection_name')->get($collection_id);
	        $data['breadCrumb']["Last"]=$last->collection_name;
	        $view = 'impression/list_result';
		}else{
			$data['collection_list1']=$this->ref_coll->get_list_with_images();
			$view = 'impression/collection_view';
		}
		echo Modules::run('template/impression_Template', $view, $data);	
	}
	public function subscribe()
	{
		$this->session->set_flashdata('success',"You are successfully subscribed to our newslater");
		redirect(base_url());
	}

	public function configsettings()
	{
		$config['full_tag_open'] = '<ul class="pagination pull-right">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['first_link'] = '&lt;&lt;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = '&gt;&gt;';
		$config['num_links'] = 5;
		$config["uri_segment"] = $this->uri->total_segments();
		$config['per_page'] = 12;
		return $config;
	}


	public function collection_brand()
	{
		$data['brands_list']=$brands=$this->ref_brand->select('brand_id,brand_name')->get_many_by('is_active',true);
		if(!empty($brands))
		{
			foreach ($brands as $key => $value) {
				$brand_ids[]=$value->brand_id;
			}
			$data['brand_images']=$this->lnk_brands_to_docs->get_unique_brand_images($brand_ids);
			$data['sub_catlist']=$this->ref_subcat->get_subcats_with_cat();
		}
		$view = 'impression/brand_collection_view';
		echo Modules::run('template/impression_Template', $view, $data);
	}

	public function brand($brand_id='')
	{
		if($this->session->User_Id)
		{
			$data['user_favorite_products']=$this->lnk_usr_to_fav->get_fav_produt_with_prodname($this->session->User_Id);
		}
		$data['brands_list']=$this->ref_brand->select('brand_id,brand_name')->get_many_by('is_active',true);
		$data['sub_catlist']=$this->ref_subcat->get_subcats_with_cat();
		$data['season_list']=$this->ref_season->select('season_id,season')->get_many_by('is_active',true);
		if(isset($_GET['srchterm']) ||isset($_GET['cat']) || isset($_GET['sil'])|| isset($_GET['neck']) || isset($_GET['waist']))
		{
			$intersect=$this->search();
			$query_string=http_build_query($_GET);
			$config=$this->configsettings();
			$config['suffix']="?".$query_string;
			if($brand_id)
			{
				$config['base_url'] = base_url('impression/brand/'.$brand_id.'/');
			}else{
				$config['base_url'] = base_url('impression/brand/');
			}
			
			$config['first_url'] = $config['base_url'].'?'.$query_string;
			$config['total_rows'] =count($intersect);
			$this->pagination->initialize($config); 
			if(count($intersect))
			{
				if($brand_id)
				{
					$intersect1=array_slice($intersect, $this->uri->segment(4), $config['per_page']);
				}else{
					$intersect1=array_slice($intersect, $this->uri->segment(3), $config['per_page']);
				}
				$data['product_list'] =$product_list=$this->tbl_product->get_product_list_within($intersect1);
			}else{
				$data['product_list'] =$product_list=array();
			}
		 	if(!empty($product_list))
	        {
	       		$data['image_list']= $this->lnk_produt_to_docs->get_product_images($intersect1) ;
	       	}
	        $data['links'] = $this->pagination->create_links();
	        $data['breadCrumb']["Home"]=base_url('/');
	        $data['breadCrumb']["Collections"]=base_url('impression/collection_brand');
			$view = 'impression/list_result';
		}
		elseif($brand_id)
		{ 
			$config=$this->configsettings();
			$config['base_url'] = base_url('impression/brand/');
	        $config['total_rows'] =$this->tbl_product->count_by(array('is_active'=>true,"brand_id"=>$brand_id));
	        $this->pagination->initialize($config); 
	        $data['product_list'] =$product_list= $this->tbl_product->limit($config['per_page'], $this->uri->segment(4))->get_many_by(array('is_active'=>true,"brand_id"=>$brand_id));
	        if(!empty($product_list))
	        {
	        	foreach ($product_list as $product) {
	        		$product_ids[]=$product->product_id;
	        	}
	        
	       	$data['image_list']= $this->lnk_produt_to_docs->get_product_images($product_ids) ;
	       	}
	        $data['links'] = $this->pagination->create_links();
	        $data['breadCrumb']["Home"]=base_url('/');
	        $data['breadCrumb']["Brands"]=base_url('impression/collection_brand');
	        $last=$this->ref_brand->select('brand_name')->get($brand_id);
	        $data['breadCrumb']["Last"]=$last->brand_name;
	        $view = 'impression/list_result';
		}else{
			$data['collection_list1']=$this->ref_coll->get_list_with_images();
			$view = 'impression/collection_view';
		}
		echo Modules::run('template/impression_Template', $view, $data);
	}

	public function style($product_id)
	{
		if($this->session->User_Id)
		{
			$data['user_favorite_products']=$this->lnk_usr_to_fav->get_fav_produt_with_prodname($this->session->User_Id);
		}
		if($product_id)
		{
			$data['product_details']=$this->tbl_product->get($product_id);
			$data['product_subcat_list']=$this->lnk_produt_to_subcat->get_many_by('product_id',$product_id);
			$data['product_images_list']=$this->lnk_produt_to_docs->get_product_images($product_id);
		}
		$data['store_list']=$this->store->select('store_name,email_id')->get_many_by('is_active',true);
		$data['brands_list']=$this->ref_brand->select('brand_id,brand_name')->get_many_by('is_active',true);
		$data['catagory_list']=$this->ref_cat->select('cat_id,cat_name')->get_many_by('is_active',true);
		$data['sub_catlist']=$this->ref_subcat->select('sub_cat_id,sub_cat_name,cat_id')->get_many_by('is_active',true);
		$data['collection_list']=$this->ref_coll->select('collection_id,collection_name')->get_many_by('is_active',true);
		$data['season_list']=$this->ref_season->select('season_id,season')->get_many_by('is_active',true);
		$view = 'impression/style_details';
		echo Modules::run('template/impression_Template', $view, $data);	
	}

	public function subcat($sub_cat_id='')
	{
		if($this->session->User_Id)
		{
			$data['user_favorite_products']=$this->lnk_usr_to_fav->get_fav_produt_with_prodname($this->session->User_Id);
		}
		$data['brands_list']=$this->ref_brand->select('brand_id,brand_name')->get_many_by('is_active',true);
		$data['sub_catlist']=$this->ref_subcat->get_subcats_with_cat();
		if($brand_id)
		{ 
			$config['full_tag_open'] = '<ul class="pagination pull-right">';
			$config['full_tag_close'] = '</ul>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['first_link'] = '&lt;&lt;';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['last_link'] = '&gt;&gt;';
			$config['num_links'] = 5;
			$config["uri_segment"] = $this->uri->total_segments();

			//$config['base_url'] = $this->uri->uri_string();
			$config['base_url'] = base_url('impression/subcat/'.$sub_cat_id);
	        $config['total_rows'] =$this->tbl_product->count_by(array('is_active'=>true,"brand_id"=>$brand_id));
	        $config['per_page'] = 12;
	        $this->pagination->initialize($config); 
	        $data['product_list'] =$product_list= $this->tbl_product->limit($config['per_page'], $this->uri->segment(4))->get_many_by(array('is_active'=>true,"brand_id"=>$brand_id));
	        if(!empty($product_list))
	        {
	        	foreach ($product_list as $product) {
	        		$product_ids[]=$product->product_id;
	        	}
	        
	       	$data['image_list']= $this->lnk_produt_to_docs->get_product_images($product_ids) ;
	       	}
	        $data['links'] = $this->pagination->create_links();
	        $data['breadCrumb']["Home"]=base_url('/');
	        $data['breadCrumb']["Brands"]=base_url('impression/collection_brand');
	        $last=$this->ref_brand->select('brand_name')->get($brand_id);
	        $data['breadCrumb']["Last"]=$last->brand_name;
	        $view = 'impression/list_result';
		}else{
			$data['collection_list1']=$this->ref_coll->get_list_with_images();
			$view = 'impression/collection_view';
		}
		echo Modules::run('template/impression_Template', $view, $data);
	}




	public function stores($store_id=''){
		$data='';
		if($store_id)
		{ // when you receive the store id 
			$data['store_details']=$this->store->get($store_id);
			$data['event_list']=$this->tbl_trunkshows->get_active_events_by_store($store_id);
			$view = 'impression/store_view';
		}else{
			$view = 'impression/store_view';
		}
		echo Modules::run('template/impression_Template', $view, $data);
	}

	public function favorites()
	{
		///getthe loggedin user and fetch his gavrite
		
		if($this->session->User_Id)
		{

			$data['product_ids']=$product_list=$this->lnk_usr_to_fav->get_fav_produt_with_prodname($this->session->User_Id);
			//$this->mprint($this->db->last_query());
			if(!empty($product_list))
	       	 {
		        	foreach ($product_list as $product) {
		        		$product_ids[]=$product['product_id'];
        			}
	        	if(!empty($product_ids))
	        	{
	        		$data['image_list']= $this->lnk_produt_to_docs->get_product_images($product_ids) ;
	        	}
			}else{
				$data['error']="<p class='alert alert-danger'><b>There are no favorites Styles from you</b></p>";
			}
		}else{
			$data['error']="<p class='alert alert-danger'><b>Please Login to see your favorites Styles</b></p>";
		}
		$view = 'impression/favorites';
		echo Modules::run('template/impression_Template', $view, $data);	
	}

	public function manage_fav()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		if(isset($posted_data['is_secure_request']) and $posted_data['is_secure_request']=="uKrt)6")
		{
			$inp=array('user_id'=>$this->session->User_Id,'product_id'=>$posted_data['product_id']);
			$count=$this->lnk_usr_to_fav->count_by($inp);
			if($count)
			{
				$this->lnk_usr_to_fav->delete_by($inp);
				echo 0;
			}else{
				$this->lnk_usr_to_fav->insert($inp);
				echo 1;
			}
		}
	}

	public function about_us(){
		$data['about_us_content']=$this->tbl_pages->get_many_by('page_id',1);
		$view = 'impression/about_us';
		echo Modules::run('template/impression_Template', $view, $data);	
	}

	public function real_brides()
	{
		$data['real_brides']=$this->stories->get_stories_by_image();
		//$this->mprint($data);
		$view = 'impression/real_brides';
		echo Modules::run('template/impression_Template', $view, $data);	
	}

	public function share_story()
	{
		$data='';
		$view = 'impression/share_story';
		echo Modules::run('template/impression_Template', $view, $data);	
	}

	public function share_story_save()
	{
		
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('b_fname', 'g_fname', 'email','style','wedding_day', 'purchased_from_store','weddingstory_desc','service_id','service_name','service_website'), $posted_data);
/*		if(isset($posted_data['store_id']))
		{
			$this->store->update($posted_data['store_id'], $required_array);
		}else{*/
			$this->stories->insert($required_array);
			$product_id=$this->db->insert_id();//story_id aka product_id
		//}


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
		            //$this->mprint($error);
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

         	$this->load->library('email');
			$msg ="\nHi ".$required_array['email'].",\n";

			$msg.="\nThank you for sharing your Story with Impression Bridal!";

			$msg.="\nWe wll review it very carefully and publish it soon.";
			//echo 'here is the msg'.$msg; 
			$msg.="\nWe look forward to working with you.";

			$msg.="\n\nWith love, \nImpression Bridal";
			//echo $msg; 
			
			$this->email->from('info@impressionrbidalstore.com','Impression Bridal');
			$this->email->to($required_array['email']);//$input['first_name']
			$this->email->subject("Welcome, Impression Bridal");
			$this->email->message($msg);						
			if($this->email->send())
			{
				$this->session->set_flashdata('success',"Your Story is submitted successfully. We will publish it very soon");
			}
			else{
				$this->session->set_flashdata('success',">Password Sent On your Email-ID...!");
				$data['error'] = $this->email->print_debugger(array('headers'));
				//$this->mprint($data);
		 	}
		}
		redirect(base_url('impression/real_brides'));
	}

	public function appointment($store_id='')
	{
		$data['store_list1']=$this->store->select('store_id,store_name,email_id')->get_many_by('is_active',true);
		$data['store_id']=$store_id;
		$view = 'impression/appointment';
		echo Modules::run('template/impression_Template', $view, $data);
	}

	public function appointment_submit()
	{

			$this->load->library('email');
			$msg ="\n\nHello: Admin\n";
			$msg.="\nYou have received a query for appointment.";
			$msg.="\nName: ".$_POST['name'];
			$msg.="\nEmail Addres: ".$_POST['email'];
			$msg.="\nPhone Number: ".$_POST['phone'];
			$msg.="\nInterested In: ".$_POST['optradio'];
			$msg.="\nPreferred Contact: ".$_POST['optchoice'];
			$msg.="\nDate: ".$_POST['wear_date'];
			$msg.="\nMessage: ".$_POST['message'];
			$msg.="\n\nThank You \nAdministrator\nImpression Bridal";
			$store_email=$_POST['store_email'];
			//echo $msg; 
			
			$this->email->from('info@impressionrbidalstore.com','Impression Bridal');
			$this->email->to($_POST['store_email']);//$input['first_name']
			$this->email->subject("New Appointment Query");
			$this->email->message($msg);						
			if($this->email->send())
			{
				$this->session->set_flashdata('success',"Your Apoointment is booked successfully");
			}
			else{
				//$this->session->set_flashdata('success',">Password Sent On your Email-ID...!");
				$data['error'] = $this->email->print_debugger(array('headers'));
				//$this->mprint($data);
		 	}
		redirect('impression/appointment');
	}

	public function event_trunkshow()
	{
		$data['event_list_by_store']=$this->tbl_trunkshows->get_future_events_by_store();
		$view = 'impression/event_trunkshow';
		echo Modules::run('template/impression_Template', $view, $data);	
	}

	public function careers()
	{
		$data['jobs_list']=$this->tbl_jobs->get_many_by('is_active',true);
		$view = 'impression/careers';
		echo Modules::run('template/impression_Template', $view, $data);	
	}

	public function contact_us()
	{
		$data['store_list1']=$this->store->select('store_name,email_id')->get_many_by('is_active',true);
		$view = 'impression/contact_us';
		echo Modules::run('template/impression_Template', $view, $data);	
	}

	public function contact_us_submit_smtp(){
    	$config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mail.impressionbridalstore.com',
                'smtp_port' => 25,
                'smtp_user' => 'mail.impressionbridalstore.com', // change it to yours
                'smtp_pass' => 'y&Sa-IT=$gzD', // change it to yours
                'smtp_timeout'=>20,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE,
                'crlf' => "\r\n",
				'newline' => "\r\n"
       		);

    	$this->load->library('email', $config);
  		$this->email->set_newline("\r\n");
    	$this->email->from('info@impressionbridal.com', 'Impression Bridal');
    	$data = array(
       		'userName'=> 'Impression Bridal'
        );
    	$this->email->to('info@impressionbridal.com'); // replace it with receiver mail id
  		$this->email->subject('contact Us Form Submit'); // replace it with relevant subject
    	$body = $this->load->view('impression/template/contact_us.php',$data,TRUE);
    	$this->email->message($body); 
    	if($this->email->send())
			{
				$this->session->set_flashdata('success',"Your form is submitted, We will get back to you soon!");
				redirect('impression/contact_us');
			}
			else{
					$this->session->set_flashdata('error',"There was error occured while submitting the form!");
					$data['error'] = $this->email->print_debugger(array('headers'));
					echo "<pre>";print_r($data['error']);echo "</pre>";die;
			 }
 	}

	function contact_us_submit()
	{ 	
			$msg ="\n\nHello: Admin\n";

			$msg.="\nYou have received a query from website.";
			$msg.="\nName: ".$_POST['name'];
			$msg.="\nEmail Addres: ".$_POST['user_email'];
			$msg.="\nPhone Number: ".$_POST['phone'];
			$msg.="\nPreferred Contact: ".$_POST['optOption'];
			$msg.="\nReason: ".$_POST['reason'];
			$msg.="\nMessage: ".$_POST['message'];
			$store_email=$_POST['store_email'];

			$msg.="\n\nThank You \nAdministrator\nImpression Bridal";
			//echo $msg; 
			$this->load->library('email');
			$this->email->from('info@impressionbridal.com');
			$this->email->to($store_email);
			$this->email->subject("Contact Us Query");
			$this->email->message($msg);						
			if($this->email->send())
			{
				$this->session->set_flashdata('success',"Your form submitted successfully. We will get back to you soon");
				redirect('impression/contact_us');
			}
			else{
				$this->session->set_flashdata('error',"There was error occured while submitting the form");
				$data['error'] = $this->email->print_debugger(array('headers'));
				//$this->mprint($data);
				redirect('impression/contact_us');
			 }
	}

}