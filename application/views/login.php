<?php ?>
<script>
function check_username_cookies(){
	if("<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} else {echo false;}?>" ){
		var username = "<?php echo $_COOKIE['username'];?>"
    	if(username == $("#username_input").val()){
		$("#password_input").val("<?php echo $_COOKIE['password'];?>");
	}
	}
    
}
</script>
      <div class="container pt-3" id="login_form" >
			<?php echo form_open(base_url().'index.php/login/check_login'); ?>
				<h2 class="text-center">User Login</h2>
					<div class="form-group">
						<input keyup="check_username_cookies()" onFocus="check_username_cookies()" onBlur="check_username_cookies()" type="text" id="username_input" class="form-control" placeholder="Username" required="required" name="username">
					</div>
					<div class="form-group">
						<input type="password" id="password_input" class="form-control" placeholder="Password" required="required" name="password">
					</div>
					<div class="form-group">
					<?php echo $error; ?>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" id="login_btn">Log in</button>
					</div>
					<br>
					<div class="clearfix">
						<a class="float-start" href="<?php echo base_url()?>index.php/register">Register</a>
					</div>
			<?php echo form_close(); ?>
	</div>
