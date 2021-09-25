<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	public function index()
	{
		$this->load->model('user_model');
		$data['different_pw_error'] = "";
		$data['same_name_error'] = "";
		$data['error']= "";
		$data['correct_create']= "";
		$data["is_login"]="";
		if (!$this->session->userdata('logged_in'))//check if user already login
		{
			if(get_cookie('remember')){
				$username= get_cookie('username');
				$hash  = $this->user_model->get_hash($username);
				if(password_verify($username,$hash)){
					$user_data=array(
						'username'=>$username,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					$this->load->view('template/create_head');
					$data["is_login"]=true;
					$this->load->view('homepage');
				}
			}
			$this->load->view('template/create_head');
			$this->load->view('login', $data); //if user has not login ask user to login
		}else{
			redirect("homepage");
		}
		
	}
	public function check_login()
	{
		$this->load->model('user_model');		//load user model
		$data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
		$this->load->helper('form');
		$this->load->helper('url');
		$username = $this->input->post('username'); //getting username from login form
		$password = $this->input->post('password'); //getting password from login form
		$remember = $this->input->post('remember');
		$hash  = $this->user_model->get_hash($username);
		if(!$this->session->userdata('logged_in')){	//Check if user already login
			
				$captcha_response = trim($this->input->post('g-recaptcha-response'));
		
			
				if (password_verify($password,$hash))//check username and password
				{
					$user_data = array(
						'username' => $username,
						'logged_in' => true 	//create session variable
						);
					if($remember){
						echo $remember.'cookies';
						set_cookie("username", $username,'300');
						set_cookie("remember", $remember,'300');
					}
					$this->session->set_userdata($user_data); //set user status to login in session
					redirect('homepage'); // direct user home page
				}else{
					$this->load->view('template/create_head');
					$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
				}
	






			
		}else{
			{
				redirect('login'); //if user already logined direct user to home page
			}
		$this->load->view('template/footer');
		}
	}

	public function logout()
	{
		$this->load->helper('url');
		$this->session->unset_userdata('logged_in'); //delete login statususername
		$this->session->unset_userdata('username');
		set_cookie("remember", false,'300');
		redirect('login'); // redirect user back to login
	}
	public function auto_logout(){
		$this->load->helper('url');
		$this->session->unset_userdata('logged_in'); //delete login statususername
		$this->session->unset_userdata('username');
		set_cookie("remember", false,'300');
	}
	public function forgot_pw(){
		$data['same_name_error']= "";
		$data['different_pw_error']= "";
		$data['correct_create']= "";
		$data['page_name']= "forgot_pw";
		$this->load->view('template/create_head');
		$this->load->view('forgotpage', $data);
		$this->load->view('template/footer');
	}
	public function creat_acc(){
		$data['correct_create']= "";
		$this->load->model('user_model');
		$data['same_name_error']= "<div class=\"alert alert-danger\" role=\"alert\"> This User name has been used !!!! </div> ";
		$data['different_pw_error']= "<div class=\"alert alert-danger\" role=\"alert\"> check your password </div> ";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/create_head');
		$new_username = $this->input->post('new_username'); //getting username from login form
		$new_phone_num = $this->input->post('phone_number');//gettiing the phone number of the user
		$first_password = $this->input->post('password_first'); //getting first password from login form
		$second_password = $this->input->post('password_second'); //getting second password from login form
		if ($this->user_model->check_user($new_username)){
			$data['different_pw_error'] = "";
			$this->load->view('forgotpage',$data);//check the username if same show error
		}else{
			if($first_password == $second_password){
				$data['different_pw_error'] = "";
				$data['same_name_error'] = "";
				$this->user_model->inster_user($new_username,password_hash($$first_password, PASSWORD_DEFAULT));
				$data['correct_create']= "
				<div class=\"alert\" role=\"alert\"> correct create users. 
				</div>
				";
				$this->load->view('forgotpage',$data);
			}else{
				$data['same_name_error'] = "";
				$data['correct_create']= "";
				$this->load->view('forgotpage',$data);
			}
		}
		$this->load->view('template/footer');
	}
	public function upload_page(){
		$data['page_name']= "";
		$this->load->view('template/header');
		$this->load->view('file',$data);
		$this->load->view('template/footer');
	}
}
?>
