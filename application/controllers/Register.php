<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller{
    public function index()
    {
        $this->load->view('template/create_head');
        $this->load->view('register');
        $this->load->view('template/footer');
    }
    public function check_username_email(){
        $data['error']= "";
        $this->load->view("template/create_head");
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]',array('is_unique' => 'This user name has been used.'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',array('valid_email' => 'This E-mail is valid.','is_unique' => 'This Email name has been used.'));
        $this->form_validation->set_rules('password_first', 'Password', 'required|min_length[8]|callback_is_password_strong',array('min_length' => 'Password is too short.', 'is_password_strong' => 'Your password is not strong enough.'));
        $this->form_validation->set_rules('password_second', 'Password Confirmation', 'required|matches[password_first]',array('matches' => 'Please check your password again.'));
        if($this->form_validation->run()==TRUE){
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password_first');
            $date = date("Y/m/d");
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this->user_model->register($username,$email,$hash,$date);
            $this->load->view('login',$data);
            $this->load->view('template/footer');
        }else{
            $this->load->view('register');
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