<?php
/*
 Template Name: Programs - Orphans
*/

get_header(); 
//include bootstrap
get_template_part( 'partials/bootstrap' );?>
<style>
	.text-center { text-align: center; }
</style>
<div id="container">
	<div id="content" role="main">
		<div id = "Orphans" class="container">
			<div class ="quote text-center">
				</br></br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">"To us, family means putting your arms around each</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">other and being there."</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"><p>- Barbara Bush, 1992</p></div>
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h1 class="text-center">Orphanages</h1></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>All over the world, Women At Risk, International (WAR, Int'l) partners are answering the call to "care for the least of these," providing homes where orphaned, abandoned, and at-risk children are protected and nurtured. Whether caring for children without parents or sheltering children at risk of being sold or abused, each home provides a safe, loving environment where children can flourish.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center">Rescue & Restoration</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>One child might be orphaned by disease, another by war or violence. A child may have been abandoned or given up by a desperate parent who was unable to care for him. Still another may be on the verge of being sold by her family.  When these vulnerable children come under the loving care of our partners, they are removed from risk and brought into a place of safety and security. There they experience home and family and are given education, medical care, and counseling. Most importantly, they are encircled by loving arms and folded into a nurturing environment where they can begin to thrive. No longer left to struggle on their own, these children are free to learn and grow and look forward to bright futures of hope and promise.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Empowerment</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Our partnering orphanages go beyond providing basic needs, working tirelessly to provide opportunities for the children with whom they have been entrusted. Some offer adoption, diligently seeking to place children in the care of loving families. Others focus on providing the children and teens in their care with education and vocational training, offering them building blocks to independent, successful futures. Several partners coordinate women's microenterprise initiatives that fund food services for orphans, breast milk banks for adoptive mothers, and HIV prevention and medical treatment.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">The Role of Women At Risk, International (WAR, Int'l)</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>The WAR, Int'l family loves to love these children. When traveling overseas, WAR, Int'l staff visits partnering orphanages, bringing toys, coloring books, and crafts. Back home, we hold fundraisers and clothing drives, collecting diapers, onesies, blankets, and coats for orphaned children. We help build and outfit facilities, constructing dormitories and playgrounds or purchasing appliances, beds, and linens. We offer medical scholarships to children in need of health care, vocational scholarships for teenagers eager to learn a trade, and educational scholarships to those desiring further education. We are passionate about caring for orphaned youth, rescuing children from the risk of exploitation and ensuring that they are prepared for futures of dignity and purpose.</p></div>
			</div>
			
			<!--Stories Partial Template-START-->
			<?php 
			$storyTypeName = 'Orphans';
			//Set Story Type
			$storyType = 'Orphanages';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/stories.php')); ?>
			<!--Stories Partial Template-END-->

			<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->

			<!--Programs Partial Template-START-->
			<?php 
			$programTypeName = 'Orphan';
			//Set Program Type
			$programType = 'Orphanages';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/programs.php')); ?>
			<!--Programs Partial Template-END-->	
		
		</div>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>