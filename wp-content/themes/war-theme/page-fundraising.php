<?php

get_header('get-involved'); ?>

<div class="container" id="get-involved-container">
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-md-offset-2 col-md-8">
			<h1 class="text-center top-margin-title">WAR, Int'l Fundraisers</h1>
		</div>
		<div class="col-md-offset-1 col-md-1">
			<img src="http://warinternational.org/wp-content/uploads/2015/01/Treasure-with-framing.png" alt="..." class="pull-right" style="width:150px;">
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-0 col-md-4 col-sm-offset-2 col-sm-9 col-xs-7">
			<img src="http://warinternational.org/wp-content/uploads/2015/03/TeamWARwithframing.png" alt="..." class="center-block behind" style="width:250px;">
			<div class="overlay-div">
				<h5 class="text-center">Join TeamWAR Racers</h5>
				<p class = "text-center">Every spring, TeamWAR racers unite to raise funds and awareness for anti-trafficking efforts at WAR, Int'l. With every mile and dollar earned, they remind rescued women of their value and purpose. Click <a href="http://warinternational.org/teamwar/">here</a> to learn more about how you can join TeamWAR.</p>
				<a href="https://warinternational.org/donate/" target="" class="get-involved-link"><h5 class="text-center">Give a Financial Gift</h5></a>
			</div>
		</div>
		<div class="col-md-offset-0 col-md-4 col-sm-offset-2 col-sm-9 col-xs-7">
			<img src="http://warinternational.org/wp-content/uploads/2015/04/get-involved-war-products.png" alt="..." class="center-block behind" style="width:250px;">
			<div class="overlay-div">
				<h5 class="text-center">Sell WAR Products</h5>
				<p class = "text-center"></br>Every Holiday season, WAR, Int'l partners with hundreds of local and out-of-state business who host WAR ornaments. It costs nothing but your space and raises funds for our many programs and partners. Click <a class="email-form-link" href="#">here</a> to find out more.</br></br></p>
				<a href="http://warinternational.org/get-involved/host-an-event/" target="" class="get-involved-link"><h5 class="text-center">Host a Party, Save a Life</h5></a>
			</div>
		</div>
		<div class="col-md-offset-0 col-md-4 col-sm-offset-2 col-sm-9 col-xs-7">
			<img src="http://warinternational.org/wp-content/uploads/2015/04/get-involved-create-own.png" alt="..." class="center-block behind" style="width:250px;">
			<div class="overlay-div">
				<h5 class="text-center">Create your own project</h5>
				<p class = "text-center"></br>Whether it be a hike on the Appalachian Trail, a bike ride across America, or an auction (its all been done), we can't wait for you to create a fundraising project that works with your passion and talents! Click <a href="http://warinternational.org/wp-content/uploads/2013/05/Fundraising-Packet-Final.pdf" target="_blank">here</a> for more instructions!</br></br></p>
				<a href="http://warinternational.org/get-involved/join-our-team/" target="" class="get-involved-link"><h5 class="text-center">Join the Style Committee</h5></a>
			</div>
		</div>
	</div>
</div>

<div style="display:none">
    <div id="email-form-href" style="padding: 10px;background: #fff">
        <?php echo do_shortcode('[gravityform id=22 title=false description=false ajax=true tabindex=49]'); ?>
    </div>
</div>

<?php get_footer(); ?>