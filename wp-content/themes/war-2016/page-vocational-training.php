<?php
/*
 Template Name: Programs - Vocational Training
*/

get_header(); 
//include bootstrap
get_template_part( 'partials/bootstrap' );?>
<style>
	.text-center { text-align: center; }
</style>
<div id="container">
	<div id="content" role="main">
		<div id = "VocationalTraining">
			<div class ="quote text-center">
				</br></br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">"No work is insignificant. All labor that uplifts humanity</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">has dignity and importance and should be</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">undertaken with painstaking excellence."</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"><p>- Martin Luther King Jr., 1967</p></div>
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h2 class="text-center">Vocational Training</h2></div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Baking. Sewing. Jewelry-making. Cosmetology. Agriculture. These are just of few of the opportunities awaiting the women and men involved in our vocational training programs, where they are learning viable skills geared to the local culture and job market. Some of these programs operate from within safehouses; others take place in day programs or community centers, but all share a common goal of equipping and empowering survivors to support themselves, offering them the hope of a better life.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Rescue</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Rescue involves far more than simply removing a person from a situation. A study from one Asian country revealed that ninety percent of rescued women who did not receive job training were re-sold or returned to the streets. Vocational programs are a crucial aspect of the rescue process, giving precious survivors a permanent way out by teaching them valuable job skills. Likewise, equipping at-risk individuals--such as daughters from poor families, refugees, and widows--with marketable job skills leaves them far less vulnerable to the lure of traffickers, rescuing them from exploitation before it ever occurs.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Restoration</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Learning to work with dignity is a powerful piece of the healing process for a wounded person. As a young woman creates items of beauty and value, she is reminded of her own worth; as a young man grows in skills and proficiency, he realizes his own potential and purpose. Along the way, these survivors are supported and nurtured by dedicated teachers committed not just to teaching job skills, but to walking with them on the journey out of a dark place and into a bright future.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Empowerment</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>As survivors learn sought-after job skills, most programs employ them in a social enterprise to give them safe, hands-on work experience. Some provide certifications that open doors to professional employment. Other programs, needing to work within conservative cultural frameworks, train and equip women to work from their homes. Their new status as income-providers enables these women to end or avoid abuse as they gain value in the eyes of their families and communities.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">The Role of Women At Risk, International (WAR, Int'l)</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>WAR, Int'l takes great joy in helping to build and grow these programs. We dream with our partners, analyzing economic opportunities, designing business plans, and sending experienced professionals to train staff. We assist our partners in raising capital for new business ventures, buildings, and program expansion. We sell their products, generating sustainable support. In addition to partnering with other programs, WAR, Int'l now has its own vocational program where rescued and at-risk women from the U.S. are making jewelry, soaps, and candles to sell in our boutiques and training as baristas in our cafe. WAR, Int'l takes great joy in watching survivors rewrite their stories as they learn the skills that will change the courses of their lives.</p></div>
			</div>
			
			<!--Stories Partial Template-START-->
			<?php 
			$storyTypeName = 'Vocational Training';
			//Set Story Type
			$storyType = 'Vocational';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/stories.php')); ?>
			<!--Stories Partial Template-END-->

			<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->

			<!--Programs Partial Template-START-->
			<?php 
			$programTypeName = 'Vocational Training';
			//Set Program Type
			$programType = 'Vocational';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/programs.php')); ?>
			<!--Programs Partial Template-END-->	
		
		</div>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>