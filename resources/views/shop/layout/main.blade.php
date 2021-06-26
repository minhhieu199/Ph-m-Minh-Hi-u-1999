
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="frontend/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="frontend/css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="frontend/js/jquerymain.js"></script>
<script src="frontend/js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="frontend/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="frontend/js/nav.js"></script>
<script type="text/javascript" src="jfrontend/s/move-top.js"></script>
<script type="text/javascript" src="frontend/js/easing.js"></script> 
<script type="text/javascript" src="frontend/js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
  		@include('shop.layout.header')


		@yield('content')
</div>
 @include('shop.layout.footer')
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="frontend/css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="frontend/js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>

