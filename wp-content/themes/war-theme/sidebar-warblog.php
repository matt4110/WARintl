<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		<div id="primary" class="warblog-widget-area" role="complementary">
			<ul  class="warblogsidebar">
				<li id="meta" class="widget-container">
					<h3 class="warblogsidebar-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
					<ul style="font-size:20px;" >
						<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 2 ) ); ?>
						<li><a href="http://www.warinternational.org/warblog" style="font-size:100%; color: #B5985A">Blog Home</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- #primary .widget-area -->
