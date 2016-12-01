<?php
/**
	Template Name: Donate
 * The template for displaying the Donations PAge
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="standard-content">

			<?php echo do_shortcode("[gravityform id='25' title='false' ajax='false']"); ?>

			<!-- Begin Box Menu -->

			<div class="row">
				<div class="grid-1-3 red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/international-safehouses">
				    <h3 class="centered">International<br>Safehouses</h3></a>
				    <hr>
				    <p class="small-white-text">Creating circles of protection, for men, women, and children to find refuge.</p>
				</div>


				<div class="grid-1-3 red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/domestic-safehouses">
				    <h3 class="centered">Domestic<br>Safehouses</h3></a>
				    <hr>
				    <p class="small-white-text">This normally looks like outreach to help women and children out of trafficking into a life of dignity</p>
				</div>


				<div class="grid-1-3 red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/domestic-safehouses">
				    <h3 class="centered">Vocational<br>Training</h3></a>
				    <hr>
				    <p class="small-white-text">Equipping people so they have the economic freedom to break the chains of bondage</p>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>

			<div class="row">
				<div class="grid-1-3 red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/international-safehouses">
				    <h3 class="centered">Micro<br>Enterprises</h3></a>
				    <hr>
				    <p class="small-white-text">Investing in peoples future, giving them a leg up to live a life of dignity</p>
				</div>


				<div class="grid-1-3 red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/domestic-safehouses">
				    <h3 class="centered">Education</h3></a>
				    <hr>
				    <p class="small-white-text">Knowledge is power, and we want to empower people to give them a life of dignity</p>
				</div>


				<div class="grid-1-3 red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/domestic-safehouses">
				    <h3 class="centered">Orphanages</h3></a>
				    <hr>
				    <p class="small-white-text">True religion is taking care of the widows and orphans</p>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>

			<div class="row" style="margin-top: 25px;">
				<div class="grid-1-3 red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/international-safehouses">
				    <h3 class="centered">Outreach</h3></a>
				    <hr>
				    <p class="small-white-text">Walking the red light districts to meet victims where there are, to help them out of a life of darkness</p>
				</div>


				<div class="grid-1-3 red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/domestic-safehouses">
				    <h3 class="centered">Medical Aid</h3></a>
				    <hr>
				    <p class="small-white-text">A healthy body and mind are integral parts of healing and prevention</p>
				</div>


				<div class="grid-1-3 red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/domestic-safehouses">
				    <h3 class="centered">Emergency<br>Intervention</h3></a>
				    <hr>
				    <p class="small-white-text">A quick reaction to help prevent someone from becoming a victim</p>
				</div>
			</div>


			<div class="clearfix">&nbsp;</div>


			</div><!-- .standard-content -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
