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

    public function reset_password($token='')
    {
    	if($token)
    	{
	    	$token=$this->security->xss_clean($this->uri->segment(3));
	    	$token_request=$this->reset_links->get_by('lnk',$token);
	    	if(!empty($token_request))
	    	{
	    		$user_details=$this->users->get($token_request->userid);
	    		$this->load->view('auth/reset_password',$user_details);
	    	}else{
				show_404();
	    	}
	    }else{
	    	show_404();
	    }
    }

    public function update_password()
    {
		$this->form_validation->set_rules('password', 'Password', 'trim|required' );
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		if($this->form_validation->run($this) !== FALSE)
		{
			$posted_data=$this->security->xss_clean($this->input->post());
			$required_array = elements(array('password'), $posted_data);
			$required_array['last_updated']=date('Y-m-d H:i:s');
			$this->users->update($posted_data['user_id'],$required_array);
			$this->session->set_flashdata('successLogin','Your Password Changed successfully');
			redirect('impression/');
		}else{
			$this->session->set_flashdata('errorReset',  validation_errors('<p class="alert alert-danger">', '</p>'));
			redirect($_SERVER['HTTP_REFERER']);
		}
    }

	public function forgot_password()
	{ 
		$this->form_validation->set_rules('Email_forgott_pass', 'Email', 'trim|required|xss_clean');
		if($this->form_validation->run($this) !== FALSE)
		{
			$posted_data=$this->security->xss_clean($this->input->post());
			$required_array = elements(array('Email_forgott_pass'), $posted_data);
			$user_details=$this->users->get_by('email_id',$required_array['Email_forgott_pass']);
			if(!empty($user_details))
			{
				$this->load->helper('string');
				$input['userid']=$user_details->user_id;
				$input['lnk']=random_string('alnum', 79);
				$input['reg_time']=date('Y-m-d H:i:s');
				$ct=$this->reset_links->get_by('userid',$user_details->user_id);
				if(!empty($ct))
				{
					$this->reset_links->update($ct->link_id,$input);
				}else{
					$this->reset_links->insert($input);
				}
            	$config['mailtype'] = 'html';
            	$this->email->initialize($config);
            	$data['lnk']=base_url('auth/reset_password/'.$input['lnk']);
            	$data['username']=$user_details->first_name;
            	$data['fullname']=$user_details->first_name." ".$user_details->last_name;
            	//$data['logo']=base_url('assets/images/logo.png');
            	$data['logo']='http://www.impressionbridalstore.com/assets/images/logo.png';


            	/*$msg ="\n\nHello: ".$user_details->first_name."\n";
				$msg.="\n\nYou have made a request to change your password.";
				$msg.="\n\nPlease click on the link below.";
				$msg.="\n \nYour Reset Password Link :"."   ".$link;
				$msg.="\n\nPlease do not reply to this e-mail as this account is used for SEND requests only.";
				$msg.="\n\nThank You \nAdministrator\nImpression Bridal";*/
				$body = $this->load->view('auth/template/reset_password',$data,TRUE);
				$this->email->from('info@impressionrbidalstore.com','Impression Bridal');
				$this->email->to($required_array['Email_forgott_pass']);
				$this->email->subject("$user_details->first_name, here's the link to reset your password");
				$this->email->message($body);	
				if($this->email->send())
				{
					$this->session->set_flashdata('successReset',"Reset Password Link Sent On your Email address");
					//$this->mprint("success");
					redirect('impression/');
				}
				else{
					$data['error'] = $this->email->print_debugger(array('headers'));
					$this->session->set_flashdata('successReset',"Reset Password Link Sent On your Email address");
					//$this->mprint($data);
					redirect('impression/');
				 }
			}else{
				//wrong email
				$this->session->set_flashdata('successReset', 'Reset Password Link Sent On your Email address');
				redirect('impression/');
			}
		}else{
			$this->session->set_flashdata('errorReset',  validation_errors('<p class="alert alert-danger">', '</p>'));
			redirect('impression/');
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