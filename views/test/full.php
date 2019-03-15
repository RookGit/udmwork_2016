
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>One Single Section - fullPage.js</title>
	<meta name="author" content="Alvaro Trigo Lopez" />
	<meta name="description" content="fullPage One Single Section." />
	<meta name="keywords"  content="fullpage,One, Single, Section" />
	<meta name="Resource-type" content="Document" />


	<link rel="stylesheet" type="text/css" href="../jquery.fullPage.css" />
    <link rel="stylesheet" type="text/css" href="/template/css/jquery.fullPage.css">
	<link rel="stylesheet" type="text/css" href="/template/css/examples.css">
	<style>

	/* Style for our header texts
	* --------------------------------------- */
	h1{
		font-size: 5em;
		font-family: arial,helvetica;
		color: #fff;
		margin:0;
		padding:40px 0 0 0;
	}
	.intro p{
		color: #fff;
		padding:40px 0 0 0;
	}
	.wrap{
		margin-left: auto;
		margin-right: auto;
		width: 980px;
		position: relative;
		padding: 20px 0 20px 0;
	}
	.wrap h1{
		font-size: 2.3em;
		color: #333;
		padding: 30px 0 10px  0;
	}
	.wrap p{
		font-size: 16px;
		padding:  0 0 10px 0;
	}
	.box{
		display: block;
		background: #f2f2f2;
		border:1px solid #ccc;
		padding: 20px;
		margin:20px 0;
	}

	/* Centered texts in each section
	* --------------------------------------- */
	.section{
		text-align:center;
	}


	/* Bottom menu
	* --------------------------------------- */
	#infoMenu li a {
		color: #000;
	}
	</style>

	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="/template/js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="/template/js/jquery.fullPage.min.js"></script>
	<script type="text/javascript" src="/template/js/examples.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				anchors: ['firstPage'],
				sectionsColor: ['#4A6FB1'],
				autoScrolling: false,
				fitToSection:false,
				css3: true
			});
		});
	</script>

</head>
<body>
<a href="https://github.com/alvarotrigo/fullPage.js" id="githubLink"><img style="position: fixed;z-index:99; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png" alt="Fork me on GitHub"></a>

<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://alvarotrigo.com/fullPage/" data-text="Great plugin to create fullscreen scrolling websites: http://alvarotrigo.com/fullPage/">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<div id="fullpage">
	<div class="section " id="section0">
		<div class="slide">
			<h1>One Single Section</h1>
		</div>
		<div class="slide">
			<h1>And a normal website under it</h1>
		</div>

		<div class="slide">
			<h1>A great single slider!</h1>
		</div>
	</div>
</div>


