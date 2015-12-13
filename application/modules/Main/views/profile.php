<!DOCTYPE HTML>
<html>

<head>

    <title>Trivia Clicks</title>

<link href="<?php echo site_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo site_url();?>assets/js/jquery-1.11.0.min.js"></script>
<link href="<?php echo site_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="<?php echo site_url();?>assets/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="<?php echo site_url();?>assets/js/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="<?php echo site_url();?>assets/js/bootstrap.min.js"></script>

<link href="<?php echo site_url();?>assets/css/jBox.css" rel="stylesheet">
<script src="<?php echo site_url();?>assets/js/jBox.min.js"></script>
<script src="<?php echo site_url();?>assets/js/myJbox.js"></script>

<!-- Uncomment the line below when you want the graph onBoard -->
<!-- <link rel="stylesheet" href="<?php echo site_url();?>assets/css/graph.css"> -->
<script src="<?php echo site_url();?>assets/js/jquery.flot.min.js"></script>

<!-- Uncomment the line below to show the graph -->
<!-- <script src="<?php echo site_url();?>assets/js/flotGraph.js"></script> -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Storage ui kit Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

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
<script>$(document).ready(function(c) {
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
<style type="text/css">
#clock {
			transform-origin: 0 0;
		    transform: scale(.75);
		    -ms-transform: scale(.75);
		    -webkit-transform-origin: 0 0;
		    -webkit-transform: scale(.75);
		    -o-transform-origin: 0 0;
		    -o-transform: scale(.5);
		    -moz-transform-origin: 0 0;
		    -moz-transform: scale(.75);
			margin-left: -15px;
			margin-bottom: -22px;
	    	margin-right: 22px;
		}
#analytic {
			transform-origin: 0 0;
		    transform: scale(.75);
		    -ms-transform: scale(.75);
		    -webkit-transform-origin: 0 0;
		    -webkit-transform: scale(.75);
		    -o-transform-origin: 0 0;
		    -o-transform: scale(.75);
		    -moz-transform-origin: 0 0;
		    -moz-transform: scale(.75);
			margin-left: -15px;
			margin-bottom: -22px;
	    	margin-right: 22px;
		}
</style>
<body>
<div >
	    <div class="head-strip">
	    	<div class="head-strip-left">
	    		<span class="joe"><img src="<?php echo site_url();?>assets/images/logo2.png" alt="" > </span>
	    		<div class="joe-text">
	    			<h2></h2>
	    			<p></p>
	    		</div>
	    	</div>
	    	<div class="head-strip-right">
	    		<ul class="strip-date">
	    			<li><a href="#"><span class="cal"> </span><h4>Home</h4></a></li>
	    			<li><a href="<?php echo site_url();?>Main/Scoreboard"><span class="clock"> </span><h4>Scoreboard</h4></a></li>
	    			<li><a href="<?php echo site_url();?>Main/Topics"><span class="sun"> </span><h4>Topics</h4></a></li>
	    		</ul>
	    		<div class="settiing">
	    			<div class="menu2">
					<span class="menu-at-on"><img src="<?php echo site_url();?>assets/images/setter.png" alt=""> </span>	
					<ul>
						<!-- <li><a href="#">Profile</a></li>
						<li><a href="#" >Login</a></li>	 -->
						<li><a href="<?php echo site_url('Main/Logout');?>" >Log Out</a></li>							
					</ul>
					<script>
						$("span.menu-at-on").click(function(){
							$(".menu2 ul").slideToggle(500, function(){
							});
						});
					</script>
				</div>
						</div>
	    		</div>
	    		  <div class="clearfix"> </div>
	    	</div>
    </div>
	     
	    <div class="header-bottom">
	    	<div class="col-md-4 header-bot-left"> 
	    		<div style="margin: 0px 38px 0px 38px;" class="user-profile">
	    			<div class="user-prof-top" style="background: url(<?php echo $cover ?>);">
	    				<span class="cros"> </span>
	    				<div class="col-md-4 user-prof-img">
	    				    <img class="img-circle img-responsive" src="<?php echo $picture ?>" alt="">
	    				</div>
	    				<div class="col-md-8 user-prof-text">
	    					<h3 style="color: #fff"><?php echo $username?></h3>
	    				    <p>beginner</p>
	    				</div>
	    			  <div class="clearfix"> </div>
	    			</div>
	    			
	    		</div>
                <!-- <div style="margin-left:80px; margin-bottom: -100px;" id="analytic" class="analytic-bottom">
						<ul>
							<li><h3><a href="#">$1057</a></h3><p>Total Earnings</p></li>
							<li><h3><a href="#">124</a></h3><p>Number of Games</p></li>
							<li><h3><a href="#">6</a></h3><p>Rank</p></li>
						</ul>
				</div> -->
                 <div class="alarm">
                 	<div class="alarm-top">
                         <span class="bell"> </span> 
                 		<h6>Weekly Tournament ends in :</h6>
                 	</div>
 				    <div style="margin-left: 18px;" id="clock">
	  				</div>
 				    <a href="<?php echo site_url();?>Main/Topics">Play Now</a>
 				    <div class="clearfix"> </div> 
 				 </div>
           
	    	</div> 
            </div>

	    	<div class="col-md-8 header-bot-right"> 
	    		<div class="analytic">
	    			<div style="margin-bottom: 10px;" class="analytic-top">
	    				<div class="infograpy"><h5>Challenge Your Facebook Friends</h5></div>
	    				<span class="share"> </span>
	    			  <div class="clearfix"> </div>
	    			</div>
	    				<div class="analttic-right">
	    					 <div class="graph-grid"> 
								<div id="graph-wrapper">
									<div class="graph-container">
										<div id="graph-lines"> 
											<?php 
												if(!empty($personQuery)){
													foreach ($personQuery as $value) {
												?>
													<span class="others" data-name="<?php echo $value['userName']; ?>" 
													data-id="<?php echo $value['userId']; ?>"
													style="cursor: pointer;">
														<img class="img-circle" src="<?php echo $value['userPic']; ?>" height="60" width="60">
													</span>
											<?php } } ?>
										</div>
										<div id="graph-bars"> </div>
									</div>
								</div> 
                            </div>
                        </div>
					
			 </div>
                </div>

                <div class="bar-kit">
	    		<div class="col-md-5 header-bot-right-part-1">

   <div class="clearfix"> </div>
