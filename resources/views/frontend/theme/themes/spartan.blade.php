
<!doctype html>
<html>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<title>Richard Hendriks</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,400italic' rel='stylesheet' type='text/css'>
	<style>
		/********************************************
* 	reset from
* 	http://meyerweb.com/eric/tools/css/reset/
*******************************************/
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	vertical-align: baseline;
}
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
/* Custom reset */
.main-summary p,
#publications .item,
#skills .item,
#languages .item,
#references .item,
#interests .item{
	margin: 0;
}


/****************
*		SMARTPHONES
****************/
em {
	color: #757575;
}
p {
	margin: 1em 0;
}
blockquote {
	margin: 0;
	margin-bottom: 1em;
}
strong {
	font-weight: 700;
	font-size: 1.1em;
}
ul {
	margin-top: 1em;
}
div.item {
	margin: 1em 0 2em;
	padding-bottom: 2em;
}
div.item:last-of-type {
	margin: 0;
	border-bottom: none;
	padding-bottom: 0;
}
p {
	text-align: justify;
}


/* Headers */
h1, h2, h3, h4, h5, h6 {
	font-weight: 700;
}
h1 {
	font-size: 2.5rem;
}
h2,
h3 {
	font-size: 1rem;
}
a {
	color: #EB5F51;
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}

/* Layout */
body {
	background: #f2f2f2;
	line-height: 1.6;
	font-size: 13px;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}

#resume {
	padding: 1rem 0;
	margin: 1rem auto;
}

#header {
	padding: 0 1em;
	margin-bottom: 1em;
}

#resume > header div {
	display: table;
	padding-left: 0.5em;
}

#resume > header div.middle {
	padding-top: 1.5em;
}

header img {
	display: block;
	width: 10em;
	border-radius: 0.275em;
	float: right;
}

header .name {
	line-height: 1;
}

header .label {
	font-size: 1.5rem;
	font-weight: 400;
	color: #757575;
}

section:not(.section) {
	padding: .5em 1rem;
}

section#references {
	border-bottom:none;
}

section#basics {
	background: inherit;
	margin-bottom: 0;
}

section#skills {
	padding-bottom: 0;
}

section#education,
section#work,
.main-summary section {
	padding-bottom: 1em;
}

header::after {
	display: table;
	content: " ";
	clear: both;
}

h2.section-title {
	text-align: left;
	font-size: 1rem;
	font-weight: 400;
	color: #757575;
	padding: 1em 1rem 0;
	margin-bottom: 0.1275em;
}

.date {
	font-weight: 700;
	color: #757575;
}

.position, .area, .institution {
	font-weight: 700;
}

#interests .item, #languages .item {
	padding: 0 1em 1em 0;
	border-bottom: none;
}

.website::before {
	display: inline-block;
	font: normal normal normal 14px/1 FontAwesome;
	font-size: inherit;
	text-rendering: auto;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	text-decoration: none;
	min-width: 1.25em;
	margin-right: 0.25em;
	text-align: center;
	content: '\f14c';
}

#profiles, #skills, #interests, #languages {
	display: -webkit-box;
	display: -moz-box;
	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex;
	-webkit-flex-flow: row wrap;
	flex-flow: row wrap;
	-webkit-justify-content: flex-start;
	justify-content: flex-start;
  padding-bottom: 1em;
}

#profiles, #location {
	box-shadow: none;
	padding: 0;
}

#profiles .item {
	margin: 0;
	padding: 0;
	padding-right: 1em;
	border-bottom: none;
}

#interests ul {
	margin-top: 0.5em;
}

#publications .name {
	font-style: italic;
}

.courses li, .keywords li{
	display: inline-block;
	background: #f0f0f0;
	font-size: 0.9em;
	line-height: 1;
	color: #333;
	padding: 0.4em 0.8em;
	border-bottom: 1px solid #ddd;
	border-right: 1px solid #ddd;
	border-radius: 3px;
}

#publications .date {
	font-weight: normal;
	color: #000;
}

#skills .item {
	min-width: 15em;
	padding: 0 .5em .8em 0;
	border-bottom: none;
}


/* Skills chart */
#skills .level .bar {
	border: 1px solid #ddd;
	display: block;
	width: 10em;
	height: 5px;
	margin: 0em 0 1em 0;
	position: relative;
}

#skills .level .bar::after {
	position: absolute;
	content: " ";
	top: 0;
	left: 0;
	background: black;
	height: 5px;
}

#skills .level.beginner .bar::after {
	background: #EB5F51;
	width: 2.5em;
}

#skills .level.intermediate .bar::after {
	background: #ffdf1f;
	width: 5em;
}

#skills .level.advanced .bar::after {
	background: #59C596;
	width: 7.5em;
}

#skills .level.master .bar::after {
	background: #5CB85C;
	width: 10em;
}

#references .item {
	padding-left: 1em;
	border-left: 5px solid #EB5F51;
}

.fa.social {
	margin-right: 0.25em;
	font-size: 1.1em;
}

