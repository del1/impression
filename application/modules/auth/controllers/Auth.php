<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Del 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model','Auth');
	}
	
	public function index() 
	{
		$this->login();
	}

	public function login()
	{
        if (isset($_POST['email'])) 
        {
            $this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email' );
            $this->form_validation->set_rules( 'password', 'Password', 'required|trim' );

            if($this->form_validation->run() !== false){
                $data = array(
                    'email' => $this->input->post('email',TRUE),
                    'password' => $this->input->post('password',TRUE)
                    );
                $login=$this->Auth->M_login($data);
               	if(isset($login['User_Id']))
				{
					if($login['User_Type_Id']==1)
					{
						redirect('admin/');
					}else
					{
						redirect('impression/');
					}
				}else
				{
					if(isset($login['error']))
					{
						$this->session->set_flashdata('errorLogin',$login['error']);	
						 redirect('impression/');
					}
				}
            }else{
                $this->session->set_flashdata('errorLogin',  validation_errors('<p class="alert alert-danger">', '</p>'));
                redirect('impression/');
            }
        }else{
            $this->load->view('login_view_new');
        }
	}

	public function subscribe()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('email'), $posted_data);
		$array=array('email_address'=>$required_array['email'],'status'=> 'subscribed','ip_signup'=>$_SERVER['SERVER_ADDR'],'timestamp_signup'=>date('Y-m-d H:i:s'));
		$result = $this->mailchimp->call('POST', 'lists/'.LISTID.'/members',$array);
		if($result['status'] == '404') 
		{
			echo 'fail';
		}else{
			$this->load->library('email');
			$msg ="\nHi ".$required_array['email'].",\n";
			$msg.="\nThanks for subscribing to Impression Bridal newslatter!";
			$msg.="\nBrowse our collections, mark your favourites, and visit us at one of local stores.";
			$msg.="\nWe look forward to working with you to find your dream gown!";
			$msg.="\n\nWith love, \nImpression Bridal";
			$this->email->from('info@impressionrbidalstore.com','Impression Bridal');
			$this->email->to($required_array['email']);//$input['first_name']//$input['email_id']
			$this->email->subject("Subscription Successfull");
			$this->email->message($msg);	
			if($this->email->send())
			{
				//$this->session->set_flashdata('success',"Registration successfully completed!");
			}
			else{
				//$this->session->set_flashdata('success',"Registration successfully completed!");
				$data['error'] = $this->email->print_debugger(array('headers'));
		 	}
			echo 'success';
		}
	}
	public function register()
	{
		if (isset($_POST['email'])) {
			//$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|callback_isExist_username');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_isExist_email' );
			$this->form_validation->set_rules('password', 'Password', 'trim|required' );
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

			if($this->form_validation->run($this) !== FALSE)
			{
				$input=array(
					'first_name'=>$this->input->post('fname',TRUE),
					'last_name'=>$this->input->post('lname',TRUE),
					'email_id' =>$this->input->post('email',TRUE),
					'password' =>$this->input->post('password',TRUE),
					'zipcode' =>$this->input->post('zipcode',TRUE),
					'signup_date' => date('Y-m-d H:i:s'),
					'userlevel_id'=>2,
					'is_subscribed'=>($this->input->post('is_subscribed')? 'true' : 'false'),
					'last_updated'=>date('Y-m-d H:i:s'),
					'is_active'=>true,
					'is_secure_request'=>'GzPq97' //random token
				);
				$id=$this->Auth->m_register($input);
				if($id)
				{
					$this->session->set_flashdata('successRegister',  'Registration Successfull, Please Login');
						/*mailchmip functionality*/
						if($input['is_subscribed']=='true'){
							$array=array('email_address'=>$input['email_id'],'status'=> 'pending','merge_fields'=>array('FNAME'=>$input['first_name'],'LNAME'=>$input['last_name']),'ip_signup'=>$_SERVER['SERVER_ADDR'],'timestamp_signup'=>date('Y-m-d H:i:s'));
							$campaigns 	= $this->mailchimp->call('POST', 'lists/'.LISTID.'/members',$array);
						}
						/*end of mailchimp functionality*/


						/*mail functionlity begin*/
						$this->load->library('email');
						$msg ="\nHi ".$input['first_name'].",\n";
						$msg.="\nThanks for creating an account on Impression Bridal!";
						$msg.="\nBrowse our collections, mark your favourites, and visit us at one of local stores.";
						$msg.="\nWe look forward to working with you to find your dream gown!";
						$msg.="\n\nWith love, \nImpression Bridal";
						$this->email->from('info@impressionrbidalstore.com','Impression Bridal');
						$this->email->to('msakore@gmail.com');//$input['first_name']//$input['email_id']
						$this->email->subject("Welcome, Impression Bridal");
						$this->email->message($msg);
						//$this->email->attach("assets/img/icons/email_logo.png", "inline");	
						if($this->email->send())
						{
							$this->session->set_flashdata('success',"Registration successfully completed!");
						}
						else{
							$this->session->set_flashdata('success',"Registration successfully completed!");
							$data['error'] = $this->email->print_debugger(array('headers'));
					 	}
					redirect('impression/');
				}else
				{
					$this->session->set_flashdata('errorRegister',  '<p class="alert alert-danger">There was error occured, Please try later</p>');
					redirect('impression/');
				}
			}else{
				$this->session->set_flashdata('errorRegister',  validation_errors('<p class="alert alert-danger">', '</p>'));
    			redirect('impression/');
			}
		}else{
			redirect('impression/');
			/*$data='';
			$view = 'auth/register_view';
			echo Modules::run('template/Auth_Template', $view, $data);*/
		}
	}

	function isExist_username($username)
    {//write logic
    	$data=$this->Auth->isExist('user_name',$username);
        if (!empty($data))
        {
            $this->form_validation->set_message('isExist_username', $username.' is already used');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

	function isExist_email($email_id)
    {
        $data=$this->Auth->isExist('email_id',$email_id);
        if (!empty($data))
        {
            $this->form_validation->set_message('isExist_email', $email_id.' is already used');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function isExist()
    {
    	$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('key', 'table', 'value'), $posted_data);
    	$data=$this->Auth->isExistG($required_array);
    	if(!empty($data))
    	{
    		echo "exist";
    	}else{
    		echo "not_exist";
    	}
    }

	function forgot_password()
	{ 
		$email=$this->input->post('Email_forgott_pass');	
		
		//$data = array('Email' =>'girdtester@gmail.com');
		$input_array=array("email"=>$email);
		$query=$this->Auth_model->fetch_user_data_by_attr($input_array);
		if ($query->num_rows() > 0) {
		$response_array=$query->result();
		}
		
		if(empty($response_array))//email not found case
		{
			//"email is not valid";
			$this->session->set_flashdata('success',"Password reset link has been sent to your mail address");
			redirect('Login');	
		}else //email found case
		{
			foreach ($response_array as $row) 
			{
				$User_Id=$row->userid;
				$Email_Address=$row->email;
				$username=$row->username;
				//$user_salt=$row->salt;
				//$isActive=$row->Is_Active;
			}
						
			$data=array(
				'User_Id' =>$User_Id ,
				'Email_Address' =>$Email_Address,
				'Username' => $username
			); 
				//print_r($data); 	
			$this->load->library('encrypt');
			$key = "k946RvU82N";
			
			$hash=$this->encrypt->encode($User_Id,$key);
			
			$msg ="\n\nHello:".$username."\n";

			$msg.="\n\nYou have made a request to change your password.";

			$msg.="\n\nPlease click on the link below.";
			//echo 'here is the msg'.$msg; 
			$msg.="\n \nYour Reset Password Link :"."   "."http://sparkinwords.com/Auth/reset_password/".$hash;

			$msg.="\n\nPlease do not reply to this e-mail as this account is used for SEND requests only.";


			$msg.="\n\nThank You \nAdministrator\nSparkinwords";
			//echo $msg; 
			$this->load->library('email');
			$this->email->from('ruchibhargava1234561@gmail.com');
			$this->email->to($Email_Address);
			$this->email->subject("Sparkinwords Forgot Password");
			$this->email->message($msg);
			//$this->email->attach("assets/img/icons/email_logo.png", "inline");
				//echo $msg."    here msg part finish"; 						
			if($this->email->send())
			{
				$this->session->set_flashdata('success',"Reset Password Link Sent On your Email-ID...!");
				redirect('Login');
			}
			else{
				$this->session->set_flashdata('success',">Password Sent On your Email-ID...!");
				$data['error'] = $this->email->print_debugger(array('headers'));
				redirect('Login');
			 }
		}
	}

	public function test()
	{
		$msg = 'mahesh';
		$key='ss';
		$encrypted_string = $this->encrypt->encode($msg.$key);
		echo $encrypted_string;
		$plaintext_string = $this->encrypt->decode($encrypted_string,$key);
		echo "<br>".$plaintext_string;
	}

	public function logOut()
	{
		$User_Id=$this->session->userdata("User_Id");
		if(@$User_Id)
		{
			//$this->Auth_model->logout($User_Id);
		}		
		$this->session->sess_destroy();
		header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.	   	
		$this->session->set_flashdata('success','You are successfully Logged out');	
		redirect('impression/');
	}
}