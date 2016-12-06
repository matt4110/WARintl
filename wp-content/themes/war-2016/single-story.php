<?php
/**
 * The Template for displaying all single Story posts.
 *
 */
get_header();
get_template_part( 'partials/bootstrap' );?>
<style>
	.text-center { text-align: center; }
</style>
	<div id="container">
		<div id="content" role="main" style="color:black;">
			<!-- BEGIN TEMPLATE -->
			<?php
			//Setup data for story layout
			$country = get_post_meta($post->ID, 'country', true);
			$imageID = get_post_meta($post->ID, 'picture', true);
			$imageAttributes = wp_get_attachment_image_src( $imageID );
			$programID = get_post_meta($post->ID, 'program', true);
			?>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center"><h1 style="color:black; margin:0.67em 0;"><?php echo the_title();?></h1></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center"><?php echo get_the_title($programID);?></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center"><?php echo get_the_title($country);?></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center" style="font-size:2em; font-weight:bold;"><img class="" src="<?php echo $imageAttributes[0]; ?>" style="margin-top:20px; height: 300px; width:300px;"></img></div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-2 col-xs-1"></div><div class="col-md-6 col-sm-8 col-xs-10"><p><?php echo get_post_meta($post->ID, 'story_text', true); ?></p></div><div class="col-md-3 col-sm-2 col-xs-1"></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center"><a href=" <?php echo get_permalink($programID);  ?>">LEARN MORE</a></div>
			</div>

			<div class="story-nav">
				<div class="prev-posts">
			    <?php
			    $prev_post = get_previous_post();
			    if($prev_post) {
			       $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
			       echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" "><strong><< Previous Story </strong></a>' . "\n";
			                    }
			    ?>
			    </div>

			    <div class="next-posts">
			    <?
			    $next_post = get_next_post();
			    if($next_post) {
			       $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
			       echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" "><strong>  Next Story >></strong></a>' . "\n";
			                    }
			    ?>
			    </div>
			</div>

			<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->
		</div>
		<!--END TEMPLATE -->
		</div><!-- #content -->
	</div><!-- #container -->
<?php get_footer() ?>