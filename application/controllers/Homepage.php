<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function index(){
        $this->load->model('file_model');
        $data["query"] = $this->file_model->print_data();
        $data["is_login"]=$this->session->userdata('logged_in');
         $this->load->view('template/header',$data);
		 $this->load->view('homepage',$data);
         $this->load->view('template/footer');
    }
    public function show_homepage(){
        $this->load->model('file_model');
        $query = $this->file_model->print_data();
        foreach($query as $value){
            //Print the element out.
            print_r($value);
            echo "<br>";
        }
    }
    public function searchon(){
        $this->load->model('file_model');
        $key_word = $this->input->post("search");
        $data["query"] = $this->file_model->search_data($key_word);
        $data["is_login"]=$this->session->userdata('logged_in');
         $this->load->view('template/header',$data);
		 $this->load->view('homepage',$data);
         $this->load->view('template/footer');
    }
    public function show(){
        $this->load->model('file_model');
        $this->load->model('user_model');
        // if ($this->user_model->login("SU",password_hash("Lansu123", PASSWORD_DEFAULT))){
        //     echo "1";
        // }else{
        //     echo '2';
        // }
        //$hash =  password_hash("Lansu123", PASSWORD_DEFAULT);
        //echo"<br>";
         echo password_hash("Lansu123", PASSWORD_DEFAULT);
         echo"<br>";
         echo password_hash("Lansu123", PASSWORD_DEFAULT);
        // if (password_verify("Lansu123", $hash)) {
        //     echo 'Password is valid!';
        // } else {
        //     echo 'Invalid password.';
        // }

    }public function show1(){
        $this->load->view("test");
        // foreach($query as $value){
        //     $array = json_decode(json_encode($value), true);
        //     echo $array;
        //     }
        // $localIP = getHostByName(getHostName());
        // list($ip1, $ip2, $ip3, $ip4) = explode(".", $localIP);
        // echo $ip1;
    }
    public function search_detail(){
        $this->load->model('file_model');
        $fileid = $this->input->post('fileid');
        $query = $this->file_model->get_file_by_id($fileid);
        $array = json_decode(json_encode($query), true);
        $data["username"] = $array["username"];
        $data["is_like"] = $this->file_model->check_like($this->session->userdata("username"),$fileid);
        $data["src"]= base_url().'/uploads/'.$array["filename"];
        $data["query"] = $this->file_model->show_description_detail($fileid);
        $data["fileid"] = $this->input->post('fileid');
        $data["is_login"]=$this->session->userdata('logged_in');
         $this->load->view('template/header',$data);
		 $this->load->view('card_detail',$data);
         $this->load->view('template/footer');
    }
    public function show_detail(){
        $this->load->model('file_model');
        $data["username"] =  $this->input->post('username');
        $username = $this->input->post('username');

        $fileid = $this->input->post('fileid');
        $data["src"]=$this->input->post('src');
        $data["query"] = $this->file_model->show_description_detail($fileid);
        $data["is_like"] = $this->file_model->check_like($this->session->userdata("username"),$fileid);
        $data["fileid"] = $this->input->post('fileid');
        $data["is_login"]=$this->session->userdata('logged_in');
        $this->load->view('template/header',$data);
		$this->load->view('card_detail',$data);
        $this->load->view('template/footer');

        // foreach($result as $value){
        //     $array = json_decode(json_encode($value), true);
        //     echo $array["description"];
        //     }
    }
    
    function fetch()
    {
     $output = '';
     $this->load->model('file_model');
     $data = $this->file_model->ajax_fetch_data($this->input->post('limit'), $this->input->post('start'),
     $this->input->post('fileid'));
     if($data->num_rows() > 0)
     {
      foreach($data->result() as $row)
      {
       $output .= '
       <div class="post_data">
        <h3 class="text-danger">'.$row->username.'</h3>
        <p>'.$row->description.'</p>
       </div>
       ';
      }
     }
     echo $output;
    }


    public function add_comment(){
        $this->load->model('file_model');
        $username = $this->session->userdata("username");
        $fileid = $this->input->post('fileid');
        $comment =$this->input->post('comment');
        if($comment != NULL and $username != null){
            $this->file_model->add_comment($username,$fileid,$comment);
        }else if($comment != NULL and $username == null){
            $localIP = getHostByName(getHostName());
            list($ip1, $ip2, $ip3, $ip4) = explode(".", $localIP);
            $username = "Anonymous".$ip1.".".$ip2.".***.***";
            $localIP_address = getHostByName(getHostName());
            $this->file_model->add_anon_comment($username,$localIP_address,$fileid,$comment);
            
        }
        $data["username"] =  $this->input->post('username');
        $fileid = $this->input->post('fileid');
        $data["src"]=$this->input->post('src');
        $data["query"] = $this->file_model->show_description_detail($fileid);
        $data["is_like"] = $this->file_model->check_like($this->session->userdata("username"),$fileid);
        $data["fileid"] = $this->input->post('fileid');
        $data["is_login"]=$this->session->userdata('logged_in');
        $this->load->view('template/header',$data);
		$this->load->view('card_detail',$data);
        $this->load->view('template/footer');
    }
    public function like(){
        $this->load->model('file_model');
        $data["src"]=$this->input->post('src');
        $data["fileid"] = $this->input->post('fileid');
        $data["is_login"]=$this->session->userdata('logged_in');
        $username = $this->session->userdata("username");
        $data["username"] =  $this->input->post('username');
        $fileid = $this->input->post('fileid');
        $this->file_model->set_like($username,$fileid);
        $data["is_like"] = $this->file_model->check_like($username,$fileid);
        $this->load->view('template/header',$data);
		$this->load->view('card_detail',$data);
        $this->load->view('template/footer');
    }
    public function collect(){
        $this->load->model('file_model');
        $username = $this->session->userdata("username");
        $fileid = $this->input->post('fileid');
        $this->file_model->collect($username,$fileid);
        $data["query"] = $this->file_model->print_data();
        $data["is_login"]=$this->session->userdata('logged_in');
         $this->load->view('template/header',$data);
		 $this->load->view('homepage',$data);
         $this->load->view('template/footer');
    }
    public function collect_list(){
        $this->load->model('file_model');
        $username = $this->session->userdata("username");
        $data["query"] = $this->file_model->get_collect_list($username);
        $data["is_login"]=$this->session->userdata('logged_in');
         $this->load->view('template/header',$data);
		 $this->load->view('homepage',$data);
         $this->load->view('template/footer');
    }
}
?>