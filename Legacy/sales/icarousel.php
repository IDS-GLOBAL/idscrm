<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="css/this.css"></link>

<script type="text/javascript" src="js/iCarousel.js"></script>
<script type="text/javascript" src="js/mootools.v1.1.js"></script>
		<script type="text/javascript">
	
window.addEvent("domready", function() {
	//new Accordion($$(".accordion_toggler"), $$(".accordion_content"));

	dp.SyntaxHighlighter.HighlightAll("usage");

	var ex6Carousel = new iCarousel("example_6_content", {
		idPrevious: "example_6_previous",
		idNext: "example_6_next",
		idToggle: "undefined",
		item: {
			klass: "example_6_item",
			size: 640
		},
		animation: {
			type: "scroll",
			duration: 1000,
			amount: 1
		}
	});

	$("thumb0").addEvent("click", function(event){new Event(event).stop();ex6Carousel.goTo(0)});
	$("thumb1").addEvent("click", function(event){new Event(event).stop();ex6Carousel.goTo(1)});
	$("thumb2").addEvent("click", function(event){new Event(event).stop();ex6Carousel.goTo(2)});
	$("thumb3").addEvent("click", function(event){new Event(event).stop();ex6Carousel.goTo(3)});
	$("thumb4").addEvent("click", function(event){new Event(event).stop();ex6Carousel.goTo(4)});
	$("thumb5").addEvent("click", function(event){new Event(event).stop();ex6Carousel.goTo(5)});
	$("thumb6").addEvent("click", function(event){new Event(event).stop();ex6Carousel.goTo(6)});
});
	
		</script>

</head>

<body>

<h3>VI. Horizontal images slider</h3>
<div id="example_6">
	<ul id="example_6_content">
		<li class="example_6_item"><a href="#"><img src="http://zendold.lojcomm.com.br/icarousel/images/ex6_1.jpg" alt="slide 1" /></a></li>
		<li class="example_6_item"><a href="#"><img src="http://zendold.lojcomm.com.br/icarousel/images/ex6_2.jpg" alt="slide 2" /></a></li>
		<li class="example_6_item"><a href="#"><img src="http://zendold.lojcomm.com.br/icarousel/images/ex6_3.jpg" alt="slide 3" /></a></li>
		<li class="example_6_item"><a href="#"><img src="http://zendold.lojcomm.com.br/icarousel/images/ex6_4.jpg" alt="slide 4" /></a></li>
		<li class="example_6_item"><a href="#"><img src="http://zendold.lojcomm.com.br/icarousel/images/ex6_5.jpg" alt="slide 5" /></a></li>
		<li class="example_6_item"><a href="#"><img src="http://zendold.lojcomm.com.br/icarousel/images/ex6_6.jpg" alt="slide 6" /></a></li>
		<li class="example_6_item"><a href="#"><img src="http://zendold.lojcomm.com.br/icarousel/images/ex6_7.jpg" alt="slide 7" /></a></li>
	</ul>
	<div id="example_6_frame">
		<ul>
			<li><a href="#"><img id="thumb0" src="http://zendold.lojcomm.com.br/icarousel/images/ex6_1t.jpg" alt="thumbnail 1" /></a></li>
			<li><a href="#"><img id="thumb1" src="http://zendold.lojcomm.com.br/icarousel/images/ex6_2t.jpg" alt="thumbnail 2" /></a></li>
			<li><a href="#"><img id="thumb2" src="http://zendold.lojcomm.com.br/icarousel/images/ex6_3t.jpg" alt="thumbnail 3" /></a></li>
			<li><a href="#"><img id="thumb3" src="http://zendold.lojcomm.com.br/icarousel/images/ex6_4t.jpg" alt="thumbnail 4" /></a></li>
			<li><a href="#"><img id="thumb4" src="http://zendold.lojcomm.com.br/icarousel/images/ex6_5t.jpg" alt="thumbnail 5" /></a></li>
			<li><a href="#"><img id="thumb5" src="http://zendold.lojcomm.com.br/icarousel/images/ex6_6t.jpg" alt="thumbnail 6" /></a></li>
			<li><a href="#"><img id="thumb6" src="http://zendold.lojcomm.com.br/icarousel/images/ex6_7t.jpg" alt="thumbnail 7" /></a></li>
		</ul>
	</div>
</div>

</body>
</html>