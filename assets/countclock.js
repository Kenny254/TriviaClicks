	  	 	// Grab the current date
				var currentDate = new Date();
				//alert(currentDate.getDate());
				// Set some date in the future. In this case, it's November(second paramenter) the 10th, monthly counts start at 0
				var futureDate  = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate()+7);
				//alert(futureDate);

				// Calculate the difference in seconds between the future and current date
				var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
				//diff = 86400 * 7;

				var myCountdownTest = new Countdown({
												 	time: diff, // 86400 seconds = 1 day  
													rangeHi:"day",
													target:"clock",
													height:80,
													style:"flip",	
													});

				// var clock;

				// $(document).ready(function() {

				// 	// Grab the current date
				// 	var currentDate = new Date();

				// 	// Set some date in the future. In this case, it's November(second paramenter) the 10th, monthly counts start at 0
				// 	var futureDate  = new Date(currentDate.getFullYear(), 10, 10);

				// 	// Calculate the difference in seconds between the future and current date
				// 	var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

				// 	// Instantiate a coutdown FlipClock
				// 	clock = $('.clock').FlipClock(diff, {
				// 		clockFace: 'DailyCounter',
				// 		countdown: true
				// 	});
				// });