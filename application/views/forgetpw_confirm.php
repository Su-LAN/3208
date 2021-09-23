<html>
        <head>
                <title>INFS3202 user_info</title>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/assets/css/user_info.css">
                <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
                <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css'>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        </head>
        <nav class="fixed-top">
               <div class="menu-icon">
                  <i class="fa fa-bars fa-2x"></i>
               </div>
               <div class="logo">
                  INFS3202
               </div>
               <div class="menu">
                  <ul>
                     <li><a href="<?php echo base_url(); ?>login/check_login">Home</a></li>
                  </ul>
               </div>
            </nav>
            <style>
            #msg_input{
                margin-top: 100px;
            }
            </style>
            
            
<?php
$input_value =  "<input type='hidden' name='%s' value = '%s'>";
$post_email = sprintf($input_value,'email',$email);
$post_msg = sprintf($input_value,'msg',$msg);
echo form_open(base_url().'forgotpw/check_msg');
            echo $post_email;
            echo $post_msg;
      echo '<div id = "msg_input">
      <input  name="answer">
      <input type="submit" value="submit">
        </div>';

echo form_close();
?>