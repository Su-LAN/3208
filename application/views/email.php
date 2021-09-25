<style>
.col-md-9{
    margin-top: 100px;
    margin-left: 10vw;
}
</style>
<?php echo form_open(base_url().'index.php/email/send'); ?>
<div class="col-md-9" >
		<div class="panel panel-default">
			<div class="panel-body message">
				<p class="text-center">New Email</p>

					<div class="form-group">
				    	<label for="to" class="col-sm-1 control-label">To:</label>
				    	<div class="col-sm-11">
                              <input name="to" type="email" class="form-control select2-offscreen" id="to" placeholder="Type email" tabindex="-1">
				    	</div>
				  	</div>
					<div class="form-group">
				    	<label for="cc" class="col-sm-1 control-label">CC:</label>
				    	<div class="col-sm-11">
                              <input name="cc" type="email" class="form-control select2-offscreen" id="cc" placeholder="Type email" tabindex="-1">
				    	</div>
				  	</div>
					<div class="form-group">
				    	<label for="bcc" class="col-sm-1 control-label">BCC:</label>
				    	<div class="col-sm-11">
                              <input name="bcc" type="email" class="form-control select2-offscreen" id="bcc" placeholder="Type email" tabindex="-1">
				    	</div>
					</div>
					<div class="form-group">
				    	<label for="subject" class="col-sm-1 control-label">Subject:</label>
				    	<div class="col-sm-11">
                              <input name="subject" class="form-control select2-offscreen" id="subject" placeholder="Type title" tabindex="-1">
				    	</div>
				  	</div>		
					<br/>
					<div class="form-group">
						<textarea name="msg" class="form-control col-sm-11" id="message" name="body" rows="9" placeholder="Mail"></textarea>
					</div>
					
					<div class="form-group">	
						<button type="submit" class="btn btn-success">Send</button>
					</div>
				</div>	
			</div>	
		</div>	
	</div>
	<?php echo form_close(); ?>