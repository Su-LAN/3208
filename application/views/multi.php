
<div class="container">
    <?php echo form_open_multipart("index.php/upload/do_upload"); ?>
    <div class="col-6 col-md-4">
        Upload multiple files at the same time
        <input type="file" name="userfile" multiple size="20" class="file">     
        <input type="submit" value="upload" />
    </div>
        
    <?php echo form_close(); ?>
</div>
