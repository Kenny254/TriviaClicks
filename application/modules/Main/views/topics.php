<!DOCTYPE HTML>
<html>

<head>

    <title>Discover</title>

    <link href="<?php echo site_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <script src="<?php echo site_url();?>assets/js/jquery-1.11.0.min.js"></script>
    <link href="<?php echo site_url();?>assets/css/styletopic.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="<?php echo site_url();?>assets/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="<?php echo site_url();?>assets/js/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="<?php echo site_url();?>assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo site_url();?>assets/css/whirly.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/css/jquery.toolbar.css" />
    <link href="<?php echo site_url();?>assets/css/jBox.css" rel="stylesheet">
    <script src="<?php echo site_url();?>assets/js/jBox.min.js"></script>
    <script src="<?php echo site_url();?>assets/js/myJbox.js"></script>

    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.0.min.js"></script> -->
    <script type="text/javascript" src="<?php echo site_url();?>assets/js/jquery.toolbar.js"></script>

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
    <div>
        <div class="head-strip">
            <div class="head-strip-left">
                <span class="joe"><img src="<?php echo site_url();?>assets/images/logo2.png" alt=""> </span>
                <div class="joe-text">
                    <h2></h2>
                    <p></p>
                </div>
            </div>
            <div class="head-strip-right">
                <ul class="strip-date">
                    <li><a href="<?php echo site_url();?>Main/Profile"><span class="cal"> </span><h4>Home</h4></a></li>
                    <li><a href="<?php echo site_url();?>Main/Scoreboard"><span class="clock"> </span><h4>Scoreboard</h4></a></li>
                    <li><a href="#"><span class="sun"> </span><h4>Topics</h4></a></li>
                </ul>
                <div class="settiing">
                    <div class="menu2">
                        <span class="menu-at-on"><img src="<?php echo site_url();?>assets/images/setter.png" alt=""> </span>
                        <ul>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Log Out</a></li>
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
   
    <div class="bar-kit">
        <div class="col-md-5 header-bot-right-part-1">

            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>






    <div class="ring-states">
        <div class="today-status">
            <div class="today-text">
                <h6>General</h6>
            </div>
            <br />
            <br />
            <?php
            if(!empty($artimages)){
            foreach ($artimages as $val) {?>
                <span value="" class="button0" data-name="<?php echo $val['objName'] ?>" data-id="<?php echo $val['objId'] ?>"
                    data-follow="<?php echo $val['objFollow'] ?>"
                    data-tool="<?php echo $value='value='.$val['objId'];
                    ?>" 
                    data-url="<?php echo site_url('Main/Topics/check/'.$val['objId']); ?>"
                     style="cursor: pointer;" data-img="<?php echo $val['objUrl'] ?>">
                    <input class="artsName" type="hidden" value="<?php echo $val['objName'] ?>">
                    <input class="artsDesc" type="hidden" value="<?php echo $val['objFollow'] ?>">
                    <input class="artsId" type="hidden" value="<?php echo $val['objId'] ?>">
                    <img src="<?php echo $val['objUrl'] ?>" alt="">
                </span>
            <?php } }?>
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>


   
    <br />
     
    <div class="ring-states">
        <div id="business" class="today-status">
            <div class="today-text">
                <h6>Business</h6>
            </div>
            <br />
            <br />
            <div id="spinner1" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>

        </div>
        <div class="clearfix"> </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>





    <br />


    <div class="ring-states">
        <div id="educ" class="today-status">
            <div class="today-text">
                <h6>Educational</h6>
            </div>
            <br />
            <br />
            <div id="spinner2" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($eduimages)){
            // foreach ($eduimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?>
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>



    <br /> 
    <div class="ring-states">
        <div id="ent" class="today-status">
            <div class="today-text">
                <h6>Entertainment</h6>
            </div>
            <br />
            <br />
            <div id="spinner3" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($entimages)){
            // foreach ($entimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?>
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>






    <br />
    <div class="ring-states">
        <div id="food" class="today-status">
            <div class="today-text">
                <h6>Food & Drink</h6>
            </div>
            <br />
            <br />
            <div id="spinner4" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($foodimages)){
            // foreach ($foodimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?>
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>






    <br />
    <div class="ring-states">
        <div id="game" class="today-status">
            <div class="today-text">
                <h6>Games</h6>
            </div>
            <br />
            <br />
            <div id="spinner5" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($gameimages)){
            // foreach ($gameimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?>
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>






    <br />
    <div class="ring-states">
        <div id="art" class="today-status">
            <div class="today-text">
                <h6>Art & Design</h6>
            </div>
            <br />
            <br />
            <div id="spinner6" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($genimages)){
            // foreach ($genimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?> 
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>





    <br />
    <div class="ring-states">
        <div id="hist" class="today-status">
            <div class="today-text">
                <h6>History</h6>
            </div>
            <br />
            <br />
            <div id="spinner7" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($histimages)){
            // foreach ($histimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?> 
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>





    <br />
    <div class="ring-states">
        <div id="lit" class="today-status">
            <div class="today-text">
                <h6>Literature</h6>
            </div>
            <br />
            <br />
            <div id="spinner8" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($litimages)){
            // foreach ($litimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?> 
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>




    <br />
    <div class="ring-states">
        <div id="mov" class="today-status">
            <div class="today-text">
                <h6>Movies</h6>
            </div>
            <br />
            <br />
            <div id="spinner9" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($movimages)){
            // foreach ($movimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?> 
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>






    <br />
    <div class="ring-states">
        <div id="mus" class="today-status">
            <div class="today-text">
                <h6>Music</h6>
            </div>
            <br />
            <br />
            <div id="spinner10" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($musimages)){
            // foreach ($musimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?> 
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>







    <br />
    <div class="ring-states">
        <div id="nat" class="today-status">
            <div class="today-text">
                <h6>Nature</h6>
            </div>
            <br />
            <br />
            <div id="spinner11" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($natimages)){
            // foreach ($natimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?> 
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div>  
    </div>







    <br />
    <div class="ring-states">
        <div id="sci" class="today-status">
            <div class="today-text">
                <h6>Science</h6>
            </div>
            <br />
            <br />
            <div id="spinner12" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($sciimages)){
            // foreach ($sciimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?> 
            <div class="clearfix"> </div>
        </div> 
    </div>





    <br />
    <div class="ring-states">
        <div id="spo" class="today-status">
            <div class="today-text">
                <h6>Sports</h6>
            </div>
            <br />
            <br />
            <div id="spinner13" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($spoimages)){
            // foreach ($spoimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?> 
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>








    <br />
    <div class="ring-states">
        <div id="tv" class="today-status">
            <div class="today-text">
                <h6>TV</h6>
            </div>
            <br />
            <br />
            <div id="spinner14" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($tvimages)){
            // foreach ($tvimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?> 
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>







    <br />
    <div class="ring-states">
        <div id="world" class="today-status">
            <div class="today-text">
                <h6>The World</h6>
            </div>
            <br />
            <br />
            <div id="spinner15" style="margin-top: 45px; text-align: center;" class="whirly-loader">
              Loading…
            </div>
            <?php
            // if(!empty($worldimages)){
            // foreach ($worldimages as $imageId => $image) {?>
            <!-- <span class="button0" data-tool="" style="cursor: pointer;">
            <img src="<?php echo $image ?>" alt="">
            </span> -->
            <?php //} }?> 
            <div class="clearfix"> </div>
        </div>
        <div class="skill-grid">
            <div class="every" id="circles-1"> </div>
        </div> 
    </div>

<br />

<div style="display: none;" class="" id="toolbar-options">
    <div style="float: left; margin-bottom: 7px; margin-right: 7px;">
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

</body>
</html>