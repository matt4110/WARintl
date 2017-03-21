A few notes about this theme:

build started on May 31, 2016 by Matthew Johnson (Women At Risk, international webmaster)
This is a child theme of WordPress twenty-sixteen theme

This theme was created for two reasons:
1. To update the site to be current with functionality, features, and design.

2. To clean up the backend. Previously, there was no protocol for organization of files, or of the wordpress backend. To combat this I have done a couple of things:
  a. Used as few plugins as possible.
  b. Keep pages in the SQL database of wordpress as much as possible, to keep the file structure clean. The .php files you see are the pages that made sense, for functionalities sake, to be a PHP file.
  c. I installed a plugin to clean up the Wordpress Admin siderbar. To access that plugin and therefore the full sidebar you can find it on the sidebar under Settings, you will see menu editor. This will allow you to show/hide items as well as make your own menu items with whatever sub items you want.

This theme utilizes Sass for its CSS preprocessor, so do not write to style.css or they will be overwritten the next time Sass is ran. The organization of the stylesheet follows the ideas in CSS for Growns Ups presented at 2012 SXSW Interactive. Check it out here: https://www.youtube.com/watch?v=ZpFdyfs03Ug This is a very similar to SMACSS and OOCSS. If you are unfamiliar with them a quick read: https://www.sitepoint.com/css-architectures-scalable-and-modular-approaches/

To use a lightbox:
	Add the `data-lity` attribute to `<a>` elements for which you want the links to
	be opened in a lightbox:

	```html
	<a href="https://farm9.staticflickr.com/8642/16455005578_0fdfc6c3da_b.jpg" data-lity>Image</a>
	<a href="#inline" data-lity>Inline</a>
	<a href="https://www.youtube.com/watch?v=XSGBVzeBUbk" data-lity>iFrame Youtube</a>
	<a href="https://vimeo.com/1084537" data-lity>iFrame Vimeo</a>
	<a href="https://maps.google.com/maps?q=1600+Amphitheatre+Parkway,+Mountain+View,+CA" data-lity>Google Maps</a>

	<div id="inline" style="background:#fff" class="lity-hide">
	    Inline content
	</div>
	```

	If you want to open another URI than defined in the `href` attribute, just add
	a `data-lity-target` with the URI:

	```html
	<a href="/image.html" data-lity data-lity-target="/image-preview.jpg">Image</a>
	```

This site is also available on GitHub, but it is a private directory. If you would like access to this repository please email me at Matthew.Johnson4110@gmail.com