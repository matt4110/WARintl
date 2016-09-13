<?php
/*
 Template Name: Home Page

 */

get_header(); ?>

	<div class="carousel-wrapper">
		<div class="carousel">
		    <div class="inner">
		      <div class="slide active">
		      	<h1>1</h1>
		      </div>
		      <div class="slide">
		        <h1>2</h1>
		      </div>
		      <div class="slide">
		      	<h1>3</h1>
		      </div>
		    </div>
		    <div class="arrow arrow-left"></div>
		    <div class="arrow arrow-right"></div>
  		</div>
	</div>

	<!-- Box Menu -->
	<div id="primary" class="content-area">
		<div class="box-menu">
			<div class="box-menu-item">
				<div class="box-menu-image">
					<img src=<?php get_bloginfo('url'); ?>"/wp-content/themes/war-2016/assets/images/box-store.jpg">
				</div>

				<div class="box-menu-split-text">
					<h1>shop</h1>
					<h1 class="small">with a</h1>
					<h1>purpose</h1>
					<p>Gifts of International Distinction</p>
				</div>

			</div>

			<div class="box-menu-item">
				<div class="box-menu-image">
					<img src=<?php get_bloginfo('url'); ?>"/wp-content/themes/war-2016/assets/images/box-ustc.jpg">
				</div>
				<div class="box-menu-split-text">
					<h1>Shop with a Purpose</h1>
				</div>
			</div>
		<!-- /Box Menu -->	
		</div>
		<div class="clearfix"></div>
	</div><!-- .content-area -->

<?php get_footer(); ?>
