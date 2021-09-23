<?php
 //put your code here
?>
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
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="container d-flex justify-content-center" id = "row">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> 
                                    



                                    <img width="100" height="100" src="https://infs3202-5b0df042.uqcloud.net/infs3200/uploads/user_avatar/<?php echo $path;?>" class="img-radius" alt="User-Profile-Image"/>
                                </div>
                                <a href="https://www.paypal.com/donate?business=KFXBTRY2P5LV4&item_name=Buy+a+rename+card&currency_code=AUD&amount=14.99">
                                Donate AUD:14.99
                                </a>
                                <a href="<?php echo base_url('products/buy/'.'1'); ?>" class="btn">Donate USD:14.99</a>



                                <h6 class="f-w-600">Hi <?php echo $username;?></h6>
                                <p>Web Designer</p> 
                                <a href="<?php echo base_url()?>/user/edit_user">Edit</a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $email;?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Register date</p>
                                        <h6 class="text-muted f-w-400"><?php echo $r_date;?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">
                                        <?php 
                                            if($phone_num == null){
                                                echo "you have not set your phone number";
                                            }else{
                                                echo $phone_num;
                                            }
                                        ?></h6>
                                        
                                    </div>
                                    
                                    
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Is Email confirmed</p>
                                        <h6 class="text-muted f-w-400">
                                        <?php 
                                            if($is_confirm == 0){
                                                $submit_btn = '<br><input type="submit" value = "confirm"class="btn btn-primary"></input>';
                                                $input_value =  "<input type='hidden' name='email' value = '%s'>";
                                                $post_email = sprintf($input_value,$email);
                                                echo form_open(base_url().'user/confirm_email');
                                                echo $post_email;
                                                echo "NO";
                                                echo $submit_btn;
                                                echo form_close();
                                            }else{
                                                echo "YES";
                                            }
                                        ?></h6>
                                    </div>
                                    
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Share with your friend</p>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php echo base_url();?>/homepage">
                                        share with your facebook friend 
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Most Viewed</p>
                                        <h6 class="text-muted f-w-400">Dinoter husainm</h6>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