<div class="wrap">
	<h1>This is like a normal website.</h1>

	Just place the rest of your page after the fullpage wrapper and use the option `fitToSection:false` and `autoScrolling:false`. And enjoy a great single slider.
	<script src="https://gist.github.com/alvarotrigo/368e6d6ad3c5c0e98d3c.js"></script>
	<script src="https://gist.github.com/alvarotrigo/c74366b59ecba2f9c3da.js"></script>

	<h1> Rest of your site </h1>

	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a sem ultrices neque vehicula fermentum a sit amet nulla. Donec sed tellus tempor ligula condimentum placerat. Vivamus placerat magna nisi, eu elementum risus imperdiet sit amet. Nunc varius dictum porttitor. Morbi rhoncus magna in quam fringilla fringilla in in odio. Quisque fringilla ante vitae tellus fringilla, condimentum tristique mi pharetra. Aenean ultricies odio at erat facilisis tincidunt. Fusce tempor auctor justo, nec facilisis quam vehicula vel. Aenean non mattis purus, eget lobortis odio. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam cursus elit nec aliquam consequat.
	</p>
	<p>
	Nullam sem orci, tincidunt non lorem quis, ultricies blandit nisl. Donec eget sollicitudin tortor. Integer ut orci sit amet ipsum porta feugiat sit amet ut nulla. Vestibulum auctor, tortor sed scelerisque consectetur, nisl tellus placerat tortor, non euismod nisi risus vitae ipsum. Morbi a velit purus. Nam euismod porta sapien, sed scelerisque nulla lacinia vitae. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam at eleifend ligula, in eleifend sapien.
	</p>
	<div class="box">
	In elementum nec quam et eleifend. Ut nec erat fermentum, mattis leo non, fringilla tellus. Integer at dui nibh. Etiam facilisis fermentum turpis. Nulla malesuada iaculis nisl, ac accumsan felis pulvinar ut. Proin porttitor nulla libero, vel tristique erat faucibus quis. Aliquam pharetra enim et sapien bibendum, interdum viverra lectus sagittis. Vivamus pharetra, risus quis malesuada interdum, mi mauris dignissim mi, ac hendrerit orci nulla vel felis. Vivamus dapibus, nisi vel viverra tincidunt, ligula nunc sagittis elit, eget lacinia tellus velit et leo. Curabitur a tortor pretium, aliquam justo gravida, commodo ipsum. In fermentum lorem eu tincidunt consequat. Donec nec blandit ipsum, id scelerisque velit. Aenean vel ultrices ligula, at imperdiet dolor. Sed euismod turpis et nibh adipiscing feugiat. Etiam diam leo, sollicitudin eu suscipit non, laoreet sit amet dui. In augue purus, semper in blandit ut, suscipit vehicula tortor.
	</div>
	<p>
	Praesent id varius neque. Nunc risus elit, tincidunt eu nulla vitae, adipiscing porta nibh. Pellentesque dignissim dolor ligula, eu vestibulum justo elementum ac. In a risus ullamcorper, iaculis lectus non, condimentum elit. Pellentesque ac felis nec mauris venenatis elementum. In porttitor mauris sit amet posuere scelerisque. Nunc interdum arcu sit amet libero fermentum, nec consequat risus dignissim.
	</p>
	<p>
	Curabitur dui elit, tristique eget venenatis et, scelerisque mattis arcu. Pellentesque lectus orci, tempus in enim et, condimentum rutrum magna. Mauris nec eros viverra, facilisis nibh ut, sodales urna. Pellentesque nec neque in ipsum imperdiet egestas vitae vel augue. Integer felis eros, dictum at eleifend aliquet, lacinia non neque. Curabitur eget condimentum urna, eget sodales lectus. Maecenas blandit ac neque id elementum. Phasellus ultricies vestibulum elit ut sagittis. Nam ut porta mi.
	</p>


	<h1> Rest of your site </h1>

	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a sem ultrices neque vehicula fermentum a sit amet nulla. Donec sed tellus tempor ligula condimentum placerat. Vivamus placerat magna nisi, eu elementum risus imperdiet sit amet. Nunc varius dictum porttitor. Morbi rhoncus magna in quam fringilla fringilla in in odio. Quisque fringilla ante vitae tellus fringilla, condimentum tristique mi pharetra. Aenean ultricies odio at erat facilisis tincidunt. Fusce tempor auctor justo, nec facilisis quam vehicula vel. Aenean non mattis purus, eget lobortis odio. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam cursus elit nec aliquam consequat.
	</p>
	<p>
	Nullam sem orci, tincidunt non lorem quis, ultricies blandit nisl. Donec eget sollicitudin tortor. Integer ut orci sit amet ipsum porta feugiat sit amet ut nulla. Vestibulum auctor, tortor sed scelerisque consectetur, nisl tellus placerat tortor, non euismod nisi risus vitae ipsum. Morbi a velit purus. Nam euismod porta sapien, sed scelerisque nulla lacinia vitae. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam at eleifend ligula, in eleifend sapien.
	</p>
	<p>
	In elementum nec quam et eleifend. Ut nec erat fermentum, mattis leo non, fringilla tellus. Integer at dui nibh. Etiam facilisis fermentum turpis. Nulla malesuada iaculis nisl, ac accumsan felis pulvinar ut. Proin porttitor nulla libero, vel tristique erat faucibus quis. Aliquam pharetra enim et sapien bibendum, interdum viverra lectus sagittis. Vivamus pharetra, risus quis malesuada interdum, mi mauris dignissim mi, ac hendrerit orci nulla vel felis. Vivamus dapibus, nisi vel viverra tincidunt, ligula nunc sagittis elit, eget lacinia tellus velit et leo. Curabitur a tortor pretium, aliquam justo gravida, commodo ipsum. In fermentum lorem eu tincidunt consequat. Donec nec blandit ipsum, id scelerisque velit. Aenean vel ultrices ligula, at imperdiet dolor. Sed euismod turpis et nibh adipiscing feugiat. Etiam diam leo, sollicitudin eu suscipit non, laoreet sit amet dui. In augue purus, semper in blandit ut, suscipit vehicula tortor.
	</p>
	<p>
	Praesent id varius neque. Nunc risus elit, tincidunt eu nulla vitae, adipiscing porta nibh. Pellentesque dignissim dolor ligula, eu vestibulum justo elementum ac. In a risus ullamcorper, iaculis lectus non, condimentum elit. Pellentesque ac felis nec mauris venenatis elementum. In porttitor mauris sit amet posuere scelerisque. Nunc interdum arcu sit amet libero fermentum, nec consequat risus dignissim.
	</p>
	<div class="box">
	Curabitur dui elit, tristique eget venenatis et, scelerisque mattis arcu. Pellentesque lectus orci, tempus in enim et, condimentum rutrum magna. Mauris nec eros viverra, facilisis nibh ut, sodales urna. Pellentesque nec neque in ipsum imperdiet egestas vitae vel augue. Integer felis eros, dictum at eleifend aliquet, lacinia non neque. Curabitur eget condimentum urna, eget sodales lectus. Maecenas blandit ac neque id elementum. Phasellus ultricies vestibulum elit ut sagittis. Nam ut porta mi.
	</div>


	<h1> Rest of your site </h1>

	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a sem ultrices neque vehicula fermentum a sit amet nulla. Donec sed tellus tempor ligula condimentum placerat. Vivamus placerat magna nisi, eu elementum risus imperdiet sit amet. Nunc varius dictum porttitor. Morbi rhoncus magna in quam fringilla fringilla in in odio. Quisque fringilla ante vitae tellus fringilla, condimentum tristique mi pharetra. Aenean ultricies odio at erat facilisis tincidunt. Fusce tempor auctor justo, nec facilisis quam vehicula vel. Aenean non mattis purus, eget lobortis odio. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam cursus elit nec aliquam consequat.
	</p>
	<p>
	Nullam sem orci, tincidunt non lorem quis, ultricies blandit nisl. Donec eget sollicitudin tortor. Integer ut orci sit amet ipsum porta feugiat sit amet ut nulla. Vestibulum auctor, tortor sed scelerisque consectetur, nisl tellus placerat tortor, non euismod nisi risus vitae ipsum. Morbi a velit purus. Nam euismod porta sapien, sed scelerisque nulla lacinia vitae. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam at eleifend ligula, in eleifend sapien.
	</p>
	<p>
	In elementum nec quam et eleifend. Ut nec erat fermentum, mattis leo non, fringilla tellus. Integer at dui nibh. Etiam facilisis fermentum turpis. Nulla malesuada iaculis nisl, ac accumsan felis pulvinar ut. Proin porttitor nulla libero, vel tristique erat faucibus quis. Aliquam pharetra enim et sapien bibendum, interdum viverra lectus sagittis. Vivamus pharetra, risus quis malesuada interdum, mi mauris dignissim mi, ac hendrerit orci nulla vel felis. Vivamus dapibus, nisi vel viverra tincidunt, ligula nunc sagittis elit, eget lacinia tellus velit et leo. Curabitur a tortor pretium, aliquam justo gravida, commodo ipsum. In fermentum lorem eu tincidunt consequat. Donec nec blandit ipsum, id scelerisque velit. Aenean vel ultrices ligula, at imperdiet dolor. Sed euismod turpis et nibh adipiscing feugiat. Etiam diam leo, sollicitudin eu suscipit non, laoreet sit amet dui. In augue purus, semper in blandit ut, suscipit vehicula tortor.
	</p>
	<p>
	Praesent id varius neque. Nunc risus elit, tincidunt eu nulla vitae, adipiscing porta nibh. Pellentesque dignissim dolor ligula, eu vestibulum justo elementum ac. In a risus ullamcorper, iaculis lectus non, condimentum elit. Pellentesque ac felis nec mauris venenatis elementum. In porttitor mauris sit amet posuere scelerisque. Nunc interdum arcu sit amet libero fermentum, nec consequat risus dignissim.
	</p>
	<p>
	Curabitur dui elit, tristique eget venenatis et, scelerisque mattis arcu. Pellentesque lectus orci, tempus in enim et, condimentum rutrum magna. Mauris nec eros viverra, facilisis nibh ut, sodales urna. Pellentesque nec neque in ipsum imperdiet egestas vitae vel augue. Integer felis eros, dictum at eleifend aliquet, lacinia non neque. Curabitur eget condimentum urna, eget sodales lectus. Maecenas blandit ac neque id elementum. Phasellus ultricies vestibulum elit ut sagittis. Nam ut porta mi.
	</p>


