<style>
.img_ct{
  margin-right: auto;
  margin-left: auto;
  /* background-color:white; */
}

.video_img {
  margin-right: auto;
  margin-left: auto;
  width:90%;
  height: 80%
  
}

</style>
<body id = "homepage">
  
</body>
  <?php
  $this->load->model('file_model');
  $username = $this->session->userdata("username");
  $video_thum = '<div id = "%s" class="card img_ct" style="width: 40rem;">
  <img class="card-img-top" src="%s" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">From: %s</h5>
    <p class="card-text">
    The count of the people who like this: %s
    </p>
    <input type="submit" value = "More information"class="btn btn-primary"></input>
';

$ooo = '
  <input type="submit" value = "Collect" class="btn btn-primary float-end"></input>
</div>
</div>';

$ppp = '
  <input type="submit" value = "Collected" class="btn btn-primary float-end"></input>
</div>
</div>';
    $img = base_url().'/uploads/%s';
        foreach($query as $value){
          $array = json_decode(json_encode($value), true);
          $img_file = sprintf($img, $array['filename']);
          $count = $this->file_model->count_favourite($array['id'])->count;
          $result = sprintf($video_thum, $array['id'],$img_file,$array['username'],$count);
          $input_value =  "<input type='hidden' name='%s' value = '%s'>";
          $post_username = sprintf($input_value,'username',$array['username']);
          $post_fileid = sprintf($input_value,'fileid',$array['id']);
          $post_src = sprintf($input_value,'src',$img_file);
          $this->load->model('file_model');
          echo form_open(base_url().'homepage/show_detail');
          echo $post_username;
          echo $post_fileid;
          echo $post_src;
          echo $result;
          echo form_close();
          echo form_open(base_url().'homepage/collect');
          echo $post_fileid;
          //echo $ooo;
          if($this->file_model->check_collect($username,$array['id'])){
            echo $ppp;
          }else{
            
            echo $ooo;
          }
          echo form_close();
        }
  
  ?>
  
</div>
<script>
setInterval(function(){
  var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
    console.log(scrollTop);
},100);
function current_position() {
  var pos = location.search();
  return pos;
}

$(document).ready(function () {

if (localStorage.getItem("my_app_name_here-quote-scroll") != null) {
    $(window).scrollTop(localStorage.getItem("my_app_name_here-quote-scroll"));
}

$(window).on("scroll", function() {
    localStorage.setItem("my_app_name_here-quote-scroll", $(window).scrollTop());
});

});
</script>
