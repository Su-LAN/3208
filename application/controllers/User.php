<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
    public function index(){
        $username = $this->session->userdata("username");
        $user_data = $this->user_model->get_info($username);
        
    	if (!$this->session->userdata('logged_in'))//check if user already login
		{	
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the username from cookie
				if ( $this->user_model->login($username, $password) )//check username and password correct
				{
					$user_data = array('username' => $username,'logged_in' => true );
					$this->session->set_userdata($user_data); //set user status to login in session
					$this->load->view("user_info",$user_data); //if user already logined show upload page
				}
			}else{
				redirect('index.php/login'); //if user already logined direct user to home page
			}
		}else{
			$this->load->view("user_info",$user_data); //if user already logined show login page
		}
		$this->load->view('template/footer');
    }
    public function edit_user(){
        $username = $this->session->userdata("username");
        $user_data = $this->user_model->get_info($username);
        $this->load->view("edit_user",$user_data);
        $this->load->view("template/footer");
    }
    public function edit_user_info(){
        $username = $this->session->userdata("username");
        $user_data = $this->user_model->get_info($username);
		$this->load->model('file_model');
        $config['upload_path'] = './uploads/user_avatar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '100000000';
		$config['max_width'] = '1024000';
		$config['max_height'] = '768000';
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]',array('valid_email' => 'This E-mail is valid.','is_unique' => 'This Email name has been used.'));
        $this->form_validation->set_rules('phone', 'Phone', 'is_unique[users.phone_num]',array('is_unique' => 'This phone name has been used.'));
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $img = $this->input->post('userimg');
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload('userimg')){
            if($this->form_validation->run()==TRUE){
                $username = $this->session->userdata("username");
                $this->user_model->edit_info($email,$phone,$username);
                redirect("index.php/user");
            }else{
                $this->load->view("edit_user",$user_data);
            }
        }else{
            $this->load->library('image_lib');
            $this->file_model->upload_user_avatar($username, $this->upload->data('file_name'));
            $imgpath = '/var/www/htdocs/infs3200/uploads/user_avatar/'.$this->upload->data('file_name');
            $config['source_image'] = $imgpath;
            $config['wm_text'] = 'Copyright 2021';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '16';
            $config['wm_font_color'] = 'FF0000';
            $config['wm_vrt_alignment'] = 'center';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->image_lib->initialize($config);
            $this->image_lib->watermark();


            if($this->form_validation->run()==TRUE){
                $username = $this->session->userdata("username");
                $this->user_model->edit_info($email,$phone,$username);
                redirect("index.php/user");
            }else{
                $this->load->view("edit_user",$user_data);
            }
        }
        $this->load->view('template/footer');
    }
    public function confirm_email(){
        $data["username"] = $this->session->userdata("username");
        $email = $this->input->post("email");
        $data["email"] = $this->input->post("email");
        $msg = mt_rand(1000000, 9999999);
        $data["msg"] = $msg;
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mailhub.eait.uq.edu.au',
            'smtp_port' => 25,
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE ,
            'mailtype' => 'html',
            'starttls' => true,
            'newline' => "\r\n"
            );
            $this->email->initialize($config);
            $this->email->from(get_current_user().'@student.uq.edu.au',get_current_user());
            $this->email->to($email);
            $this->email->message($msg);
            $this->email->send();
            $this->load->view("confirm_email",$data);
    }
    public function check_confirm_email(){
        $this->load->model('user_model');
        $email = $this->input->post("email");
        $username = $this->input->post("username");
        $msg = $this->input->post("msg");
        if($msg == $this->input->post('answer')){
            $this->user_model->set_confirm($username);
            $user_data = $this->user_model->get_info($username);
            $this->load->view("user_info",$user_data);
        }else{
            $user_data = $this->user_model->get_info($username);
            $this->load->view("user_info",$user_data);
        }
    }
}
?>