/* Social Media Brand Colors */
.google-plus {
	color: #dd4b39;
}

.tumblr {
	color:#32506d;
}

.foursquare {
	color:  #0072b1;
}

.facebook {
	color: #3b5998;
}

.linkedin {
	color: #007bb6;
}

.pinterest {
	color: #cb2027;
}

.dribbble {
	color: #ea4c89;
}

.instagram {
	color: #517fa4;
}

.twitter {
	color: #00aced;
}

.soundcloud {
	color: #ff3a00;
}

.wordpress {
	color: #21759b;
}

.youtube {
	color: #bb0000;
}

.github {
	color: #171515;
}

.stack-overflow {
	color: #828386;
	position: relative;
}

.flickr {
	color: #ff0084;
}

.stack-overflow::after {
	position: absolute;
	left: 0;
	content: '\f16c';
	color: #f68a1f;
	overflow: hidden;
	height: 40%;
}

/******************
*		HELPER CLASSES
******************/
.fa {
	min-width: 1.25em;
	margin-right: 0.25em;
	text-align: center;
}

.clear {
	display: table;
	clear: both;
}


/****************
*		TABLET
****************/
@media screen and (min-width: 602px) {

	#resume {
		width: 550px;
		margin: 0 auto;
	}
	section > header > h3 {
		float:left;
	}
	section > header > .date {
		float: right;
		line-height: 1.3;
	}

}


