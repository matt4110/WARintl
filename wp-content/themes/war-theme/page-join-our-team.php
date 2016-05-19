<?php

get_header('get-involved'); ?>

<div class="container" id="get-involved-container">
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-md-offset-2 col-md-8">
			<h1 class="text-center top-margin-title">Join Our Team</h1>
		</div>
		<div class="col-md-offset-1 col-md-1">
			<a href="http://warinternational.org/get-involved/"><img src="http://warinternational.org/wp-content/uploads/2015/01/Time-with-framing.png" alt="..." class="pull-right" style="width:150px;"></a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-0 col-md-4 col-sm-offset-2 col-sm-9 col-xs-7">
			<img src="http://warinternational.org/wp-content/uploads/2015/01/Internwithframing.png" alt="..." class="center-block behind" style="width:250px;">
			<div class="overlay-div">
				<h5 class="text-center">WAR, Int'l Internship</h5>
				<p class = "text-center">WAR, Int'l is searching for interns who can share their administrative, writing, photography, multimedia, graphic design or event management skills! Work at our WAR headquarters in Grand Rapids, MI then take your new-found abilities on to your future career. Click <a class="lbp-email2-link" href="#">here</a> to request information.</br></br></p>
				<a href="http://warinternational.org/volunteer/" target="" class="get-involved-link"><h5 class="text-center two-lines">Volunteer with WAR, Int'l</h5></a>
			</div>
		</div>
		<div class="col-md-offset-0 col-md-4 col-sm-offset-2 col-sm-9 col-xs-7">
			<img src="http://warinternational.org/wp-content/uploads/2015/01/get-involved-style-committee.png" alt="..." class="center-block behind" style="width:250px;">
			<div class="overlay-div">
				<h5 class="text-center">Style Committee</h5>
				<p class = "text-center">By voting on WAR product samples through email, you help women create pieces that sell well, empowering them financially and generating support for their programs. For an at-risk or rescued woman, what is truly empowering is when others buy & brag on the work of their hands! Click <a class="lbp-email-link" href="#">here</a> to request information.</p>
				<a href="http://warchestboutique.com/" target="_blank" class="get-involved-link"><h5 class="text-center two-lines">Shop the WAR Chest Boutique</h5></a>
			</div>
		</div>
		<div class="col-md-offset-0 col-md-4 col-sm-offset-2 col-sm-9 col-xs-7">
			<img src="http://warinternational.org/wp-content/uploads/2015/01/get-involved-product-consultant.png" alt="..." class="center-block behind" style="width:250px;">
			<div class="overlay-div">
				<h5 class="text-center">Product Consultants</h5>
				<p class = "text-center"></br>Share your passion for justice and fashion! Learn about products, handcrafted by wounded women, and then take our products into your community and spread the word about rescue, restoration, and empowerment. Click <a class="email-form-link" href="#">here</a> to request information!</br></br></br></p>
				<a href="http://warinternational.org/host-an-event/" target="" class="get-involved-link"><h5 class="text-center">Host a Party or Event</h5></a>
			</div>
		</div>
	</div>
</div>

<div style="display:none">
    <div id="email-form-href" style="padding: 10px;background: #fff">
		<h2>WAR Product Consultant Request</h2>
        <?php echo do_shortcode('[gravityform id=19 title=true description=false ajax=true tabindex=49]'); ?>
    </div>
</div>
<div style="display:none">
    <div id="lbp-email-div" style="padding: 10px;background: #fff">
		<h2>WAR Style Committee Request</h2>
        <?php echo do_shortcode('[gravityform id=26 title=true description=false ajax=true tabindex=100]'); ?>
    </div>
</div>
<div style="display:none">
    <div id="lbp-email2-div" style="padding: 10px;background: #fff">
		<h2>WAR Internship Request</h2>
        <?php echo do_shortcode('[gravityform id=27 title=true description=false ajax=true tabindex=100]'); ?>
    </div>
</div>

<?php get_footer(); ?>