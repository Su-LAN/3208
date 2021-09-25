<?php
 //put your code here
?>
<html>
    <style>
    #result{
        height:250px;
        overflow:scroll;
    }
    #secrch_input{
        color:black;
    }
    </style>
        <head>
                <title>INFS3202 Demo</title>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/assets/css/header.css">
                <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
                <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css'>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

        </head>
        <body>
          <script>
            // Show select image using file input.
            function readURL(input) {
              $('#default_img').show();
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#select')
                    .attr('src', e.target.result)
                    .width(300)
                    .height(200);
                };
                reader.readAsDataURL(input. files[0]);
              }
            }
            $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
            });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })

      //ajax
      $(document).ready(
          function(){
            load_data();
            function load_data(query){
                $.ajax({
                    url:"<?php echo base_url(); ?>index.php/ajax/fatch",
                    method:"GET",
                    data:{query:query},
                    success:function(response){
                        $('#result').html("");
                        if (response == "" ) {
                            $('#result').html(response);
                        }else{
                            var obj = JSON.parse(response);
                            if(obj.length>0){
                                var items=[];
                                $.each(obj, function(i,val){
                                    
                                        
                                        items.push($("<form action = '<?php echo base_url();?>index.php/homepage/search_detail' method='post'><input type='hidden' name='fileid' value='"+val.id+"'><input id ='secrch_input'type='submit' name='search' value='"+val.filename+" From: " + val.username+"'></form>"
                                        ));
                                        //items.push($("<br>"));   
                                });
                                $('#result').append.apply($('#result'), items);         
                            }else{
                                $('#result').html("Not Found!");
                            }; 
                        };
                    }
                });
            }
            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != ''){
                    load_data(search);
                }else{
                    load_data();
                }
            });
            
        });
        // function onBlur(obj){
        //     $("#result").css("display","none");
        // }
        function clickFn(obj){
			$("#result").css("display","revert");
		}
          </script>
          
          <nav class="fixed-top">
               <div class="menu-icon">
                  <i class="fa fa-bars fa-2x"></i>
               </div>
               <div class="logo">
                  INFS3202
               </div>
               <div class="menu">
                  <ul>
                     <li>
                     <div id="result"></div>
                        <?php echo form_open('ajax'); ?>
                        <input class="form-control" type="search" id="search_text" placeholder="Search" name="search" aria-label="Search" onclick="clickFn()" onblur="onBlur()">
                        <?php echo form_close(); ?>
                    </li>
                     <li><a href="<?php echo base_url(); ?>index.php/homepage">Home</a></li>
                     <li><a href="<?php echo base_url(); ?>index.php/sms">Connect Us</a></li>
                     <?php
                        $update_home =  '<li> <a href="'.base_url().'index.php/%s"> %s </a></li>';
                        $link_update="";
                        if(isset($is_login)) {
                            if ($is_login == true) {
                                $link_update = sprintf($update_home, 'upload', "Upload");
                            }
                        }
                        echo $link_update;
                    ?>
                    
                    <?php
                        $user_info_home =  '<li> <a href="'.base_url().'index.php/%s"> %s </a></li>';
                        $link_user="";
                        if(isset($is_login)) {
                            if ($is_login == true) {
                                $link_user = sprintf($user_info_home, 'homepage/collect_list', "Collect List");
                            }
                        }

                        echo $link_user;
                    ?>
                     
                     <?php
                        $user_info_home =  '<li> <a href="'.base_url().'index.php/%s"> %s </a></li>';
                        $link_user="";
                        if(isset($is_login)) {
                            if ($is_login == true) {
                                $link_user = sprintf($user_info_home, 'user', "User Profile");
                            }
                        }

                        echo $link_user;
                    ?>
                    <li>
                    <?php
                        $login_link =  '<a href="'.base_url().'index.php/%s"> %s </a>';
                        if(isset($is_login)) {
                            if ($is_login == true) {
                                $link = sprintf($login_link, 'login/logout', "Logout");
                            }else{
                                $link = sprintf($login_link, 'login', "Login");
                            }
                        }else{
                            $link = sprintf($login_link, 'login', "Login");
                        }
                        echo $link;
                    ?>
                   
                    </li>
                  </ul>
               </div>
            </nav>
            

