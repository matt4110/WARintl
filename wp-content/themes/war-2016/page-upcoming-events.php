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
					    <a href=<?php get_bloginfo('url'); ?>"/magical-princess-tea-party"><h2>Princess Tea Party</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/events/magical-princess-tea.jpg"></a>
					    <p>November 4, 2017</p>
					    <p>Tea Trade Cafe<br>2790 44th St SW<br>Wyoming, MI</p>
					</div>
					

					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/women-of-passion"><h2>Women of Passion</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/events/women-of-passion.png"></a>
					    <p>November 11, 2017</p>
					    <p>Calvary CRC<br>3500 Byron Center Ave<br>Wyoming, MI</p>
					</div>

					<!--<div class="grid-1-3">
					    <h2>Becky Speaking</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/cfr/cfr-event.jpg">
					    <p>October 22, 2017</p>
					    <p>First United<br>Methodist Church<br>Kalamazoo, MI</p>
					</div>-->
					
					<div class="grid-1-3">
					    <a href=<?php get_bloginfo('url'); ?>"/circle-tour/"><h2>Circle<br>Tour</h2>
					    <img class="square-img border" src=<?php get_bloginfo('url'); ?>"/images/events/circle-tour-2018.jpg"></a>
					    <p>February 2018</p>
					    <p>Thailand</p>
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
