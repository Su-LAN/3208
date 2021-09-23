<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Email extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('email');
        $this->load->view('template/footer');
    }
    public function send()
    {
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
        $this->email->to($this->input->post('to'));
        $this->email->cc($this->input->post('cc'));
        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('msg'));
        $this->email->send();
        $this->load->view('template/header');
        $this->load->view('email');
        $this->load->view('template/footer');
    }

}

?>