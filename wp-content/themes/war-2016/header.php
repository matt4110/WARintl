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
				<a href=<?php get_bloginfo( 'url' ); ?>"/home" ><img id="seal" src="/wp-content/themes/war-2016/assets/images/war-seal.png" alt="women at risk seal"></a>
				<img id="logo" src="/wp-content/themes/war-2016/assets/images/war-logo.png" alt="women at risk logo">
				<div id="donate">
					<a href=<?php get_bloginfo( 'url' ); ?>"/donate/"><h1 id="donate-header">DONATE</h1></a>
				</div>
				<ul class="horizontal-list-right no-margin">
					<li class="horizontal-li--gold-border"><a href="http://store.warchestboutique.com">SHOP WITH A PURPOSE</a></li>
					<li class="horizontal-li--gold-border"><a href=<?php get_bloginfo( 'url' ); ?>"/take-action/host-a-party">HOST A PARTY</a></li>
					<li class="horizontal-li--gold-border"><a href=<?php get_bloginfo( 'url' ); ?>"/events">UPCOMING EVENTS</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<!-- Main Nav -->
			<div id="desktop-menu">
				<ul class="full-width-nav--black">
					<!-- Desktop/Full Menu -->
					<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"/home" >Home</a></li>
					<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"/about-us/">About Us</a>
						<ul class="sub-nav">
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/about-us/locations-hours/">Location & Hours</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/about-us/contact-us/">Contact Us</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/faq/">FAQ</a></li>
						</ul>
					</li>
					<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"/news/">News & Media</a>
						<ul class="sub-nav">
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/upcoming-events/">Upcoming Events</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/news-media/video-gallery/">Video Gallery</a></li>
						</ul>
					</li>
					<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"/take-action/">Take Action</a>
						<ul class="sub-nav">
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/understand-the-risks/">Understand the Risks</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/events/">Upcoming Events</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/host-a-party/">Host A Party</a></li>
						</ul>
					</li>
					<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"/programs/">Programs</a>
						<ul class="sub-nav">
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/sweetie/">Sweetie Updates</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/international-safehouses/">International Safehouses</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/domestic-safehouses/">Domestic Safehouses</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/vocational-training/">Vocational Training</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/micro-enterprises/">Micro Enterprises</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/education/">Education</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/orphanages/">Orphanages</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/outreach/">Outreach</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/medical-aid/">Medical Aid</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/emergency-intervention/">Emergency Intervention</a></li>
						</ul>
					</li>
					<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"/donate/">Donate</a></li>
					<li class="horizontal-li"><a href="http://store.warchestboutique.com">Store</a></li>
					<li class="horizontal-li"><a href=<?php get_bloginfo( 'url' ); ?>"/prayer/">Prayer</a>
						<ul class="sub-nav">
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/prayer-calendar/">Prayer Calendar</a></li>
							<li class="sub-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/prayer-request/">Prayer Request Form</a></li>
						</ul>
					</li>
					<!-- /Desktop/Full Menu -->
				</ul>
			</div>
			<!-- Mobile Menu -->
			<div id="mobile-menu">
				<div class="mobile-menu-bar">
					<button class="hamburger">&#9776;</button>
	  				<button class="cross">&#735;</button>
  				</div>
				<ul class="full-width-nav--mobile">
					<li class="mobile-nav-li nav-featured"><a href=<?php get_bloginfo( 'url' ); ?>"/donate">DONATE</a></li>
					<li class="mobile-nav-li nav-featured"><a href="http://warchestboutique.com">SHOP WITH A PURPOSE</a></li>
					<li class="mobile-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/home">HOME</a></li>
					<li class="mobile-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/about-us">ABOUT US</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/locations-hours/">Locations & Hours</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/contact-us/">Contact Us</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/faq/">Faq</a></li>
					<li class="mobile-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/news-media">NEWS & MEDIA</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/upcoming-events">Upcoming events</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/video-gallery">Video Gallery</a></li>
					<li class="mobile-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/take-action">TAKE ACTION</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/understand-the-risks/">Understand the Risks</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/upcoming-events/">Upcoming Events</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/host-a-party/">Host a Party</a></li>
					<li class="mobile-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/programs">PROGRAMS</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/sweetie/">Sweetie Updates</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/international-safehouses/">International Safehouses</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/domestic-safehouses/">Domestic Safehouses</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/vocational-training/">Vocational Training</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/micro-enterprises/">Micro Enterprises</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/education/">Education</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/orphanages/">Orphanages</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/outreach/">Outreach</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/medical-aid/">Medical Aid</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/emergency-intervention/">Emergency Intervention</a></li>
					<li class="mobile-nav-li"><a href=<?php get_bloginfo( 'url' ); ?>"/prayer">PRAYER</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/prayer-calendar">Prayer Calendar</a></li>
						<li class="mobile-nav-li-sub"><a href=<?php get_bloginfo( 'url' ); ?>"/prayer-request/">Prayer Request</a></li>
				</ul>
			</div>
			<!-- /Mobile Menu -->
			<!-- /main nav -->

		</header><!-- .site-header -->

		<div id="content" class="site-content">
