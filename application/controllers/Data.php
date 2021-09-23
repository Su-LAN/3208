<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function index(){
        $this->load->model('file_model');
        $query = $this->file_model->print_data();
        foreach($query as $value){
            $array = json_decode(json_encode($value), true);
            
            print_r($value);
            echo "<br>";
            echo $array['username'];
            echo "<br>";
        }
    }
}
?>