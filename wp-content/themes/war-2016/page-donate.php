<?php
/**
	Template Name: Donate
 * The template for displaying the Donations PAge
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="standard-content">

			<?php echo do_shortcode("[gravityform id='25' title='false' description='false' ajax='false']"); ?>
			<hr>
			<br><br>

			<!-- Begin Box Menu -->

			<div class="column-grid">
				<div class="red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/international-safehouses">
				    <h3 class="centered">International<br>Safehouses</h3></a>
				    <hr>
				    <p class="small-white-text">Creating circles of protection for men, women, and children to find refuge.</p>
				</div>


				<div class="red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/domestic-safehouses">
				    <h3 class="centered">Domestic<br>Safehouses</h3></a>
				    <hr>
				    <p class="small-white-text">Helping women and children out of trafficking into lives of dignity.</p>
				</div>


				<div class="red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/vocational-training">
				    <h3 class="centered">Vocational<br>Training</h3></a>
				    <hr>
				    <p class="small-white-text">Equipping at-risk men and women with the skills to gain economic freedom.</p>
				</div>
			
				<div class="red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/micro-enterprises">
				    <h3 class="centered">Micro<br>Enterprises</h3></a>
				    <hr>
				    <p class="small-white-text">Investing in lives by giving those at risk a “hand up” toward sustainability.</p>
				</div>


				<div class="red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/education">
				    <h3 class="centered">Education</h3></a>
				    <hr>
				    <p class="small-white-text">Empowering people through knowledge to give them hope for a better future.</p>
				</div>


				<div class="red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/orphanages">
				    <h3 class="centered">Orphanages</h3></a>
				    <hr>
				    <p class="small-white-text">Embodying true religion by caring for “the least of these.”</p>
				</div>
			
				<div class="red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/outreach">
				    <h3 class="centered">Outreach</h3></a>
				    <hr>
				    <p class="small-white-text">Walking red-light districts to meet victims where they are and help them out of lives of darkness.</p>
				</div>


				<div class="red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/medical-aid">
				    <h3 class="centered">Medical Aid</h3></a>
				    <hr>
				    <p class="small-white-text">Promoting healthy bodies and minds as integral aspects of healing and prevention.</p>
				</div>


				<div class="red-box2">
				    <a href=<?php get_bloginfo('url'); ?>"/emergency-intervention">
				    <h3 class="centered">Emergency<br>Intervention</h3></a>
				    <hr>
				    <p class="small-white-text">Acting on short notice when there is an immediate need.</p>
				</div>
			</div>


			


			</div><!-- .standard-content -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
