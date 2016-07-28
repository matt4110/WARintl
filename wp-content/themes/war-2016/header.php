<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">

		<header role="banner">
			<div id="header">
				<a href=<?php get_bloginfo( 'url' ); ?> ><img id="seal" src="/wp-content/themes/war-2016/assets/images/war-seal.png" alt="women at risk seal"></a>
				<img id="logo" src="/wp-content/themes/war-2016/assets/images/war-logo.png" alt="women at risk logo">
				<ul class="horizontal-list-right no-margin">
					<li class="horizontal-li--gold-border"><a href="http://store.warchestboutique.com">SHOP WITH A PURPOSE</a></li>
					<li class="horizontal-li--gold-border"><a href=<?php get_bloginfo( 'url' ); ?>"/get-involved/host-a-party">HOST A PARTY</a></li>
					<li class="horizontal-li--gold-border"><a href=<?php get_bloginfo( 'url' ); ?>"/events">UPCOMING EVENTS</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<!-- Main Nav -->
			<ul class="full-width-nav--black">
				<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?> >Home</a></li>
				<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"">About Us</a>
					<ul class="sub-nav">
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"">Location & Hours</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"">Contact Us</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"">FAQ</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"">Endorsements</a></li>
					</ul>
				</li>
				<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"">News & Media</a>
					<ul class="sub-nav">
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Upcoming Events</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Story Gallery</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Sweetie Updates</a></li>
					</ul>
				</li>
				<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"">Get Involved</a>
					<ul class="sub-nav">
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Understand the Risks</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Upcoming Events</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Host A Party</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Civilian First Responders</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Fundraisers</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">S.O.A.P. Project</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Team WAR</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">One Light Defense</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Liz Curtis Higgs Event</a></li>
					</ul>
				</li>
				<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"">Programs</a>
					<ul class="sub-nav">
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">International Safehouses</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Domestic Safehouses</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Vocational Training</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Micro Enterprises</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Education</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Orphanages</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Outreach</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Medical Aid</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Emergency Intervention</a></li>
					</ul>
				</li>
				<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"">Donate</a></li>
				<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"">Store</a></li>
				<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"">Prayer</a>
					<ul class="sub-nav">
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Prayer Calendar</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Prayer Request Form</a></li>
						<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/">Red Light Blogger</a></li>
					</ul>
				</li>
			</ul>
		</header><!-- .site-header -->

		<div id="content" class="site-content">
