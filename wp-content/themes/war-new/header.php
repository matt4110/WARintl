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

		<header id="header" role="banner">
			<a href=<?php get_bloginfo( 'url' ); ?> ><img src="" alt="women at risk logo"></a>
			<div>
				<ul class="horizontal-list-right">
					<li class="horizontal-li--gold-border"><a href="http://store.warchestboutique.com">SHOP WITH A PURPOSE</a></li>
					<li class="horizontal-li--gold-border"><a href=<?php get_bloginfo( 'url' ); ?>"/get-involved/host-a-party">HOST A PARTY</a></li>
					<li class="horizontal-li--gold-border"><a href=<?php get_bloginfo( 'url' ); ?>"/events">UPCOMING EVENTS</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</header><!-- .site-header -->

		<div id="content" class="site-content">