</div>

<div id="infoMenu">
	

<ul>
    <li><a href="http://alvarotrigo.com/fullPage/utils/wordpress.html">Wordpress theme</a></li>
	<li><a href="https://github.com/alvarotrigo/fullPage.js/archive/master.zip">Download</a></li>
	<li>
		<a href="#" id="showExamples">Examples</a>
		<div id="examplesList">
			<div class="column">
				<h3>Navigation</h3>
				<ul>
					<li><a href="http://alvarotrigo.com/fullPage/examples/scrollBar.html">Scroll Bar Enabled</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/normalScroll.html">Normal scrolling</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/continuous.html">Continuous vertical</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/noAnchor.html">Without anchor links (same URL)</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/navigationV.html">Vertical navigation dots</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/navigationH.html">Horizontal navigation dots</a></li>
				</ul>
			</div>
			<div class="column">
				<h3>Design</h3>
				<ul>
					<li><a href="http://alvarotrigo.com/fullPage/examples/responsive.html">Responsive</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/backgrounds.html">Full backgrounds</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/fixedBackgrounds.html">Fixed backgrounds</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/videoBackground.html">Full background videos</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/autoHeight.html">Auto-height sections</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/gradientBackgrounds.html">Gradient backgrounds</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/scrolling.html">Scrolling inside sections and slides</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/fixedHeaders.html">Adding fixed header and footer</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/oneSection.html">One single section</a></li>
				</ul>
			</div>
			 <div class="column">
                <h3>Extensions</h3>
                <ul>
                    <li><a href="http://alvarotrigo.com/fullPage/extensions/parallax.html">Parallax</a></li>
                    <li><a href="http://alvarotrigo.com/fullPage/extensions/continuous-horizontal.html">Continuous horizontal</a></li>
                    <li><a href="http://alvarotrigo.com/fullPage/extensions/interlocked-slides.html">Interlocked Slides</a></li>
                    <li><a href="http://alvarotrigo.com/fullPage/extensions/reset-sliders.html">Reset Sliders</a></li>
                    <li><a href="http://alvarotrigo.com/fullPage/extensions/responsive-slides.html">Responsive Slides</a></li>
                    <li><a href="http://alvarotrigo.com/fullPage/extensions/scroll-horizontally.html">Horizontal mouse wheel</a></li>
                    <li><a href="http://alvarotrigo.com/fullPage/extensions/fading-effect.html">Fading Effect</a></li>
                    <li><a href="http://alvarotrigo.com/fullPage/extensions/offset-sections.html">Offset Sections</a></li>
                    <li><a href="http://alvarotrigo.com/fullPage/extensions/drag-and-move.html">Drag And Move</a></li>
                    <li><a href="http://alvarotrigo.com/fullPage/extensions/scrolloverflow-reset.html">ScrollOverflow Reset</a></li>
                </ul>
            </div>
			<div class="column">
				<h3>Other</h3>
				<ul>
					<li><a href="http://alvarotrigo.com/fullPage/examples/apple.html">Animations on scrolling</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/callbacks.html">Callbacks</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/autoplayVideoAndAudio.html">Autoplay media</a></li>
					<li><a href="http://alvarotrigo.com/fullPage/examples/methods.html">Functions and methods</a></li>
                    <li><a href="http://alvarotrigo.com/fullPage/extensions/#navigation">Extra navigations</a></li>
				</ul>
			</div>
		</div>

	</li>
	<li><a href="https://github.com/alvarotrigo/fullPage.js#fullpagejs">Documentation</a></li>
	<li><a href="http://alvarotrigo.com/#contact-page">Contact</a></li>
</ul>

</div>

</body>
</html>