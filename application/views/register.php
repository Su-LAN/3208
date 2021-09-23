
<div class="container pt-3" id="login_form" >
    <?php echo form_open(base_url().'register/check_username_email'); ?>
				<h2 class="text-center">Create account</h2>
					<div class="form-group">
                        Enter Username
						<input type="text" class="form-control" placeholder="Username" required="required" name="username">
                    </div>
                    <div class="form-group">
                        Enter your E-mail
						<input type="text" class="form-control" placeholder="Email" required="required" name="email">
                        
                    </div>
                    
                    <div class="form-group">
                        Enter password
						<input type="password" class="form-control" placeholder="Password" required="required" name="password_first">
                        
                    </div>
                    
					<div class="form-group">
                        Enter password Again
						<input type="password" class="form-control" placeholder="Password" required="required" name="password_second">
                        
                    </div>
					<div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" id="login_btn">submit</button>
                    </div>
                    <div style:"color = '#AFA';">
                        <?php echo form_error('username'); ?>
                        <?php echo form_error('email');?>
                        <?php echo form_error('password_first'); ?>
                        <?php echo form_error('password_second'); ?>
                    </div>
    <?php echo form_close(); ?>
</div>