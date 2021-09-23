<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgotpw extends CI_Controller{
    public function index()
    {
        $this->load->view('template/create_head');
        $this->load->view('forgotpage');
        $this->load->view('template/footer');
    }
    public function forget_pw(){
        $data['error']= "";
        $data["email"] = $this->input->post("email");
        $msg = mt_rand(1000000, 9999999);
        $data["msg"] = $msg;
       
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check',array('valid_email' => 'This E-mail is valid.','email_check'=>'This email is not registered.'));
        
        if($this->form_validation->run()==TRUE){
                $email = $this->input->post('email');
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
                $this->load->view("forgetpw_confirm",$data);
                $this->load->view('template/footer');


            

        }else{
            $this->load->view('forgotpage');
            $this->load->view('template/footer');
        }

        
    }
    public function email_check($email)
    {
        if (!$this->user_model->check_email($email))
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    public function check_msg(){
        $data["email"] =  $this->input->post("email");
        $data["msg"] =  $this->input->post("msg");
        $answer = $this->input->post("answer");
        if($answer == $data["msg"]){
            $this->load->view('template/create_head');
            $this->load->view('setpw',$data);
            $this->load->view('template/footer');
        }else{
            $this->load->view('template/create_head');
            $this->load->view('forgotpage');
            $this->load->view('template/footer');
        }
    }
    public function set_new_pw(){
        $data['error']= "";
        $this->load->view('template/create_head');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('password_first', 'Password', 'required|min_length[8]|callback_is_password_strong',array('min_length' => 'Password is too short.', 'is_password_strong' => 'Your password is not strong enough.'));
        $this->form_validation->set_rules('password_second', 'Password Confirmation', 'required|matches[password_first]',array('matches' => 'Please check your password again.'));
        if($this->form_validation->run()==TRUE){
            $email = $this->input->post('email');
            $password = $this->input->post('password_first');
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $this->user_model->change_pw($email,$hash);
            $this->load->view('login',$data);
            $this->load->view('template/footer');
        }else{
            $data['email'] = $this->input->post('email');
            $this->load->view('setpw',$data);
            $this->load->view('template/footer');
        }
    }
    public function is_password_strong($password){
        if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
            return TRUE;
        }
        return FALSE;
    }
    
}
?>