<?php
/*Template Name: Professional Circle
 * The template for displaying the Professional Circle Page
 *
 */

get_header('get-involved'); ?>

<div class="container" id="get-involved-container" style="">
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-md-offset-2 col-md-8">
			<h1 class="text-center top-margin-title">WAR, Int'l Professional Circle</h1>
		</div>
		<div class="col-md-offset-1 col-md-1">
			<img src="http://warinternational.org/wp-content/uploads/2015/01/Talent-with-framing.png" alt="..." class="pull-right" style="width:150px;">
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-8-md">
			<img src="http://warinternational.org/wp-content/uploads/2015/01/WARIntlProfessionalswithframing.png" class="pull-left" style="width:175px;height:175px; margin-right:10px;"></img>
			<p class="get-involved-desc text-justify">When you join our Professional Circle, you remind the rescued and at-risk of their value and purpose. Advise our programs and partners on issues within your scope of influence and help us offer a hand-up, not a hand-out, to women and children. Whether you are a teacher, doctor, mechanic, veterinarian or other, your skills and knowledge may be an asset to our team. Click below to be added onto our list of professionals!</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-8-md">
			<h2 class="text-center"><a class="gold-link prof-circle-link" href="#">Join the Professional Circle!</a></h2>
			<img src="http://warinternational.org/wp-content/uploads/2015/01/get-involved-volunteer-combo.png" class="pull-right" style="width:200px;height:200px; margin-right:20px; margin-top:-67px;"></img>	
		</div>
	</div>
</div>
<div class="lightbx" style="display: none">
	<div id="prof-circle-href" style="padding: 10px">
		<h2>Join the Professional Circle Form</h2>
		<div>
			<?php echo do_shortcode('[gravityform id="17" name="Join the Professional Circle" ajax="true"]'); ?>
		</div>
	</div>
</div>	
<?php get_footer(); ?>