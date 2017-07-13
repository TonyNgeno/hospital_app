<?php require_once 'includes/core.inc.php';?>

<?php require_once 'includes/header.inc.php';?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		<li data-target="#carousel-example-generic" data-slide-to="3"></li>
		<li data-target="#carousel-example-generic" data-slide-to="4"></li>
	</ol>

	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="img/slider/slider-1.jpg" alt="...">
			<div class="carousel-caption">
				here is me
			</div>
		</div>

		<div class="item">
			<img src="img/slider/slider-2.jpg" alt="...">
			<div class="carousel-caption">
				There is You
			</div>
		</div>

		<div class="item">
			<img src="img/slider/slider-3.jpg" alt="...">
			<div class="carousel-caption">
				There is You
			</div>
		</div>

		<div class="item">
			<img src="img/slider/slider-4.jpg" alt="...">
			<div class="carousel-caption">
				There is You
			</div>
		</div>

		<div class="item">
			<img src="img/slider/slider-5.jpg" alt="...">
			<div class="carousel-caption">
				There is You
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<div class="container-fluid">
  <div class = "row padding-80 text-center">
	<div class = "col-lg-12">
		<h2>NYAMBENE CLINICAL SERVICES AND NURSING HOME <br /><small><i>a health facility based in the heart of Nyambene</i></small></h2>
	</div>
  </div>
</div>

<div class = "container-fluid">
	<div class = "row padding-80 intro">
		<div class = "container text-center">
			<div class = "col-lg-12">
				<p style = "font-size:1.3em">
					Nyambene Clinical Services & Nursing Home (NCS&NH), is conveniently located at Maili-Tatu, along the Maua-Meru road and is well known for its best health practices. We have committed highly skilled doctors and nurses that are available 24 hours a day waiting to offer excellent health care services to all individuals brought to their attention. Established about two decades ago, the hospital has capacity to provide you and your family with convenient, high quality Integrated services with special attention to access, affordability, clinical and service excellence and patient safety to the satisfaction of all Stakeholders.
				</p><br />
				
				<a class = "btn btn-lg btn-primary" href = "aboutUs.php">READ MORE ABOUT US</a>
			</div>
		</div>
	</div>
</div>

<div class = "container">
	<div class="row padding-80">
		<div class = "col-lg-12 text-center">
			<h2>SERVICES OFFERED</h2><br />
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class = "thumbnail">
				<p class = "text-center" style = "font-size:10em"><i class = "fa fa-user-md"></i></p>
				<div class = "caption text-center">
					<h5>Medical consultation</h5>
					<p>to book an appointment</p>
					
				</div>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class = "thumbnail">
				<p class = "text-center" style = "font-size:10em"><i class = "fa fa-hotel"></i></p>
				<div class = "caption text-center">
					<h5>In patient services</h5>
					<p>to book an appointment</p>
					
				</div>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class = "thumbnail">
				<p class = "text-center" style = "font-size:10em"><i class = "fa fa-heartbeat"></i></p>
				<div class = "caption text-center">
					<h5>Emergency medical services</h5>
					<p>to book an appointment</p>
					
				</div>
			</div>
		</div>
		
		
		
	</div>
</div>

<div class = "container">
	<div class="row padding-80" style = "margin-top:-80px">
		<div class = "col-lg-12 text-center">
			<h2>FEATURES</h2><br />
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class = "thumbnail">
				<p class = "text-center" style = "font-size:10em"><i class = "fa fa-calendar"></i></p>
				<div class = "caption text-center">
					<h5>Book Appointments anywhere anytime</h5>
					<p>to book an appointment</p>
					<a href="appointment.html" class = "btn btn-info">Click here</a>
				</div>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class = "thumbnail">
				<p class = "text-center" style = "font-size:10em"><i class = "fa fa-wechat"></i></p>
				<div class = "caption text-center">
					<h5>Doctor - patient real time chat</h5>
					<p>to book an appointment</p>
					<a href="appointment.html" class = "btn btn-info">Click here</a>
				</div>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class = "thumbnail">
				<p class = "text-center" style = "font-size:10em"><i class = "fa fa-list"></i></p>
				<div class = "caption text-center">
					<h5>View prescription history</h5>
					<p>to book an appointment</p>
					<a href="appointment.html" class = "btn btn-info">Click here</a>
				</div>
			</div>
		</div>
		
	</div>
</div>

<div class = "container-fluid">
	<div class = "row">
		<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:300px;width:100%;'><div id='gmap_canvas' style='height:300px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="https:/disclaimergenerator.net">disclaimer example</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:11,center:new google.maps.LatLng(0.25,37.89999999999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(0.25,37.89999999999998)});infowindow = new google.maps.InfoWindow({content:'<strong>Nyambene Clinical Services and Nursing Home</strong><br>Nyambene, maua<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
	</div>
</div>

<?php require_once 'includes/footer.inc.php';?>