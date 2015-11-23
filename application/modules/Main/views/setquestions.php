<!DOCTYPE HTML>
<html>

<head>

    <title>Trivia Clicks</title>

    <link href="<?php echo site_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <script src="<?php echo site_url();?>assets/js/jquery-1.11.0.min.js"></script>
    <link href="<?php echo site_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Storage ui kit Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <script type="text/javascript" src="<?php echo site_url();?>assets/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo site_url();?>assets/js/questions.js"></script>
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
                    <li><span class="cal"> </span><h4>Home</h4></li>
                    <li><span class="clock"> </span><h4>Leaderboard</h4></li>
                    <li><span class="sun"> </span><h4>Topics</h4></li>
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



    <p/>
        <div style="margin-left: 10px;">
            <span id="quesnum">
                <input id="numques" type="text" placeholder="number of questions">
            </span>
            <span>
                <button id="quesnumok" value="">Okay</button>
            </span>
        </div>
        <div style="margin-left: 10px;">
            <span id="upform">
                <form method="post" action="<?= site_url('Main/Uploadpage/upload') ?>" style="margin-top: 15px;">
                    <fieldset class="upForm">
                        <select>
                            <option value="Art">Art</option>
                            <option value="Movie">Movie</option>
                            <option value="Football">Football</option>
                            <option value="Science">Science</option>
                        </select><br />

                        Question:<br>
                        <input type="text" width="600" height="400">
                        <br>
                        OptionA:<br>
                        <input type="text">
                        <br><br>
                        OptionB:<br>
                        <input type="text">
                        <br><br>
                        OptionC:<br>
                        <input type="text">
                        <br><br>
                        OptionD:<br>
                        <input type="text">
                        <br><br>
                        Answer:<br>
                        <input type="text">
                        <br><br>
                        <!-- <input type="submit" value="Submit"> -->
                    </fieldset>
                </form>
            </span>
        </div>
     



</body>
</html>