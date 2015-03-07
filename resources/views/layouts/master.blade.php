<!DOCTYPE html>
<html>
<head>
	<title>Gambino Jeans</title>
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/gambino.css"/>
	<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
	<link rel="stylesheet" href="/css/bootstrap-image-gallery.min.css"/>


</head>
<body>

<div class="logo-left hidden-xs">
	<img src="/images/logo-gambino.png" height="230" width="144" />
</div>


<div class="logo-right hidden-xs">
	<img src="/images/logo-gambino.png" height="230" width="144" />
</div>


<div class="container">
	<div class="jumbotron">
		{{--<h1>Example page header <small>Subtext for header</small></h1>--}}
		<img id="logoheader" src="/images/gambino-text-silver2.png" />


	</div>
	<ul class="menu nav nav-pills nav-justified">
		<li><a href="/">HOME</a></li>
		{{--<li class="dropdown">--}}
			{{--<a class="dropdown-toggle" data-toggle="dropdown" href="/products">Product <span class="caret"></span></a>--}}
			{{--<ul class="dropdown-menu">--}}
				{{--<li><a href="/products/jenis/t-shirt">T-SHIRT</a></li>--}}
				{{--<li><a href="/products/jenis/jeans">JEANS</a></li>--}}
				{{--<li><a href="/products/jenis/jacket">JACKET</a></li>--}}
			{{--</ul>--}}
		{{--</li>--}}
		<li><a href="/gallery">GALLERY</a></li>
		<li><a href="/about">Mr G</a></li>
		<li><a href="/contact">CONTACT</a></li>
	</ul>

		@yield('content')



	<div class="menu-footer row">
		<ul class="lifooter">
			<li>
				<a href="/contact"><img src="/images/simbol_address.png" width="30px" height="30px"/></a>
			</li>
			<li>
				<a href="mailto:info@gambinojeans.com"><img src="/images/simbol_email.png" width="30px" height="30px"/> </a>
			</li>
			<li>
				<a href="/contact"><img src="/images/simbol_phone.png" width="30px" height="30px"/></a>
			</li>
			<li>
				<a href="https://twitter.com/gambinojeans"><img src="/images/simbol_twitter.png" width="30px" height="30px"/></a>
			</li>
		</ul>
	</div>


</div>

<div id="blueimp-gallery" class="blueimp-gallery">
	<!-- The container for the modal slides -->
	<div class="slides"></div>
	<!-- Controls for the borderless lightbox -->
	<h3 class="title"></h3>
	<a class="prev">‹</a>
	<a class="next">›</a>
	<a class="close">×</a>
	<a class="play-pause"></a>
	<ol class="indicator"></ol>
	<!-- The modal dialog, which will be used to wrap the lightbox content -->
	<div class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" aria-hidden="true">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body next"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left prev">
						<i class="glyphicon glyphicon-chevron-left"></i>
						Previous
					</button>
					<button type="button" class="btn btn-primary next">
						Next
						<i class="glyphicon glyphicon-chevron-right"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/bootstrap/js/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="/bootstrap/js/bootstrap-image-gallery.min.js"></script>
</body>
</html>

