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
                     <li><a href="<?php echo base_url(); ?>user">Back to profile</a></li>
                  </ul>
               </div>
            </nav>
            <form action="<?php echo base_url().'user/edit_user_info';?>" method="post" enctype="multipart/form-data">
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="container d-flex justify-content-center" id = "row">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> 
                                <div class="row justify-content-center" id="upload_form">
                                    <div >
                                        <!-- <?php echo $userdata["error"];?> -->
                                        
                                        <div class="form-group">
                                            <input type="file" name="userimg" size="20" id="file_update" class="upload"  style="display:none;"/>
                                            <label for="file_update">
                                            <img width="100" height="100" src="https://infs3202-5b0df042.uqcloud.net/infs3200/uploads/user_avatar/<?php echo $path;?>" class="img-radius" alt="User-Profile-Image"/> 
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                

                                






                                </div>
                                <h6 class="f-w-600">Hi <?php echo $username;?></h6>
                                <p>Web Designer</p> 
                                <button type="submit" class="btn btn-primary btn-block">finish</button>
                                <div>
                                    <?php echo form_error('email');?>
                                    <?php echo form_error('phone');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">
                                        <input class="form-control" placeholder="Enter your E-mail" name= "email" type="text" ></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">
                                        <input class="form-control" placeholder="Enter your phone" name= "phone"type="text">
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Register date</p>
                                        <h6 class="text-muted f-w-400"><?php echo $r_date;?></h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Recent</p>
                                        <h6 class="text-muted f-w-400">Sam Disuja</h6>
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
</form>
