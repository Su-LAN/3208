<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favourite extends CI_Controller
{
    public function index(){
        
        $this->load->model('file_model');
        $data["query"] = $this->file_model->print_data();
        $data["is_login"]=$this->session->userdata('logged_in');
         $this->load->view('template/header',$data);
		 $this->load->view('homepage',$data);
         $this->load->view('template/footer');
    }
}
?>