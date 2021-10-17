<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller
{
    public function index()
    {
		$data["error"] = "";
		$data["is_login"]=$this->session->userdata('logged_in');
    	if (!$this->session->userdata('logged_in'))//check if user already login
		{	
			if(get_cookie('remember')){
				$username= get_cookie('username');
				$password= get_cookie('password');
				if($this->user_model->login($username,$password)){
					$user_data=array(
						'username'=>$username,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					$this->load->view('template/header',$data); 
					$data["is_login"]=true;
					$this->load->view('file',$data);
				}
			}else{
				$data["is_login"]=$this->session->userdata('logged_in');
				redirect('index.php/login'); //if user already logined direct user to home page
			}
		}else{
			$data["is_login"]=true;
			$this->load->view('template/header',$data); 
			$this->load->view('file',$data); //if user already logined show login page
		}
		$this->load->view('template/footer');
    }
    public function do_upload() {
		
        $config['upload_path'] = base_url().'proj/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|mp4';
		$config['max_size']     = 100000000;
		$config['max_width'] = 1024000;
		$config['max_height'] = 768000;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
            $this->load->view('template/header');
            $data = array('error' =>$this->upload->display_errors());
            $this->load->view('file', $data);
            $this->load->view('template/footer');
        } else {
			$this->load->model('file_model');
			$this->file_model->upload($this->upload->data('file_name'), $this->upload->data('full_path'),$this->session->userdata('username'));
			redirect('index.php/login');
            // $this->load->view('template/header');
            // $this->load->view('homepage');
            // $this->load->view('template/footer');
        }
	}

	// Upload multiple files at the same time
	public function multiple_upload()
	{
		 echo $_FILES["userfile"];
		
		
		

	}
	
}


