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
#comments{
  height:150px;
  overflow:scroll;
}
@-webkit-keyframes placeHolderShimmer {
          0% {
            background-position: -468px 0;
          }
          100% {
            background-position: 468px 0;
          }
        }

        @keyframes placeHolderShimmer {
          0% {
            background-position: -468px 0;
          }
          100% {
            background-position: 468px 0;
          }
        }

        .content-placeholder {
          display: inline-block;
          -webkit-animation-duration: 1s;
          animation-duration: 1s;
          -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
          -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
          -webkit-animation-name: placeHolderShimmer;
          animation-name: placeHolderShimmer;
          -webkit-animation-timing-function: linear;
          animation-timing-function: linear;
          background: #f6f7f8;
          background: -webkit-linear-gradient(left, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
          background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
          -webkit-background-size: 800px 104px;
          background-size: 800px 104px;
          height: inherit;
          position: relative;
        }

        .post_data
        {
          padding:24px;
          border:1px solid #f9f9f9;
          border-radius: 5px;
          margin-bottom: 24px;
          box-shadow: 10px 10px 5px #eeeeee;
        }
</style>

<div id="homepage">
  <?php
$like_echo = '<div class="card img_ct" style="width: 40rem;">
<div class="card-body">
  <h5 class="card-title">I LIKE IT!!!</h5>
  <input type="submit" value = "LIKE"class="btn btn-primary"></input>
</div>
</div>';
$no_like_echo = '<div class="card img_ct" style="width: 40rem;">
<div class="card-body">
  <h5 class="card-title"></h5>
  <input type="submit" value = "LIKE"class="btn btn-primary"></input>
</div>
</div>';
  $description_string = "";
  $video_thum = '<div class="card img_ct" style="width: 40rem;">
  <img class="card-img-top" src="%s" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">From: %s</h5>
    <h6 class="card-text">Comment:</h6>
    <div id="comment">
      <div id="load_data"></div>
      <div id="load_data_message"></div>
    </div>
    <input class="card-text form-control input-lg" type = "text" placeholder = "Enter your comment here!" name = "comment"></input>
    <br>
    <input type="submit" value = "submit"class="btn btn-primary"></input>
  </div>
</div>';
      $input_value =  "<input type='hidden' name='%s' value = '%s'>";
      $post_username = sprintf($input_value,'username',$username);
      $post_fileid = sprintf($input_value,'fileid',$fileid);
      $post_src = sprintf($input_value,'src',$src);
      $result = sprintf($video_thum,$src,$username);
      $post_like_it = sprintf($input_value,'like_it',$is_like);
      echo form_open(base_url().'index.php/homepage/like');
      echo $post_src;
      echo $post_username;
      echo $post_fileid;
      if($is_like == 1){
        echo $like_echo;
      }else{
        echo $no_like_echo;
      }
      
      echo form_close();
      echo form_open(base_url().'index.php/homepage/add_comment');
      echo $post_src;
      echo $post_username;
      echo $post_fileid;
      echo $result;
      echo form_close();
      
      
      
  ?>
  
</div>

<script>
  $(document).ready(function(){

    var limit = 7;
    var start = 0;
    var action = 'inactive';

    function lazzy_loader(limit)
    {
      var output = '';
      for(var count=0; count<limit; count++)
      {
        output += '<div class="post_data">';
        output += '<p><span class="content-placeholder" style="width:100%; height: 20px;">&nbsp;</span></p>';
        output += '<p><span class="content-placeholder" style="width:100%; height: 80px;">&nbsp;</span></p>';
        output += '</div>';
      }
      $('#load_data_message').html(output);
    }

    lazzy_loader(limit);

    function load_data(limit, start)
    {
      $.ajax({
        url:"<?php echo base_url(); ?>homepage/fetch",
        method:"POST",
        data:{limit:limit, start:start, fileid: <?php echo $fileid;?>},
        cache: false,
        success:function(data)
        {
          if(data == '')
          {
            $('#load_data_message').html('<h3>No More Result Found</h3>');
            action = 'active';
          }
          else
          {
            $('#load_data').append(data);
            $('#load_data_message').html("");
            action = 'inactive';
          }
        }
      })
    }

    if(action == 'inactive')
    {
      action = 'active';
      load_data(limit, start);
    }

    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
      {
        lazzy_loader(limit);
        action = 'active';
        start = start + limit;
        setTimeout(function(){
          load_data(limit, start);
        }, 1000);
      }
    });

  });
</script>
