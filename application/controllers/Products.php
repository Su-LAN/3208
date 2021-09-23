<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Products extends CI_Controller{ 
     
    function  __construct(){ 
        parent::__construct(); 
         
        // Load paypal library 
        $this->load->library('paypal_lib'); 
         
        // Load product model 
        $this->load->model('product'); 
    } 
     
    function index(){ 
        $data = array(); 
         
        // Get products from the database 
        $data['products'] = $this->product->getRows(); 
         
        // Pass product data to the view 
        $this->load->view('products/index', $data); 
    } 
     
    function buy($id){ 
        // Set variables for paypal form 
        $returnURL = base_url().'paypal/success'; //payment success url 
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url 
        $notifyURL = base_url().'paypal/ipn'; //ipn url 
         
        // Get product data from the database 
        $product = $this->product->getRows($id); 
         
        // Get current user ID from the session (optional) 
        $userID = !empty($_SESSION['userID'])?$_SESSION['userID']:1; 
         
        // Add fields to paypal form 
        $this->paypal_lib->add_field('return', $returnURL); 
        $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('item_name', $product['name']); 
        $this->paypal_lib->add_field('custom', $userID); 
        $this->paypal_lib->add_field('item_number',  $product['id']); 
        $this->paypal_lib->add_field('amount',  $product['price']); 
         
        // Render paypal form 
        $this->paypal_lib->paypal_auto_form(); 
    } 
}