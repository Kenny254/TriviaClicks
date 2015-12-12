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
    <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
$(document).ready(function() {
    $('#trivia').DataTable();
} );
    </script>

    <script>
    $('#trivia').dataTable({
        aLengthMenu: [
            [25, 50, 100, 200, -1],
            [25, 50, 100, 200, "All"]
        ],
        iDisplayLength: 50
    });
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
                    <li><a href="#"><span class="clock"> </span><h4>Scoreboard</h4></a></li>
                    <li><a href="<?php echo site_url();?>Main/Topics"><span class="sun"> </span><h4>Topics</h4></a></li>
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
       <table id="trivia" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Profile</th>
                <th>Name</th>
                <th>Score</th>
                <th>Level</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $rank = 0;
            foreach ($userInfo as $val) {
                $rank++
            ?>
                <tr>
                    <td><?= $rank ?></td>
                    <td><img class="img-circle" height="27" width="27" src="<?= $val['picture'] ?>"></td>
                    <td><?= $val['name'] ?></td>
                    <td><?= (empty($val['points']))? '0' : $val['points'] ?></td>
                    <td><?= $val['difficulty'] ?></td>
                    <td><?= (empty($val['cash']))? 'N 0' : $val['cash'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

 

</body>
</html>