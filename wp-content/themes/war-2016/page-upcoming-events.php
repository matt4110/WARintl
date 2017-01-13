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
					    <a href=<?php get_bloginfo('url'); ?>"/civilian-first-responder/"><h2>CFR</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/cfr/cfr-grfirst.jpg"></a>
					    <p>Jan 13-14, 2017</p>
					    <p>GR First Assembly<br>2100 44th St<br>Wyoming, MI 49519</p>
					</div>


					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/teamwar"><h2>Gazelle Girl</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/teamwar-square.jpg"></a>
					    <p>Feb 28, 2017</p>
					    <p>Calder Plaza<br>Grand Rapids, MI 49503</p>
					</div>


					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/circle-tour/"><h2>Circle Tour</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/wp-content/themes/war-2016/assets/images/circle-tour.jpg"></a>
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
