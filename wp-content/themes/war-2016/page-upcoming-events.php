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
					    <a href=<?php get_bloginfo('url'); ?>"/soap"><h2>SOAP</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/events/soap.jpg"></a>
					    <p>September 09, 2017</p>
					    <p>WAR Int'l HQ<br>Wyoming, MI</p>
					</div>

					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/civilian-first-responder"><h2>CFR</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/cfr/cfr-event.jpg"></a>
					    <p>September 16, 2017</p>
					    <p>Saint Catharine School<br>Spring Lake, NJ</p>
					</div>

					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/women-of-passion"><h2>Conference</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/events/women-of-passion.png"></a>
					    <p>November 11, 2017</p>
					    <p>Calvary CRC<br>Wyoming, MI</p>
					</div>



				</div>



<!--
				<div class="row">

					

					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/civilian-first-responder"><h2>CFR</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/cfr/cfr-event.jpg"></a>
					    <p>October 07, 2017</p>
					    <p>Colonial Woods<br>Missionary Church<br>Port Huron, MI</p>
					</div>
					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/circle-tour/"><h2>Circle Tour</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/events/circle-tour-2018.jpg"></a>
					    <p>February 2018</p>
					    <p>Thailand</p>
					</div>

				</div>
-->

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
