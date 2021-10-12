<style>
.holder_default {
    width:500px; 
    height:150px; 
    border: 3px dashed #ccc;
}

#holder.hover { 
    width:400px; 
    height:150px; 
    border: 3px dashed #0c0 !important; 
}

.hidden {
    visibility: hidden;
}

.visible {
    visibility: visible;
}

</style>


<div class="container row justify-content-center" id="upload_form">
    <?php echo form_open_multipart("index.php/upload/multiple_upload"); ?>
    <p><input type="checkbox" name="anonymous" />Anonymous </p>
    <div class="col-6 col-md-4">
        Upload multiple files at the same time
        <input type="file" name="userfile[]" multiple size="20" class="file">     
        <input type="submit" value="upload" />
    </div>
        
    <?php echo form_close(); ?>
</div>

<script>
    $(document).ready(function() {
    var holder = document.getElementById('holder');
    holder.ondragover = function () { this.className = 'hover'; return false; };
    holder.ondrop = function (e) {
      this.className = 'hidden';
      e.preventDefault();
      var file = e.dataTransfer.files[0];
      var reader = new FileReader();
      reader.onload = function (event) {
          document.getElementById('image_droped').className='visible'
          $('#image_droped').attr('src', event.target.result);
      }
      reader.readAsDataURL(file);
    };
});
    function onUpload2 (file) {
            var blob = new Blob([file]), 
                url = URL.createObjectURL(blob); 
            if (/image/g.test(file.type)) {
                var img = $('<img src="' + url + '">');
                img[0].onload = function(e) {
                    URL.revokeObjectURL(this.src);
                }
                $('.preview').html('').append(img);
            } else if (/video/g.test(file.type)) {
                var video = $('<video controls src="' + url + '">');
                $('.preview').html('').append(video);
                video[0].onload = function(e) {
                    URL.revokeObjectURL(this.src);
                }
            }
        }
</script>

