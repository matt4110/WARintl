<?php
/*
 Template Name: Programs - International Safehouses
*/

get_header(); 
//include bootstrap
get_template_part( 'partials/bootstrap' );?>
<style>
	.text-center { text-align: center; }
</style>
<div id="container">
	<div id="content" role="main">
		<div id = "InternationalSafehouses" class="container">
			<div class ="quote">
				</br></br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"><p class="text-center">"The ache for home lives in all of us, the safe place</p></div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"><p class="text-center">where we can go as we are and not be questioned."</p></div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"><p class="text-center">– Maya Angelou</p></div>
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h2 class="text-center">International Safehouses</h2></div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><p>A safehouse is more than just a home; it is a place of healing, support, and liberation. A safehouse may provide shelter or it may function as a non-residential center, offering vocational training programs and other services within a safe and secure setting. Although our international partners vary from culture to culture in the methods they use, their hearts maintain the same goals and passion: to rescue, restore, and empower the at-risk and the wounded.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center">Rescue</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><p>Returning time after time to local red light districts, safehouse staff members develop relationships with men and women working in bars and brothels. After listening to their stories of the past and their dreams for the future, our partners gently offer them an opportunity to make a new living in a safe place, free of abuse and danger. It may take days or even years to convince someone that there is hope beyond the red light district, but our safehouse partners are committed, knowing that each person is worth the time and energy they invest in bringing about a new life.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center">Restoration</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><p>When a survivor comes to one of our partnering safehouses, his or her journey toward emotional, spiritual, and physical healing can begin. Along with shelter, safehouse residents receive child care, medical care, counseling, and much more, all within therapeutic communities who understand their trauma and are healing alongside them. Our partners understand that each survivor has a different story and unique set of needs, and they are committed to walking with each of them every step of the way.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center">Empowerment</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><p>WAR, Int’l partners understand that rescue and recovery are not enough. Giving survivors the means to support themselves is crucial in ensuring continued lives of dignity. To this end, safehouses provide various opportunities such as employment, vocational training, and education, enabling survivors to create hopeful futures for themselves and their children. Thus empowered, many go on to become agents of change in their own communities—promoting trafficking awareness, teaching abuse prevention, and even beginning their own co-ops and safehouses.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center">The Role of Women At Risk, International (WAR, Int'l)</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><p>Some safehouses come to WAR, Int’l’s attention as the dreams of visionary partners. We come alongside these partners to offer economic analysis, business plans, income-generating opportunities, and building funds, mobilizing our resources to turn their dreams into reality. In other cases, we form partnerships with existing safehouses, helping them build or renovate facilities, hire additional staff, and raise capital for micro-enterprises. We help set up vocational skills programs and raise scholarship funds for women to attend cosmetology school or university. We also provide safehouses with funds to safely repatriate survivors trafficked from their homelands. Many safehouses create product, which we sell at events and home parties, online, and in our WAR Chest Boutiques. In all of these ways, WAR, Int’l helps to give hope and healing to the rescued, empowering them to lead lives of dignity.</p></div>
			</div>
			
			<!--Stories Partial Template-START-->
			<?php 
			$storyTypeName = 'International Safehouses';
			//Set Story Type
			$storyType = 'International';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/stories.php')); ?>
			<!--Stories Partial Template-END-->

			<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->

			<!--Programs Partial Template-START-->
			<?php 
			$programTypeName = 'International Safehouse';
			//Set Program Type
			$programType = 'International';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/programs.php')); ?>
			<!--Programs Partial Template-END-->	
		
		</div>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>