<?php
/*
 * The template for displaying the WAR Blog page.
 * By: Pj Finger
 */

get_header(); ?>
<?php get_sidebar("warblog"); ?>
		<div id="container">
			
			<div id="content" role="main">
			
			<div class="warblog-page-title">
			The WAR Blog
			</div>
				<?php
					//The Query
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$new_query = new WP_Query();
					$new_query->query( 'showposts=10&post_type=warblog&paged='.$paged );

					//The Loop
					while ($new_query->have_posts()) : $new_query->the_post(); ?>

						<div class = "test_div">
							<a href="<?php the_permalink(); ?>">
							<a style = "font-size: 20px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</br>
							<div class="warblog-meta">
							<?php warblog_posted_on(); ?>
							</div>
							<?php echo the_content();?>
							</br></br>
						</div>
					<?php endwhile; 

					// pager
					if($new_query->max_num_pages>1){?>
						<p class="pager">
						Select Page:
						<?php
						for($i=1;$i<=$new_query->max_num_pages;$i++){?>
							<a href="<?php echo 'http://warinternational.org/warblog/'.'page/'.$i;?>" <?php echo ($paged==$i)? 'class="active"':'';?>><?php echo $i;?></a>
							<?php
						}?>
						</p>
					<?php } ?>
			

			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>
