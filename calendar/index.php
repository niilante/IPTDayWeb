<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>IPTDay</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/calendar.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
<!-- //web font --> 
</head>
<body class="animated slideInUp">
<?php include 'connection.php';?>
	<!-- main -->
	<div class="main-agileits-w3layouts">
		<h1>Calendar</h1>
		<div class="agileits-info">
			<!-- calendar -->
			<div class="wthree-grids"> 
				<div class="custom-calendar-wrap">
					<div id="custom-inner" class="custom-inner">
						<div class="w3ls-header">
							<nav>
								<span id="custom-prev" class="custom-prev"></span>
								<span id="custom-next" class="custom-next"></span>
								<span id="custom-current" class="custom-current" title="Go to current date"></span>
							</nav>  
							<h2 id="custom-month" class="w3layouts-month">MARCH</h2>
							<h3 id="custom-year" class="w3-agileits-year">2016</h3>
						</div>
						<div class="clear"> </div>
						<div id="calendar" class="fc-calendar-container fc-agile"></div>
					</div>
				</div> 
				<!-- js -->
				<script src="js/jquery-1.11.1.min.js"></script>
				<script src="js/modernizr.custom.63321.js"></script> 
				<script type="text/javascript" src="js/jquery.calendario.js"></script>
				<script type="text/javascript" src="js/data.js"></script>
				<!-- //js -->
				<script type="text/javascript"> 
					$(function() {
						function updateMonthYear() {
							$( '#custom-month' ).html( $( '#calendar' ).calendario('getMonthName') );
							$( '#custom-year' ).html( $( '#calendar' ).calendario('getYear'));
						}
						
						$(document).on('finish.calendar.calendario', function(e){
							$( '#custom-month' ).html( $( '#calendar' ).calendario('getMonthName') );
							$( '#custom-year' ).html( $( '#calendar' ).calendario('getYear'));
							$( '#custom-next' ).on( 'click', function() {
								$( '#calendar' ).calendario('gotoNextMonth', updateMonthYear);
							} );
							$( '#custom-prev' ).on( 'click', function() {
								$( '#calendar' ).calendario('gotoPreviousMonth', updateMonthYear);
							} );
							$( '#custom-current' ).on( 'click', function() {
								$( '#calendar' ).calendario('gotoNow', updateMonthYear);
							} );
							$( '#custom-current' ).on( 'click', function() {
								$( '#calendar' ).calendario('gotoNow', updateMonthYear);
							} );
						});
						
						$('#calendar').on('shown.calendar.calendario', function(){
							$('div.fc-row > div').on('onDayClick.calendario', function(e, dateprop) {
								console.log(dateprop);
								if(dateprop.data) {
									showEvents(dateprop.data.html, dateprop);
								}
							});
						});
					
						var transEndEventNames = {
							'WebkitTransition' : 'webkitTransitionEnd',
							'MozTransition' : 'transitionend',
							'OTransition' : 'oTransitionEnd',
							'msTransition' : 'MSTransitionEnd',
							'transition' : 'transitionend'
						},
						transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
						$wrapper = $( '#custom-inner' );

						function showEvents( contentEl, dateprop ) {
							hideEvents();
							var $events = $( '<div id="custom-content-reveal" class="custom-content-reveal"><h4>Events for ' + dateprop.monthname + ' '
							+ dateprop.day + ', ' + dateprop.year + '</h4></div>' ),
							$close = $( '<span class="custom-content-close"></span>' ).on( 'click', hideEvents);
							$events.append( contentEl.join('') , $close ).insertAfter( $wrapper );
							setTimeout( function() {
								$events.css( 'top', '0%' );
							}, 25);
						}
						
						function hideEvents() {
							var $events = $( '#custom-content-reveal' );
							if( $events.length > 0 ) {   
								$events.css( 'top', '100%' );
								Modernizr.csstransitions ? $events.on( transEndEventName, function() { $( this ).remove(); } ) : $events.remove();
							}
						}
						
						$( '#calendar' ).calendario({
							caldata : events,
							displayWeekAbbr : true,
							events: ['click', 'focus']
						});
					
					});
				</script>
			</div>
			<!-- //calendar -->
		</div>	
	</div>	
	<!-- //main -->
	<!-- copyright -->
	<div class="w3-agile-copyright">
		<p class="agileinfo">© 2017 IPTDaySystem . All rights reserved </p>
	</div>
	<!-- //copyright --> 
</body>
</html>