<?php
/*
 Template Name: Upcoming events

 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="standard-content">
				<div class="row">
					
					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/civilian-first-responder"><h2>CFR</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/cfr/cfr-event.jpg"></a>
					    <p>April 14, 2018</p>
					    <p>New Life Christian Fellowship<br>317 S. Ripley Blvd<br>Alpena, MI</p>
					</div>
					
					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/teamwar/"><h2>Team WAR</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/events/teamwar-square.jpg"></a>
					    <p>April 22, 2018</p>
					    <p>Downtown<br>Grand Rapids, MI</p>
					</div>

					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/civilian-first-responder"><h2>CFR</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/cfr/cfr-event.jpg"></a>
					    <p>April 21, 2018</p>
					    <p>Ridge Point Community Church<br>340 104th Ave<br>Holland, MI</p>
					</div>

				</div>


				<div class="clearfix">&nbsp;</div>
				<br>
				<hr>
				<h3 style="text-align: center;"><a href=<?php get_bloginfo('url'); ?>"/civilian-first-responder?#upcoming-cfrs">To see all of our upcoming CFR's click here</a></h3>
				<hr>
				<br>

				<?php echo do_shortcode("[Spider_Calendar id='2' theme='13' default='month' select='month,list,week,day,']"); ?>
				

			</div>
		</div>

		
		

	</div><!-- .content-area -->

<?php get_footer(); ?>
