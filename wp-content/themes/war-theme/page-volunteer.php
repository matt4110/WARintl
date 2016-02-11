<?php

get_header('get-involved'); ?>

<div class="container" id="get-involved-container" style="">
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-md-offset-2 col-md-8">
			<h1 class="text-center top-margin-title">WAR, Int'l Volunteers</h1>
		</div>
		<div class="col-md-offset-1 col-md-1">
			<a href="http://warinternational.org/get-involved/"><img src="http://warinternational.org/wp-content/uploads/2015/01/Time-with-framing.png" alt="..." class="pull-right" style="width:150px;"></a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-8-md">
			<img src="http://warinternational.org/wp-content/uploads/2015/01/get-involved-volunteer.png" class="pull-left" style="width:175px;height:175px; margin-right:10px;"></img>
			<p class="get-involved-desc text-justify">Join our community of WARriors at our headquarters or events in your area. In our comfortable, on-site volunteer center, you can prepare donations, tag products, organize inventory, or even become a volunteer staff member! Families, children, and large groups are always welcome. Our team of volunteers makes it possible to continue our mission of rescue, restoration, and empowerment! Come in for a few hours or come in everyday! Click below or contact our office to schedule a time that works for you!</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-8-md">
			<h2 class="text-center"><a class="gold-link volunteer-link" href="#">Schedule a time to volunteer!</a></h2>
			<img src="http://warinternational.org/wp-content/uploads/2015/01/get-involved-volunteer-combo.png" class="pull-right" style="width:200px;height:200px; margin-right:20px; margin-top:-67px;"></img>
		</div>
	</div>
</div>
<div class="lightbx" style="display: none">
	<div id="volunteer-href" style="padding: 10px">
		<h2>Volunteer Registration</h2>
		<div>
			<?php echo do_shortcode('[gravityform id="15" name="Volunteer Registration Form" ajax="true"]'); ?>
		</div>
	</div>
</div>	

<?php get_footer(); ?>