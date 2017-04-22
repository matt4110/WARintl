<?php
/*
 Template Name: Test
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="standard-content">
			</div>
			<div class="parallax-window" data-parallax="scroll" data-image-src=<?php get_bloginfo('url'); ?>"/wp-content/themes/war-2016/assets/images/black-pattern.jpg" style="height:350px; width:100%;">
				<div class="cta-container">
					
					<p class="cta-title">Become a Circle of Protection</p>
					<!--Donate-->
					<div id="cta-give">
						<p class="cta-hover-title">give</p>
					</div>
					<div class="cta-item">
						<img class="cta-item-img" id="cta-donate" src=<?php get_bloginfo('url'); ?>"/wp-content/themes/war-2016/assets/images/donate.png">
						<p class="cta-item-label">Donate</p>
					</div>

					<!--Volunteer-->
					<div id="cta-act">
						<p class="cta-hover-title">act</p>
					</div>
					<div class="cta-item">
						<img class="cta-item-img" id="cta-volunteer" src=<?php get_bloginfo('url'); ?>"/wp-content/themes/war-2016/assets/images/volunteer.png">
						<p class="cta-item-label">Volunteer</p>
					</div>

					<!--Shop-->
					<div id="cta-buy">
						<p class="cta-hover-title">buy</p>
					</div>
					<div class="cta-item">
						<img class="cta-item-img" id="cta-shop" src=<?php get_bloginfo('url'); ?>"/wp-content/themes/war-2016/assets/images/shop.png">
						<p class="cta-item-label">Shop</p>
					</div>
					<div class="clearfix">&nbsp;</div>
				</div>		
			</div>
			<div class="standard-content">
			</div><!-- .standard-content -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
