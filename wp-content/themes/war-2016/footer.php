<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="footer">
			<div class="row">
				<div class="footer-left">
					<a href=<?php get_bloginfo( 'url' ); ?>><img id="footer-logo" src="/wp-content/themes/war-2016/assets/images/war-logo.png"></a>
					<p class="info">(616)855-0796</p>
					<p class="info"><a href="mailto:info@warinternational.org">info@warinternational.org</a></p>
					<br>
					<p class="info"><a href=<?php get_bloginfo('url'); ?>"/career-opportunities/">Career Opportunities</a></p>
					<p class="info"><a href=<?php get_bloginfo('url'); ?>"/about-us/board-of-directors">Board of Directors</a></p>
					<p class="info"><a href=<?php get_bloginfo('url'); ?>"/about-us/board-of-reference">Board of Reference</a></p>
				</div>
				<div class="footer-right">
					<a href="http://facebook.com/womenatrisk/" target="_blank"><img class="footer-icon" src="/wp-content/themes/war-2016/assets/images/icon-facebook.png"></a>
					<a href="http://instagram.com/the_war_chest_boutique/" target="_blank"><img class="footer-icon" src="/wp-content/themes/war-2016/assets/images/icon-instagram.png"></a>
					<a href="http://youtube.com/womenatrisk" target="_blank"><img class="footer-icon" src="/wp-content/themes/war-2016/assets/images/icon-youtube.png"></a>
					<a href="https://www.pinterest.com/womenatriskintl/" target="_blank"><img class="footer-icon" src="/wp-content/themes/war-2016/assets/images/icon-pinterest.png"></a>
				</div>
				<br>
				<div class="footer-right" id="ecfa">
					<p id="ecfa-text">WAR, Int'l is certified with the ECFA, an accreditation agency dedicated to both providing financial accountability and upholding financial integrity. <a href="http://www.ecfa.org">www.ecfa.org</a></p>
					<img id="ecfa-icon" src="/wp-content/themes/war-2016/assets/images/ECFA.png">
				</div>
				<div class="clearfix">&nbsp;</div>
			</div>
			

			

		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->


<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.9/jquery.transit.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<script type="text/javascript" src=<?php get_bloginfo( 'url' ); ?>"/wp-content/themes/war-2016/assets/js/scripts.js"></script>
<script type="text/javascript" src=<?php get_bloginfo( 'url' ); ?>"/wp-content/themes/war-2016/assets/js/lity.min.js"></script>
<?php wp_footer(); ?>
<!-- Google Analytics Tracking info -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44929315-1', 'auto');
  ga('send', 'pageview');
</script>

</body>
</html>
