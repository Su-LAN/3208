<div class="container pt-3" id="login_form" >
    <?php echo form_open(base_url().'index.php/forgotpw/forget_pw'); ?>
				<h2 class="text-center">Forget the password</h2>
                    <div class="form-group">
                        Enter your E-mail
						<input type="text" class="form-control" placeholder="Email" required="required" name="email">
                    </div>
					<div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" id="login_btn">submit</button>
                    </div>
                    <div style:"color = '#AFA';">
                        <?php echo form_error('email');?>
                    </div>
    <?php echo form_close(); ?>
</div>