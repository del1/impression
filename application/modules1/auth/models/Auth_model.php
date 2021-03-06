<?php
class Auth_model extends MY_Model {
	public $_table = 'tbl_users';
	public $primary_key = 'user_id';
    public function __construct()
    {
        parent::__construct();
    }
 	public function __call($name,$arguments){
        echo "in __call method for ".$name;
	}

    public function isExist($field,$value)
    {
    	return $this->get_by($field,$value);
    }

    public function isExistG($data)
    {
    	return $this->db->get_where($data['table'],array($data['key'] => $data['value']))->result_array();
    }

    public function m_register($data)
    {
    	if(isset($data['is_secure_request']) && $data['is_secure_request']=='GzPq97')
    	{
    		unset($data['is_secure_request']);
    		$this->insert($data);
    		return $this->db->insert_id();
    	}else{
    		return FALSE;
    	}
    }

    public function m_login($data)
    {
    	$check_constrint=array('email_id');
    	foreach ($check_constrint as $value) {
    		$result=$this->isExist($value,$data['email']);
    		if(!empty($result) && count($result)==1)
    		{
    			if($result->password==$data['password'])
    			{
    				if($result->is_active==true)
    				{
		    			$responceArray=array("User_Id"=>$result->user_id,
				  		"User_Type_Id"=>$result->userlevel_id,"Email_Address"=>$result->email_id);
				  		$this->session->set_userdata($responceArray);
				  		//$input['session_id']=$c_sess_id;
				  		$this->update($result->user_id, array( 'last_login' => date('Y-m-d H:i:s') ));
						return $responceArray;	
    				}else{
    					$responceArray['error']="Your Profile is inctive! Please contact administrator";
 						return $responceArray;
    				}
    			}else{
    				$responceArray['error']="Username or Password is Incorrect";
					return $responceArray;	
    			}
    		}
    	}
    	$responceArray['error']="Username or Password is Incorrect";
		return $responceArray;	
    }




/*  last model*/

    public function login($data)
    { //shashi
		$email=$data["email"];
		$password=$data["password"];
		$input_array=array("email"=>$email);
		$query=$this->fetch_user_data_by_attr($input_array);
		if (empty($query)) {
			$input_array=array("username"=>$email);
			$query=$this->fetch_user_data_by_attr($input_array);
		}
		//return $query;
		if (!empty($query) && $query[0]["password"]==$password)
		{
			foreach ($query as $row) {
			  	$dbpassword= $row['password'];
			  	$sessionid= $row['session_id'];
			  	$userlevel= $row['userlevel'];
			}
			////check session and password
			$c_sess_id=session_id();
			$responceArray=array();
 			if ($dbpassword==$password && ($sessionid === NULL || $sessionid==$c_sess_id) || $userlevel==1 || $userlevel==3) { 

 				if($row['is_active'])
 				{
 					$responceArray=array("User_Id"=>$row['userid'],"Username"=>$row['username'],
			  		"User_Type_Id"=>$row['userlevel'],"First_name"=>$row['fname'],"Last_name"=>$row['lname'],"Email_Address"=>$row['email']);
			  		$this->session->set_userdata($responceArray);
			  		$input['userid']=$row['userid'];
			  		$input['session_id']=$c_sess_id;
			  		$input['last_login']=date('Y-m-d H:i:s');
					$this->updateLoginTimeAndSessionId($input);
					return $responceArray;	
 				}else
 				{
 					$responceArray['error']="Your Profile is inctive! Please contact administrator";
 					return $responceArray;
 				}	
			}else 
			{
				if ($dbpassword!=$password)
				{
					$responceArray['error']="Username or Password is Incorrect";
					return $responceArray;	
				}else{
					$responceArray['error']="You are already logged in";
					return $responceArray;	
				}
			}
		}else {
				$responceArray['error']="Username or Password is Incorrect";
				return $responceArray;
		} 
    } 
	public function getCountryList()
	{
		return $this->db->select('*')->get('ref_country')->result_array();
	}

    public function register($data){ //shashi
    	
    	$input['username']=$data['userName'];
    	$input['fname']=$data['firstName'];
    	$input['lname']=$data['lastName'];
    	$input['email']=$data['email'];
    	$input['password']=$data['password'];
    	if($data['nation'])
    	{
    		$input['nationality']=$data['nation'];
    	}
    	$input['howfindus']=$data['howfindus'];
    	$input['sign_up_date']=$data['timestamp'];
    	$this->db->insert('profiles',$input);
    	$userid=$this->db->insert_id();
    	$input1['email_address']=$data['email'];
    	$input1['userid']=$userid;
    	$input1['is_default']='yes';
    	$this->db->insert('contacts_email',$input1);
    	$input2['phone']=$data['phone'];
    	$input2['userid']=$userid;
    	$input2['is_default']='yes';
    	$this->db->insert('contacts_phone',$input2);
    } 

