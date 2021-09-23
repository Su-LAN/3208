<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Twilio\Rest\Client;
 
class Sms extends CI_Controller {
 
 public function index()
 {
    $this->load->model('file_model');
        $data["query"] = $this->file_model->print_data();
        $data["is_login"]=$this->session->userdata('logged_in');
         $this->load->view('template/header',$data);
		 $this->load->view('message');
         $this->load->view('template/footer');
 }
 public function send_message(){
    $message = $this->input->post('message');
    $data = ['phone' => '+61415898868', 'text' => $message ];
    $this->sendSMS($data);
    $this->load->model('file_model');
        $data["query"] = $this->file_model->print_data();
        $data["is_login"]=$this->session->userdata('logged_in');
         $this->load->view('template/header',$data);
		 $this->load->view('homepage',$data);
         $this->load->view('template/footer');
 }
 protected function sendSMS($data) {
          // Your Account SID and Auth Token from twilio.com/console
            $sid = 'ACbd47b25233b1ad7a03c6298ee3bbebdc';
            $token = '8b82d1bc6b46fca02332e1b34f85883b';
            $client = new Client($sid, $token);
 
            // Use the client to do fun stuff like send text messages!
             return $client->messages->create(
                // the number you'd like to send the message to
                $data['phone'],
                array(
                    // A Twilio phone number you purchased at twilio.com/console
                    "from" => "+18304444350",
                    // the body of the text message you'd like to send
                    'body' => $data['text']
                )
            );
    }
}