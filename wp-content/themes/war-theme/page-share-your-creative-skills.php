<?php

get_header('get-involved'); ?>

<div class="container" id="get-involved-container" style="">
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-md-offset-2 col-md-8">
			<h1 class="text-center top-margin-title">WAR, Int'l Creative Team</h1>
		</div>
		<div class="col-md-offset-1 col-md-1">
			<img src="http://warinternational.org/wp-content/uploads/2015/01/Talent-with-framing.png" alt="..." class="pull-right" style="width:150px;">
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-8-md">
			<img src="http://warinternational.org/wp-content/uploads/2015/01/CreativeSkillswithframing.png" class="pull-left" style="width:175px;height:175px; margin-right:10px;"></img>
			<p class="get-involved-desc text-justify">Love creativity? If you have professional-level skills, consider joining WAR's Creative Team. Our office is constantly searching for quality, free-lance photographers, writers, designers, and more! Be a voice for the silenced through your unique abilities. OR encourage rescued women with handmade greeting cards, art, and more!  Click below to request more information and to join the team!</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-8-md">
			<h2 class="text-center"><a class="gold-link volunteer-link" href="#">Join WAR's Creative Team</a></h2>
			<img src="http://warinternational.org/wp-content/uploads/2015/03/get-involved-creative-skills-combo.png" class="pull-right" style="width:200px;height:200px; margin-right:20px; margin-top:-67px;"></img>	
		</div>
	</div>
</div>
<div class="lightbx" style="display: none">
	<div id="volunteer-href" style="padding: 10px">
		<h2>Join WAR's Creative Team</h2>
		<div>
			<?php echo do_shortcode("[gravityform id='18' name='Join WAR's Creative Team' ajax='true']"); ?>
		</div>
	</div>
</div>	
<?php get_footer(); ?>