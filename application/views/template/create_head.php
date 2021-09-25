<html>
        <head>
                <title>INFS3202 Demo</title>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/header.css">
                <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
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
                   <a href="<?php echo base_url(); ?>index.php/homepage"> Home </a>
                    </li>
                    <li>
                   <a href="<?php echo base_url(); ?>index.php/login"> Login </a>
                    </li>
                  </ul>
               </div>
            </nav>