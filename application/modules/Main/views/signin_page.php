<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>

<head>

    <title>Trivia Clicks</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="<?php echo site_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="<?php echo site_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <script src="<?php echo site_url();?>assets/js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo site_url();?>assets/js/bootstrap.min.js"></script>
    <link href="<?php echo site_url();?>assets/css/stylehome.css" rel="stylesheet" type="text/css" media="all" />
    

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Storage ui kit Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> 
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>

    <script type="text/javascript" src="<?php echo site_url();?>assets/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo site_url();?>assets/js/easing.js"></script>
    <script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
    </script>
    <link href="<?php echo site_url();?>assets/css/jquery.countdown.css" rel="stylesheet" type="text/css" media="all" />
    <script src="<?php echo site_url();?>assets/js/jquery.countdown.js"></script>
    <script src="<?php echo site_url();?>assets/js/script.js"></script>
    <script src="<?php echo site_url();?>assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
    </script>
    <script>
$(document).ready(function(c) {
	$('.cros').on('click', function(c){
		$('.user-profile').fadeOut('slow', function(c){
	  		$('.user-profile').remove();
		});
	});
});
    </script>
    <link href="<?php echo site_url();?>assets/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo site_url();?>assets/js/jquery.jplayer.min.js"></script>
    <script type="text/javascript">

    </script>

</head>
<body>

   <p></p> <p></p><p></p><div class="head-strip-left">
        <span class="joe"><img src="<?php echo site_url();?>assets/images/phone both 2.png" class="img-responsive" alt=""> </span>
        <div class="joe-text">
            <h2></h2>
            <p></p>
        </div>
  
    </div>
 
    <br />
    <br />
    <br />
    <br />
    <div class="head-strip-right">
        <span class="joe"><img class="img-responsive" src="<?php echo site_url();?>assets/images/TrivalClicksall1.png" alt=""> </span>
        <div class="joe-text">
            <h2></h2>
            <p></p>
        </div>
        <br />
        <br />
        <button type="button" class="joe btn1" onclick="" data-toggle="modal" data-target="#myModal">
            <img class="img-responsive" src="<?php echo site_url();?>assets/images/NewTrivalClicksbutton.png" alt=""> 
        </button>
        <button type="button" class="joe btn1" onclick="" data-toggle="modal" data-target="#myModal">
            <img class="img-responsive" src="<?php echo site_url();?>assets/images/login1.png" alt="">
        </button>
       
    </div>
    <br />


    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <h3 class="text-center"> <p>Some Login Text</p> </h3>
         <form id="admin_form" name="adminform" class="animated" action="<?= site_url('admin/Beacons') ?>" method="post">
	        <br>
	          <div class="row">
	            <div class="col-sm-6 col-sm-offset-3">
	              <input style="font: bold 12px/30px Georgia, serif;" required type="text" class="input-lg form-control" name="createbeac[beacname]" id="beacname" placeholder="User Name">
	            </div>
	           
	          </div>
	          <br>
	          <div class="row">
               <div class="col-sm-6 col-sm-offset-3">
                 <input style="font: bold 12px/30px Georgia, serif;" required type="password" name="createbeac[beacuuid]" class="input-lg form-control" placeholder="Password">
                </div>  
	          </div>
	          <br>
	          <div class="row">
	          	<div class="col-sm-6 col-sm-offset-3">
	                 <button type="button" style="font: bold 12px/30px Georgia, serif;" class="text-center btn btn-success btn-block">Log in</button>
	            </div>
	          </div>
	          <br>
	          <div class="row">
	          	<div class="col-sm-6 col-sm-offset-3">
	                 <a href="<?php echo $loginUrl ?>"><button type="button" style="font: bold 12px/30px Georgia, serif;" name="createbeac[beacuuid]" class="text-center btn btn-primary btn-block">
	                 	Sign in with Facebook
	                 </button></a>
	            </div>
	          </div>
	          <br>
	          <div class="row">
	          	<div class="col-sm-6 col-sm-offset-3">
	                 <button type="button" style="font: bold 12px/30px Georgia, serif;" class="text-center btn btn-info btn-block">Sign in with Twitter</button>
	            </div>
	          </div>
	          </form>
	          <br>
	          <br>
	    </div>
    </div>

  </div>
</div>

</body>
</html>