    public function updateLoginTimeAndSessionId($data)
    {
        $q=$this->db->get_where('profiles',array('userid' => $data['userid']));
        if ( $q->num_rows() > 0 )  { 
        	$this->db->where(array('userid' => $data['userid'])); 
        	$this->db->update('profiles',$data); 
    	}
    }



    public function checkuserNameToRegister($data){ //shashi
    	$username=$data['username'];
		return $this->db->select('username')
		//->like("username",$username)->get('profiles')
		->get_where('profiles',array("username"=>$username))
		->result_array();	
    }

    public function checkEmailToRegister($data){ //shashi
    	$arr['email']=$data['email'];
    	if(isset($data['userid']))
    	{
    		$arr['userid']=$data['userid'];
    	}
		return $this->db->select('email')
		->get_where('profiles',$arr)
		->result_array();	
    }

    public function checkPhoneNoExist($data){ //shashi
    	$phone=$data['phone'];
		return $this->db->select('phone')
		->get_where('contacts_phone',array("phone"=>$phone))
		->result_array();	
    }

    


	public function fetch_user_data_by_attr($attr_array){ //shashi
		//input as $data=array('Email',$email) OR $data = array('User_id' => $user_id);;
	  	//returns reultant array->check empty array in caller
		$attr1=key($attr_array);
		/*return $this->db->select('userid, userlevel, password, email, fname, lname, username,is_active')*/
		return $this->db->select('*')
					->get_where('profiles',array($attr1 => $attr_array[$attr1]))
					->result_array();
	}


	public function logout($User_Id) //shashi
	{
		$data = array (
		'logout_time' => date('Y-m-d H:i:s'),
		'session_id'=>NULL,
		);
		$this->db->where(array('userid' => $User_Id)); 
		$this->db->update('profiles',$data); 
	}


/*edit  user_model part copied*/
		public function cancelAssignment($data)
		{
			//reason to add is checked the first time 
			$artcid=$data['artcid'];
			$userid=$data['userid'];
			//update deadline for assignment in deadlinetable
			$where="artcid = '$artcid' AND userid = $userid  AND  (ISNULL(isdisbaled) OR isdisbaled != 1) AND (ISNULL(iscompleted) OR iscompleted != 1)";

	     	$input['isdisbaled']=1;
	     	$this->db->where($where);
	     	$this->db->update('userartcrecord',$input);
	     	
	     	$userLevel=$this->getUserLevel($userid);
	     	if($userLevel['userlevelid']==4)
	     	{
		        $input4['artcid']=$artcid;
		        $input4['artcstatusid']=1;
		        $this->ChangeArtcStatus($input4);
	     	}elseif($userLevel['userlevelid']==3)
	     	{
		        $input4['artcid']=$artcid;
		        $input4['artcstatusid']=3;
		        $this->ChangeArtcStatus($input4);
	     	}
			$this->addUserToBlacklist($data);
		}


		public function getUserLevel($userid)
		{
			//get level of user by userid
			$this->db->select('userlevelid');
	     	$this->db->from('user');
	     	$this->db->where('userid',$userid); 
			$query=$this->db->get();
			$response=$query->result_array();	
			return $response[0];
		}


		public function ChangeArtcStatus($data)
		{
			$artcid=$data['artcid'];
			$input['artcstatusid']=$data['artcstatusid'];
	        $this->db->where('artcid',$artcid); 
	        $this->db->update('articles',$input);
		}





		public function resetPassword($data)
		{
			$UserId=$data['UserId'];
	        $this->db->where('UserId',$UserId); 
	        $this->db->update('usertable',$data); 
		}
    	public function autoCancel()
        {			
        	return $this ->db->select('userid,artcid,dlendtime,checkedtime,dlcrossedtime,isdisbaled,iscompleted')
                      		 ->get('userartcrecord')
			          		 ->result_array();	
        }
		public function UserLogsData($User_Id)
		{
			date_default_timezone_set("Canada/Saskatchewan");
			$date=date('Y-m-d H:i:s');
			$data = array (
			'LastLogin_Timestamp' => $date,
			'currentStatus'=>1
			);
			
			$this->db->where('UserId',$User_Id);
			$this->db->update('usertable',$data);
		}
		public function setLogoutUser()
		{
			$where="`Logout_Timestamp` IS NULL AND timediff(NOW(),`LastLogin_Timestamp`) > TIME('01:00:00')";
			$data=array("currentStatus"=>0);
			$this->db->where($where);
			$this->db->update('usertable',$data);
		}


		
    }