/****************
*		LAPTOP
****************/
@media screen and (min-width: 1025px) {

	#resume {
		width: 650px;
		padding: 3em;
		margin: 3em auto;
		background: #fff;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
	}

	.section {
		display: -webkit-box;
		display: -moz-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-flex-flow: row wrap;
		flex-flow: row wrap;
		-webkit-justify-content: space-between;
		justify-content: space-between;
		margin-bottom: 1em;
		margin-top: 1em;
		border-bottom: 1px solid #eee;
	}

	.section:last-of-type {
		border-bottom: none;
		margin-bottom: 0;
	}

	section > header {
		line-height: 1;
		padding-bottom: 1em;
	}

	h2.section-title {
		line-height: 1.1;
		padding-top: 0;
	}

	section:not(.section) {
		width: 34.5em;
		padding: 0 1em 1em 0;
		margin-top:0;
		border: none;
	}

	section p {
		margin: 0;
	}

	section#basics {
		width: auto;
		padding-top: 1em;
		padding-left: 1em;
		padding-bottom: 0;
		border-top: 1px solid #eee;
		border-bottom: 1px solid #eee;
	}

	#profiles .item{
		padding-bottom: 1em;
	}

	div {
		padding: 0;
	}

	#skills .item {
		padding-left:0;
		margin-top: 0;
	}

	div.item {
		margin-top: 0;
		border-bottom: 1px solid #eee;
	}

}

	</style>


	<body>
		<div id="resume">
				<header id="header">
						<div>
							<h1 class="name">Richard Hendriks</h1>
							<h2 class="label">Programmer</h2>
						</div>

				</header>

				<section id="basics">

						<div id="location">
							<span class="fa fa-map-marker"></span>
							<span class="address">
								2712 Broadway St,
							</span>
							<span class="postalCode">
								CA 94115,
							</span>
							<span class="city">
								San Francisco
							</span>
							<span class="countryCode">
								(US),
							</span>
							<span class="region">
								California
							</span>
						</div>

					<div id="contact">
						<div class="website">
							<a href="http://richardhendricks.com">http://richardhendricks.com</a>
						</div>
						<div class="email">
							<span class="fa fa-envelope"></span>
							<a href="mailto:richard@valley.com">richard@valley.com</a>
						</div>
						<div class="phone">
							<span class="fa fa-phone-square"></span>
							(912) 555-4321
						</div>
					</div>


					<div id="profiles">
						<div class="item">
							<span class="network fa fa-twitter twitter"></span>
							<span class="username">
									neutralthoughts
							</span>
						</div>
						<div class="item">
							<span class="network fa fa-soundcloud soundcloud"></span>
							<span class="username">
								<span class="url">
									<a href="https://soundcloud.com/dandymusicnl">dandymusicnl</a>
								</span>
							</span>
						</div>
					</div>
				</section>

				<section class="section main-summary">
					<h2 class='section-title'>About</h2>
					<section>
						<p>Richard hails from Tulsa. He has earned degrees from the University of Oklahoma and Stanford. (Go Sooners and Cardinals!) Before starting Pied Piper, he worked for Hooli as a part time software developer. While his work focuses on applied information theory, mostly optimizing lossless compression schema of both the length-limited and adaptive variants, his non-work interests range widely, everything from quantum computing to chaos theory. He could tell you about it, but THAT would NOT be a “length-limited” conversation!</p>
					</section>
				</section>

				</section>

				<section class="section">
					<h2 class='section-title'>Experience</h2>
					<section id="work">
						<header>
							<h3 class="name">
								Pied Piper
							</h3>
							<div class="date">
								<span class="startDate">
									December 2013
								</span>
								<span class="endDate">
									- December 2014
								</span>
							</div>
						</header>
						<div class="item">
						<div class="position">
							CEO/President
						</div>
						<div class="website">
							<a href="http://piedpiper.com">http://piedpiper.com</a>
						</div>
						<div class="summary">
							<p>Pied Piper is a multi-platform technology based on a proprietary universal compression algorithm that has consistently fielded high Weisman Scores™ that are not merely competitive, but approach the theoretical limit of lossless compression.</p>
						</div>
						<ul class="highlights">
							<li>Build an algorithm for artist to detect if their music was violating copy right infringement laws</li>
							<li>Successfully won Techcrunch Disrupt</li>
							<li>Optimized an algorithm that holds the current world record for Weisman Scores</li>
						</ul>
					</div>
					</section>
				</section>

				<section class="section">
					<h2 class='section-title'>Education</h2>
					<section id="education">
							<header>
									<h3 class="institution">
										University of Oklahoma
									</h3>
								<div class="date">
									<span class="startDate">
										2011
									</span>
									<span class="endDate">
										- 2014
									</span>
								</div>
							</header>
							<div class="item">
									<div class="studyType">
										Bachelor
									</div>
									<div class="area">
										Information Technology
									</div>
									<div>
										<span class="fa fa-graduation-cap"></span>
										<span class='gpa'> GPA: 4.0</span>
									</div>
									<ul class="courses">
										<li>DB1101 - Basic SQL</li>
										<li>CS2011 - Java Introduction</li>
									</ul>
							</div>
					</section>
				</section>


				<section class="section">
					<h2 class='section-title'>Volunteer</h2>
					<section id="volunteer">
								<header>
									<h3 class="company">
										CoderDojo
									</h3>
									<div class="date">
										<span class="startDate">
											January 2012
										</span>
										<span class="endDate">
											- January 2013
										</span>
								</header>
							<div class="item">
							<div class="position">
								Teacher
							</div>
							<div class="website">
								<a href="http://coderdojo.com/">http://coderdojo.com/</a>
							</div>
							<div class="summary">
								<p>Global movement of free coding clubs for young people.</p>
							</div>
							<ul class="highlights">
								<li>Awarded &#x27;Teacher of the Month&#x27;</li>
							</ul>
						</div>
					</section>
				</section>

				<section class="section">
					<h2 class='section-title'>Awards</h2>
					<section id="awards">
						<div class="date">
							1 November 2014
						</div>
						<div class="item">
							<div class="title">
								Digital Compression Pioneer Award
							</div>
							<div class="awarder">
								Techcrunch
							</div>
							<div class="summary">
								<p>There is no spoon.</p>
							</div>
						</div>
					</section>
				</section>

				<section class="section">
					<h2 class='section-title'>Publications</h2>
					<section id="publications">
							<div class="item">
								<span class="name">
									<span class="website">
										<a href="http://en.wikipedia.org/wiki/Silicon_Valley_(TV_series)">Video compression for 3d media</a>
									</span>
								</span>
									<span class="publisher">
										in Hooli,
									</span>
									<span class="date">
										1 October 2014
									</span>
								<div class="summary">
									<p>Innovative middle-out compression algorithm that changes the way we store data.</p>
								</div>
							</div>
					</section>
				</section>

				<section class="section">
					<h2 class='section-title'>Skills</h2>
					<section id="skills">
						<div class="item">
							<div class="name">
								Web Development
							</div>
							<div class="level master">
								<em>Master</em>
								<div class="bar"></div>
							</div>
							<ul class="keywords">
								<li>HTML</li>
								<li>CSS</li>
								<li>Javascript</li>
							</ul>
						</div>
						<div class="item">
							<div class="name">
								Compression
							</div>
							<div class="level master">
								<em>Master</em>
								<div class="bar"></div>
							</div>
							<ul class="keywords">
								<li>Mpeg</li>
								<li>MP4</li>
								<li>GIF</li>
							</ul>
						</div>
					</section>
				</section>

				<section class="section">
					<h2 class='section-title'>Languages</h2>
					<section id="languages">
						<div class="item">
							<div class="language">
								English
							</div>
							<div class="fluency">
								<em>Native speaker</em>
							</div>
						</div>
					</section>
				</section>

				<section class="section">
					<h2 class='section-title' class='section-title'>Interests</h2>
					<section id="interests">
						<div class="item">
							<div class="name">
								Wildlife
							</div>
							<ul class="keywords">
								<li>Ferrets</li>
								<li>Unicorns</li>
							</ul>
						</div>
					</section>
				</section>

				<section class="section">
					<h2 class='section-title'>References</h2>
					<section id="references">
						<div class="item">
							<blockquote class="reference">
								&#8220;&#32;It is my pleasure to recommend Richard, his performance working as a consultant for Main St. Company proved that he will be a valuable addition to any company.&#32;&#8221;
							</blockquote>
							<div class="name">
								Erlich Bachman
							</div>
						</div>
					</section>
				</section>
		</div>
	</body>

</html>
