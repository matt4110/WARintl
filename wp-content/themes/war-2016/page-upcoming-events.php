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
					    <a href=""><h2>CFR</h2></a>
					    <img class="square-img" src=<?php get_bloginfo('url'); ?>"/images/cfr/cfr-grfirst.jpg">
					    <p>Jan 13-14, 2017</p>
					    <p>Grand Rapids First Assembly<br>2100 44th St<br>Wyoming, MI 49519</p>
					</div>


					<div class="grid-1-3">
					    <a href=""><h2>CFR</h2></a>
					    <img class="square-img" src="">
					    <p>date here</p>
					    <p>location here</p>
					</div>


					<div class="grid-1-3">
					    <a href=""><h2>CFR</h2></a>
					    <img class="square-img" src="">
					    <p>date here</p>
					    <p>location here</p>
					</div>
				</div>

				<?php echo do_shortcode("[Spider_Calendar id='2' theme='13' default='month' select='month,list,week,day,']"); ?>
				
			</div>
		</div>

		
		

	</div><!-- .content-area -->

<?php get_footer(); ?>