</div>
 <div class="clearfix"> </div>
</div>
       

<div class="ring-states">
    <div class="today-status">
        <div class="today-text">
            <h6>Followed Topics</h6>
        </div>
        <span class="todat-start"><img src="<?php echo site_url();?>assets/images/start.png" alt=""></span>
        <div class="clearfix"> </div>
    </div>
    <div class="text-center" style="margin-top: 10px;">
            <?php
            if(!empty($followArray)){
            foreach ($followArray as $val) {?>
                <span value="" class="button0" data-name="<?php echo $val['objName'] ?>" data-id="<?php echo $val['objId'] ?>"
                    data-follow="<?php echo $val['objFollow'] ?>"
                    data-tool="<?php echo $value='value='.$val['objId'];
                    ?>" 
                    data-url="<?php echo site_url('Main/Topics/check/'.$val['objId']); ?>"
                     style="cursor: pointer;">
                    <img style="margin-top: 10px;" src="<?php echo $val['objUrl'] ?>" alt="">
                </span>
            <?php } }else{?>
            	<div style="color: #fff; font: bold 12px/30px Georgia, serif;">
            		<h4>You do not follow Any Topics</h4>
            	</div>
            <?php }?>
        	<!-- <span><img src="<?php echo site_url();?>assets/images/start.png" alt=""></span> -->
        </div>
    <div class="skill-grid">
        <div class="every" id="circles-1"> </div>

    </div>

    <script type="text/javascript" src="<?php echo site_url();?>assets/js/circles.js"></script>

</div>

<div style="display: none;" class="" id="toolbar-options">
    <div style="float: left; margin-bottom: 7px;">
        <span>
            <img class="lilImg" src="<?php echo site_url();?>assets/images/102.png" alt="Image" height="40" width="40">
        </span>
    </div>
    <div style="margin-bottom: 7px; margin-top: -12px;">
        <h6>Some Random Text about the game...</h6>
    </div>
    <div style="float: left;">
        <span>
            <a id="playButton" href="">
                <img class="play" src="<?php echo site_url();?>assets/images/play1.png" alt="Image" height="25" width="65">
            </a>
        </span>
        <span id="btnSpan" style="margin-left: 12px;">
            <input id="followId" type="hidden" value="">
            <button data-url="<?php echo site_url('Main/Topics/getIsFollow'); ?>" data-uri="<?php echo site_url('Main/Topics/removeFollow'); ?>"
             type="button" class="follow btn btn-xs btn-success">
                Follow
                <!-- <img data-url="<?php echo site_url('Main/Topics/getIsFollow'); ?>" data-uri="<?php echo site_url('Main/Topics/removeFollow'); ?>" 
                style="cursor: pointer;" class="follow" src="<?php echo site_url();?>assets/images/follow1.png" alt="Image" height="25" width="80"> -->
            </button>   
        </span>
    </div>
</div>

<script src="<?php echo site_url();?>assets/countdown.js" type="text/javascript"></script>
<script src="<?php echo site_url();?>assets/countclock.js" type="text/javascript"></script>

</body>
</html>