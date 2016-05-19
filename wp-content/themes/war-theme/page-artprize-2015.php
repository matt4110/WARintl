<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

 get_header(); ?>
<?php get_sidebar(); ?>
		<div id="container">
			<div id="content" role="main">
				<div id="headermenu">
					<a class="headerbuttons artprize-link-0" href="#">What is<br/>Artprize?</a>
					<a class="headerbuttons artprize-link-1" href="#">The<br/>Artist</a>
					<a class="headerbuttons artprize-link-2" href="#">The<br/>Exhibit</a>
					<a class="headerbuttons artprize-link-3" href="#">What is <br/>Human Trafficking?</a>
					<a class="headerbuttons artprize-link-4" href="#">Take<br/>Action</a>
					<a class="headerbuttons" href="http://warinternational.org/donate?designation=Artprize%202014" target="_blank" style="line-height: 2.7em;vertical-align: top;">Donate</a>
				</div>
				<img height="342px" width="660px" src="http://warinternational.org/images/WebBanner-ArtPrize2014.jpg" />
			<div id="artprize-header">
				<em><h2><strong>Artprize Outreach, 2014</strong></h2>
				<p>An estimated 2,400 adolescents are currently for sale in West Michigan (Center for Missing and Exploited Children). With over 400,000 people flooding into Grand Rapids for ArtPrize 2014, the risk of trafficking only increases. </p>
				<p>In order to protect those at risk, WAR, Int’l developed “ArtPrize Outreach,” a campaign empowering you to take action against human trafficking in Michigan.</p> 
				<p>Join the fight by attending campaign events before, during, and after ArtPrize.</p></em>
				<ul>
				<li><strong>BEFORE</strong> ArtPrize, WAR will co-host the 	<a class=" lbp-inline-link-2" href="#">S.O.A.P. Project</a>. This event aims to empower community members, helping you take action against human trafficking. &nbsp;<a href="http://www.soapupartweek.evenbrite.com/" target="_blank">REGISTER HERE!</a></li>
				<li><strong>DURING</strong> ArtPrize, WAR will be partnering with artist Pamela Alderman. Her piece, <a href="http://pamelaalderman.com/artprize/the-scarlet-cord/" target="_blank">The Scarlet Cord</a>, will awaken the community to the realities of child trafficking while inspiring action.</li>
				<li><strong>AFTER</strong> ArtPrize, join WAR at a self-defense seminar in the effort to increase your safety and reduce the risk of trafficking. </li>
				</ul>
			</div>
			<?php echo sharing_display(); ?>
			<div class="lightbx" style="display: none">
				<div id="artprize-href-0" style="padding: 30px">
					<h1><strong>What is ArtPrize?</strong></h1>
					<p>ArtPrize is a large, independently organized art competition hosted in Grand Rapids, Michigan (home to WAR’s Headquarters). This event runs for 19 days with venues all throughout downtown and draws thousands of visitors and artists from all over the United States and the world.</p>
					<p><a href="http://www.artprize.org/"><img class="alignleft size-medium wp-image-11577" src="http://warinternational.org/wp-content/uploads/2014/08/what-is-artprize-300x200.jpg" alt="what-is-artprize" width="300" height="200" />Learn more about ArtPrize</a>!<p>
					<p>Time &amp; Place:</p>
					<p>September 24-October 12, 2014<br/>Grand Rapids, Michigan</p>
					<p><a href="http://www.artprize.org/visit">Click here for directions</a>!<p>
				</div>
				<div id="artprize-href-1" style="padding: 30px">
					<h1><strong>The Artist</strong></h1>
					<p><img class="alignright wp-image-11578 size-medium" src="http://warinternational.org/wp-content/uploads/2014/08/artprize-scarlet-cord-pamela-alderman-300x200.jpg" alt="artprize-scarlet-cord-pamela-alderman" width="300" height="200" />Pamela Alderman has a passion for healing. Through her artwork she is able to speak about issues of mental health and social justice: raising awareness and spreading hope. According to Pamela, this passion was encouraged by international artist, Makoto Fujimura. She says, “Fujimura empowered my creativity. Since his words, I’ve learned that my work as an artist communicates to our culture the powerful healing potential of art.”</p>

					<p><a href="http://www.watercolorbypamela.com/" target="_blank"><strong>Pamela’s Paintings</strong></a> are displayed in over 20 children’s hospitals and organizations across the nation, including the Grand Rapids area where Pamela now works and lives with her family. The Grand Rapids ArtPrize competition has also become a part of Pamela’s artistic career. She first entered the competition in 2009 and continued to draw the public eye each year after. Pamela was voted into the top 100 of ArtPrize 2012 and top 50 of 2013.</p>

					<p>WAR, Int’l is excited to partner with Pamela for ArtPrize 2014. Her piece, <em>The Scarlet Cord, </em>will continue her mission of hope and healing by awakening others to the reality of child trafficking and inspiring the community to take action.</p>

					<p><img class="aligncenter size-medium wp-image-11579" src="http://warinternational.org/wp-content/uploads/2014/08/artprise-scarlet-cord-pamela-alderman2-300x200.jpg" alt="artprise-scarlet-cord-pamela-alderman2" width="300" height="200" /></p>
				</div>
				<div id="artprize-href-2" style="padding: 30px">
					<h1><strong>The Exhibit</strong></h1>
					<p><strong>The Scarlet Cord<a href="http://warinternational.org/wp-content/uploads/2014/08/artprise-scarlet-cord-pamela-alderman4.jpg"><img class="alignright size-medium wp-image-11582" src="http://warinternational.org/wp-content/uploads/2014/08/artprise-scarlet-cord-pamela-alderman4-200x300.jpg" alt="artprise-scarlet-cord-pamela-alderman" width="200" height="300" /></a></strong></p>
					<p>After hearing the story of Sweetie, a baby captive in India, <a href="http://pamelaalderman.com/"><strong>artist Pamela Alderman</strong></a> reached out to WAR, Int’l in hopes of discovering a way to give survivors hope and dignity through her art.</p>
					<p>WAR, Int’l and Pamela will be partnering for ArtPrize 2014; informing and inspiring the community through Pamela’s art and then empowering them to take immediate action. WAR, Int’l volunteers will be available to share their passions with ArtPrize visitors and inspire them in their journey to bring dignity to wounded women and children.</p>
					<p><em>Artist’ Statement</em></p>
					<p>“The Scarlet Cord reveals the vulnerability and deception that enslaves the innocent. The visual language of a thin scarlet cord that zigzags, intersects, and intertwines with thirty-eight doors depicts the unique trauma bond that exists between the children and the perpetrators. The weathered doors represent the broken children who suffer an unimaginable existence, void of hope. Given enough time and abuse, the youthful minds of these victims become knotted. The result: the scarlet tether tightens.”</p>
					<p>Time &amp; Place
					<ul>
						<li>September 24 - October 12, 2014</li>
						<li>Outside at the Gerald R. Ford Museum venue</li>
						<li><a href="https://www.google.com/maps/place/Gerald+R.+Ford+Museum/@42.968432,-85.677358,17z/data=!3m1!4b1!4m2!3m1!1s0x0:0xcd27014e7c94a0dd">Get directions here! </a></li>
					</ul></p>
					<hr />
					<p><strong>Musical Performance</strong></p>
					<p><img class="alignleft size-medium wp-image-11583" src="http://warinternational.org/wp-content/uploads/2014/08/Kelsey_banner_tall-300x168.jpg" alt="Kelsey Rottiers Band Banner" width="300" height="168" />“Kelsey Rottiersis a folk/pop indie singer-songwriter devoted to honest music and fighting slavery in all its forms. Based in Grand Rapids, Michigan, and playing live shows all over.”</p>
					<p>–<a href="http://www.kelseyrottiers.com/">Kelseyrottiers.com</a></p>
					<iframe width="853" height="480" src="//www.youtube.com/embed/ZsfRJDhhjbw" frameborder="0" allowfullscreen></iframe>
					<p>Time &amp; Place
					<ul>
						<li>Sunday 9/28, 2pm &amp; Sunday 10/5, 2pm</li>
						<li>Kelsey will be playing next to <em>The Scarlet Cord </em>exhibit outside at the Gerald R. Ford Museum venue</li>
						<li><a href="https://www.google.com/maps/place/Gerald+R.+Ford+Museum/@42.968432,-85.677358,17z/data=!3m1!4b1!4m2!3m1!1s0x0:0xcd27014e7c94a0dd">Get directions here! </a></li>
					</ul></p>
				</div>
				<div id="artprize-href-3" style="padding: 30px">
					<h1><strong>Human Trafficking</strong></h1>
					<img src="http://warinternational.org/wp-content/uploads/2014/08/hands.png" alt="human-trafficking" width="300" height="227" class="alignleft size-full wp-image-11584" />
					<p style="margin-right:143px;"><big>Human trafficking is a modern-day form of slavery. It is defined as the <em>“recruiting, harboring, transportation, providing, or obtaining of a person for compelled labor or commercial sex acts through force, fraud, or coercion”</em></p>
					<p>(U.S. Department of State)</p>
					<p style="clear:both;"><strong>Global Trafficking</strong><p>
					<ul>
						<li>Over 20 million victims (Polaris Project)</li>
						<li>Total market value of over 32 billion US dollars (UN)</li>
						<li>Over 1.2 million children trafficked each year (UNICEF)</li>
						<li>Affects at least 161 countries worldwide (Polaris Project)</li>
					</ul>
					<p><strong>Domestic Trafficking</strong></p>
					<ul>
						<li>12-years-old is the average age of entry into prostitution (Attorney General)</li>
						<li>Girls are sold for $400 an hour (Shared Hope, Int’l)</li>
						<li>Reported trafficking cases in all 50 States (US State Department)</li>
						<li>1 out of 5 pornographic images is of a child (US Department of Justice)</li>
						<li>Nearly 300,000 American children are at risk of commercial sexual exploitation (US Department of Justice)</li>
					</ul>
					<p><strong>Trafficking in Michigan</strong></p>
					<p><img src="http://warinternational.org/wp-content/uploads/2014/08/human-trafficking-300x200.jpg" alt="human-trafficking" width="300" height="200" class="alignright size-medium wp-image-11585" />
					The Center for Missing and Exploited children estimates that 2,400 children are currently for sale in West Michigan alone. As over 400,000 people pour into Grand Rapids for ArtPrize 2014, the risk of trafficking only increases. Traffickers are drawn to these massive events. In anticipation of increased demand, they will likely bring young women and children to Grand Rapids to be exploited. The SOAP Project, which has partnered with WAR, Int’l is a community effort to provide opportunities for safety and escape to those trafficked in Grand Rapids. Register <a href="http://www.soapupartweek.evenbrite.com/" target="_blank">here</a> to join the team!</p>
					<p><strong>Trafficking in the News</strong></p>
					<ol>
						<li><a href="http://www.wzzm13.com/news/article/256338/14/West-Michigan-Sex-Trafficking-Investigation">West Michigan Sex Trafficking Investigation</a></li>
						<li><a href="http://www.mlive.com/news/grand-rapids/index.ssf/2012/01/manasseh_project_aims_to_educa.html">13-Year-Old Girl Sold for Sex in West Michigan</a></li>
						<li><a href="http://fox17online.com/2013/10/16/human-trafficking-a-reality-in-michigan/#axzz3507uiPBy">Human Trafficking: A reality in West Michigan</a></li>
						<li><a href="http://www.mlive.com/news/grand-rapids/index.ssf/2014/04/grand_rapids_man_convicted_of_3.html">Grand Rapids Man Convicted of Child Sex Trafficking</a></li>
						<li><a href="http://fox17online.com/2014/06/23/human-trafficking-a-hidden-crisis-in-west-michigan/#axzz36nAzPprr">Hidden Crisis in West Michigan</a></li>
						<li><a href="http://fox17online.com/2014/06/23/human-trafficking-a-hidden-crisis-in-west-michigan/#axzz36nAzPprr">Human Trafficking is Prevalent in West Michigan</a></li>
					</ol>
					<p><strong>Learn More</strong></p>
					<div class="learn-more" style="border-top: 1px solid black; border-right: 1px solid black;">
						<p style="text-align: center; font-size:18px;">WEB</p>
						<p><a href="http://www.state.gov/j/tip/rls/tiprpt/">AnnualTrafficking in Persons Report</a></p>
						<p><a href="http://www.polarisproject.org/human-trafficking/overview">Human Trafficking Overview</a></p>
					</div>
					<div class="learn-more" style="border-top: 1px solid black;">
						<p style="text-align: center; font-size:18px;">MOVIES</p>
						<p>Nefarious: Merchant of Souls</p>
						<p>Not My Life
						<p>Very Young Girls
					</div>
					<div class="learn-more" style="border-top: 1px solid black; border-left: 1px solid black;">
						<p style="text-align: center; font-size:18px;">BOOKS</p>
						<p><em>Disposable People</em> by: Kevin Bales</p>
						<p><em>Not for Sale </em>by: David Batstone</p>
						<p><em>The Global Orphan Crisis</em> by: Diane Elliot</p>
						<p><em>Sold</em> by: Patricia McCormick</p>
					</div>
				</div>
				<div id="artprize-href-4" style="padding: 30px">
					<h1><strong>Take Action!</strong></h1>
					<h3><strong>Before ArtPrize:</strong> The S.O.A.P Project</h3>
					<img class="alignright wp-image-11588 size-medium" src="http://warinternational.org/wp-content/uploads/2014/08/Dark-Hotel-Hall-300x125.jpg" alt="Dark Hotel Hall" width="300" height="125" />
					<p>“S.O.A.P<strong>.</strong> stands for 'Save Our Adolescents from Prostitution' and is a hands-on outreach to fight sex trafficking at large events &amp; in communities. S.O.A.P. was founded by author, advocate, &amp; <a href="http://www.mlive.com/living/grand-rapids/index.ssf/2010/09/human_trafficking_exploitation.html" target="_blank">survivor- Theresa Flores</a>”</p>
					<p style="text-align: right;">-<a href="http://www.traffickfree.com/S-O-A-P-.html" target="_blank">Traffickfree.com</a></p></p>
					<p>Hotels are hotspots for trafficking—victims are easily hidden among those who come and go from the many rooms. With over 400,000 people pouring into Grand Rapids for ArtPrize 2014, hiding victims will only become easier. By labeling soap with the human trafficking hotline and donating it to local hotels, S.O.A.P. offers a life-line to trafficking victims. WAR, Int’l will be partnering with The S.O.A.P. Project this September; raising funds for the soap and gathering an army of volunteers.</p>
					<p><strong>Volunteer</strong></p>
					<p>The S.O.A.P project will need nearly 300 volunteers. You can help package the soap with life-saving labels and distribute it to 120 local hotels. Take part in a short training session and then equip hotel employees with information about trafficking in Grand Rapids. Join the team and use your Saturday to save a life!</p>
					<p><strong>Time &amp; Place</strong></p>
					<ul>
						<li>Saturday, September 6<sup>th</sup></li>
						<li>$10 to cover the cost of lunch</li>
						<li>Event 10-4pm</li>
						<li>Registration 9:45am</li>
						<li>Prayer Meeting 9am</li>
						<li>Calvary Christian Reformed Church
					3500 Bryon Center, Wyoming, MI</li>
					</ul>
					<p><strong>To Get Involved</strong></p>
					<p>Click <a href="http://www.eventbrite.com/e/soap-up-art-week-with-war-tickets-12152198553" target="_blank">here</a> to register!
					<br/>Call HQ: 616.855.0796
					<br/>Email: <a href="mailto:info@warinternational.org">info@warinternational.org</a>
					</p>
					<hr />
					<h3><strong>During ArtPrize: </strong>The Exhibit</h3>
					<img class="alignright wp-image-11586 size-medium" src="http://warinternational.org/wp-content/uploads/2014/08/artprise-scarlet-cord-pamela-alderman5-300x200.jpg" alt="artprise-scarlet-cord-pamela-alderman" width="300" height="200" />WAR, Int’l is partnering with artist Pamela Alderman for her ArtPrize 2014 exhibit. <em>The Scarlet Cord</em> will tell the stories of trafficking victims while volunteers equip visitors with information and empower them to take action.
					<p><strong>Volunteer</strong></p>
					<p>You will have the opportunity to educate visitors about the realities of child trafficking and inspire them to take action in their own communities. With the help of anti-trafficking literature you can be voice for wounded women and children!</p>
					<p><strong>Visit &amp; Vote</strong></p>
					<p>Simply visiting <em>The Scarlet Cord</em> at the Gerald R. Ford venue will draw attention to this current crisis. Capturing the attention of the public will increase the ability to end trafficking in Grand Rapids, in Michigan, and the United States. After your visit, don’t forget to vote for <em>The Scarlet Cord</em>! Register to vote <a href="http://www.artprize.org/visit/visitors/details/#visitor-register-to-vote" target="_blank"><strong>here!</strong></a></p>
					<p><strong>Go Viral</strong></p>
					<p>Share your experience at the Scarlet Cord with friends and family through social media and word of mouth. Be a voice for those who have been silenced! Share your pictures and passion for freedom on Facebook, Twitter, and your blog. #TheScarletCord #ArtPrize2014</p>
					<p><strong>Time &amp; Place</strong></p>
					<ul>
						<li>September 24- October 12, 2014</li>
						<li>Outside at the Gerald R. Ford Museum venue</li>
					</ul>
					<p><strong>To Get Involved</strong></p>
					<p>Contact: Michelle Griffeth
					<br/>Phone: 616.855.0796
					<br/>Email: <a href="mailto:volunteer@warinternational.org">volunteer@warinternational.org</a>
					</p>
					<hr />
					<h3><strong>After ArtPrize: </strong>Self-Defense and Beyond</h3>
					<p><strong>Self-Defense</strong><img class="alignright wp-image-11587 size-medium" src="http://warinternational.org/wp-content/uploads/2014/08/Lyn-VanderLaans-Group-300x225.jpg" alt="Lyn VanderLaan's Group" width="300" height="225" /></p>
					<p>Join WAR, Int’l and One Light Self Defense to learn more about human trafficking and how to protect yourself from the risks. This fun, informative, and FREE event will give women the practical skills they need to feel safe!</p>
					<p><strong>Time &amp; Place &amp; Registration</strong></p>
					<ul>
						<li>Saturday, October 25<sup>th</sup></li>
						<li>2pm—5:30pm</li>
						<li>The Performing Arts Center of The Salvation Army Kroc Center</li>
						<li>2500 S. Division Ave, Grand Rapids, MI 49507</li>
						<li>Women under 18 will need to bring an adult</li>
						<li>Wear comfortable clothes &amp; closed-toe shoes</li>
						<li>RSVP with Jessica Rowland at <a href="mailto:jr@warinternational.org">jr@warinternational.org</a> or call (616)855-0796</li>
					</ul>
					<p><strong>Volunteer</strong></p>
					<p>Become a WARrior at WAR, Int’l headquarters and create a circle of protection around at-risk women! Join in the effort to lift wounded women to places of dignity and hope. You can package and label jewelry, hand-crafted by at-risk women or organize donations and support the work of the WAR office. You make it possible to rescue, restore, and empower women and children worldwide!</p>
					<p><strong>Host</strong></p>
					<p>Jewelry parties are essential to our work at WAR, Int’l. When you <a href="http://warinternational.org/get-involved/host-a-party/" target="_blank">host a jewelry party</a>, your house becomes a haven of hospitality, safety, and restoration for women around the world. By inviting friends and family into your home, you raise awareness about the struggles that women face and ignite passion in others who might soon host their own jewelry parties. You also empower rescued women to earn an income with dignity, far from their lives in slavery.</p>
					<p>By hosting a community event, you can inform and protect on an even larger scale! WAR, Int’l speakers &amp; <a href="http://warinternational.org/programs/civilian-first-responder-cfr/" target="_blank">Civilian First Responder</a> (CFR) training sessions empower you to protect those in your circle of influence. Learn from survivors, police officers, homeland security, and more. Discover what trafficking looks like in your hometown and become a local abolitionist!</p>
					<p><strong>Shop</strong></p>
					<p>Visit one of our Boutiques or shop <a href="http://warchestboutique.com/" target="_blank">online</a> for jewelry, accessories, and clothing made by and sold in support of at-risk and rescued women! Shops are located in Wyoming &amp; Rockford, MI as well as Naperville, Ill.</p>
					<p><strong>Learn More</strong></p>
					<p>Become a WARrior and join the fight for human dignity! Click <a href="http://warinternational.org/get-involved/" target="_blank">here</a> to discover more ways to take action!</p>
					<p><strong>To Get Involved</strong></p>
					<p>Contact: WAR, Int’l
					<br/>Office: 616.855.0796
					<br/>Fax: 616.608.3405
					<br/>Email: <a href="mailto:info@warinternational.org">info@warinternational.org</a>
					</p>
				</div>
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			
			?>
			
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>


