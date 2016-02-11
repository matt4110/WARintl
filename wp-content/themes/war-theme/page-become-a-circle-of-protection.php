<?php
/**
	Template Name: Become a Circle of Protection
 * The template for displaying the Become a Circle of Protection Page
 *
 */

get_header('get-involved'); ?>

<div class="container" id="get-involved-container">
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-md-offset-2 col-md-8">
			<h1 class="text-center top-margin-title">Become a Circle of Protection</h1>
		</div>
		<div class="col-md-offset-1 col-md-1">
			<img src="http://warinternational.org/wp-content/uploads/2015/01/Talent-with-framing.png" alt="..." class="pull-right" style="width:150px;">
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-2 col-md-4 col-sm-offset-2 col-sm-9 col-xs-7">
			<img src="http://warinternational.org/wp-content/uploads/2015/03/EncourageAtRiskwithframing.png" alt="..." class="center-block behind" style="width:250px;">
			<div style="margin-top: -50px; z-index: 100;">
				<h5 class="text-center two-lines">Offer Encouragement to the rescued & at-risk</h5>
				<p class = "text-center">At times, rescued women need someone to join them on the journey toward healing. You can do this by offering encouragement in the form of cards, transportation, skills training, or even mentorship. Click <a class="email-form-link" href="#">here</a> to request more information.</br></br></p>
				<a href="http://warinternational.org/get-involved/volunteer/" target="" class="get-involved-link"><h5 class="text-center two-lines">Volunteer with WAR, Int'l</h5></a>
			</div>
		</div>
		<div class="col-md-offset-0 col-md-4 col-sm-offset-2 col-sm-9 col-xs-7">
			<img src="http://warinternational.org/wp-content/uploads/2015/01/CFRwithframing.png" alt="..." class="center-block behind" style="width:250px;">
			<div style="margin-top: -50px; z-index: 100;">
				<h5 class="text-center two-lines">Become a Civilian First Responder</h5>
				<p class = "text-center">If a trafficked child passed you on the street would you know? How would you respond? Learn the answers to these questions and more at WAR's Civilian First Responder Conference. People of all professions and ages are needed! Click <a href="http://warinternational.org/programs/civilian-first-responder-cfr/">here</a> to learn more and find an event near you.</p>
				<a href="http://warinternational.org/get-involved/host-an-event/" target="" class="get-involved-link"><h5 class="text-center">Request a Speaker</h5></a>
			</div>
		</div>
	</div>
</div>

<div style="display:none">
    <div id="email-form-href" style="padding: 10px;background: #fff">
        <?php echo do_shortcode('[gravityform id=21 title=false description=false ajax=true tabindex=49]'); ?>
    </div>
</div>

<?php get_footer(); ?>