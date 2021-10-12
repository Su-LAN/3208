<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
    public function index(){
        $this->load->model('file_model');
        $key_word = $this->input->post("search");
        $data["query"] = $this->file_model->search_data($key_word);
        $data["is_login"]=$this->session->userdata('logged_in');
         $this->load->view('template/header',$data);
		 $this->load->view('homepage',$data);
         $this->load->view('template/footer');
    }
    public function fatch()
    {
		$this->load->model('file_model'); // load file_model 
        $output = '';
        $query = '';
        if($this->input->get('query')){ 
            $query = $this->input->get('query'); // get search query send from ajax search form
        }
        $data = $this->file_model->fetch_data($query); //send query to file_model and put result to $data
            if(!$data == null){
                echo json_encode ($data->result()); //send result back
            }else{
                echo  ""; // no result found
            }
    }
}
?>
