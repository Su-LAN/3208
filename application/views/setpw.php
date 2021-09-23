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
        
            <style>
            #msg_input{
                margin-top: 100px;
            }
            </style>
            
            <div class="container pt-3" id="login_form" >
                <?php echo form_open(base_url().'forgotpw/set_new_pw'); ?>
				<h2 class="text-cenroup">Set the password</h2>
                <div class="form-group">
                        Enter password
						<input type="password" class="form-control" placeholder="Password" required="required" name="password_first">
                        
                    </div>
                    
					<div class="form-group">Enter password Again
						<input type="password" class="form-control" placeholder="Password" required="required" name="password_second">
                        
                    </div>
					<div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" id="login_btn">submit</button>
                    </div>
                    <?php
                        $input_value =  "<input type='hidden' name='%s' value = '%s'>";
                        $post_email = sprintf($input_value,'email',$email);
                        echo $post_email;
                    ?>


                    <div style:"color = '#AFA';">
                        <?php echo form_error('email');?>
                    </div>
    <?php echo form_close(); ?>
</div>

