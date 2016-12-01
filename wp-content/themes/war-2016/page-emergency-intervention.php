<?php
/*
 Template Name: Programs - Emergency Intervention
*/

get_header(); 
//include bootstrap
get_template_part( 'partials/bootstrap' );?>
<style>
	.text-center { text-align: center; }
</style>
<div id="container">
	<div id="content" role="main">
		<div id = "Emergency" class="container">
			<div class ="quote text-center">
				</br></br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">"Justice delayed is justice denied."</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"><p>- Martin Luther King Jr.</p></div>
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h2 class="text-center">Emergency Intervention</h2></div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>In a world in which order continues to pull toward chaos, intervention frequently takes on an urgency: an immediate rescue must take place, a pressing need must be met, critical aid must be given. Emergency Intervention programs make it possible for us to come to the aid of our partners on short notice in situations like these when the need for action, resources, or funds is paramount.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center">Rescue</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>A baby has been sold and must be found without delay. A young girl whose safety is jeopardized must immediately be moved to another location. A woman has been attacked and needs prompt medical care. In such situations, an immediate response is required. Other needs may be less intense but are no less dire: a natural disaster wipes out the resources of an entire village, a safehouse is overwhelmed by an influx of women following a police raid, or a child needs a crucial surgery his parents cannot afford. Day or night, in crises near or far, WAR, Int'l's Emergency Intervention programs come to the rescue, reminding those in the midst of hardship and trauma that they are valued and worth fighting for.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Restoration & Empowerment</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Emergency intervention may often begin with rescue, but it doesn't end there. Once the immediate need has been met, we can begin to set a woman, man, or child on the road to restoration and empowerment. The rescued baby is placed in a loving home; the at-risk girl is given a scholarship to attend school in her new, safe location; the woman recovering from life-saving surgery receives counseling to help her heal emotionally. Tools and assistance help the villagers rebuild and re-establish sustainability after disaster; clean and comfortable wardrobes welcome the newly-arrived safehouse residents to the new lives they are about to begin.  At other times, intervention actually begins at the restoration and empowerment stages. An internationally-trafficked survivor yearning to go back to her native country may lack the resources to set in motion her return home, or a recent vocational training program graduate may lack professional clothing to go out and pursue a job. In these and other situations, Emergency Intervention programs can step in to ensure that the at-risk or rescued individual receives the needed assistance and resources to continue his or her journey to restoration and empowerment.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">The Role of Women At Risk, International (WAR, Int'l)</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>When partners come to us with emergency requests, WAR, Int'l responds, mustering funds and resources to meet the needs. We subsidize emergency rescues, disaster relief, and emergency medical care. Working hand in hand with our partners, we prepare internationally-trafficked survivors for safe and successful journeys home. Emergency assistance may also take the form of scholarships for immediate educational and vocational needs, or clothing and school supply drives on behalf of our partners. WAR, Int'l also takes action to help meet pressing needs of women and families in our own local programs. No matter the distance, time of day, or risk issue, WAR, Int'l and our partners are committed to caring for those in traumatic situations and responding to emergency needs in the United States and abroad.</p></div>
			</div>
			
			<!--Stories Partial Template-START-->
			<?php 
			$storyTypeName = 'Emergency Intervention';
			//Set Story Type
			$storyType = 'Emergency ';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/stories.php')); ?>
			<!--Stories Partial Template-END-->

			<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->

			<!--Programs Partial Template-START-->
			<?php 
			$programTypeName = 'Emergency Intervention';
			//Set Program Type
			$programType = 'Emergency';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/programs.php')); ?>
			<!--Programs Partial Template-END-->	
		
		</div>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>