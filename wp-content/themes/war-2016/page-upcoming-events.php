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
					    <a href=<?php get_bloginfo('url'); ?>"/brunch-with-becky/"><h2>Brunch</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/wp-content/uploads/2017/03/Brunch.png"></a>
					    <p>May 13, 2017</p>
					    <p>WAR, Int'l HQ<br>2790 44th ST SW<br>Wyoming, MI</p>
					</div>

					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/civilian-first-responder-cfr"><h2>CFR</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/cfr/cfr-event.jpg"></a>
					    <p>July 08, 2017</p>
					    <p>Calvary's Love Assembly of God<br>Johnson City, NY</p>
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
