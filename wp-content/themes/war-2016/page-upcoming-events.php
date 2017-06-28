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
					    <a href=<?php get_bloginfo('url'); ?>"/acoustic-mic-nights"><h2>Mic Nights</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/events/mic-night.png"></a>
					    <p>Jun 08 - Aug 24</p>
					    <p>Tea Trade Cafe<br>Wyoming, MI<br>Thursday nights</p>
					</div>

					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/civilian-first-responder"><h2>CFR</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/cfr/cfr-event.jpg"></a>
					    <p>July 08, 2017</p>
					    <p>Calvary's Love Assembly of God<br>Johnson City, NY</p>
					</div>

					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/civilian-first-responder"><h2>CFR</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/cfr/cfr-event.jpg"></a>
					    <p>August 12, 2017</p>
					    <p>Lighthouse Christian Church<br>Rosemount, MN</p>
					</div>
				</div>

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
					    <a href=<?php get_bloginfo('url'); ?>"/circle-tour/"><h2>Circle Tour</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/events/circle-tour-2018.jpg"></a>
					    <p>February 2018</p>
					    <p>Thailand</p>
					</div>

				</div>
				<div class="clearfix">&nbsp;</div>

				<?php echo do_shortcode("[Spider_Calendar id='2' theme='13' default='month' select='month,list,week,day,']"); ?>
				
			</div>
		</div>

		
		

	</div><!-- .content-area -->

<?php get_footer(); ?>
