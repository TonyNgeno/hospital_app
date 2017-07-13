<?php require_once 'includes/core.inc.php';?>

<?php require_once 'includes/header.inc.php';?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="mine">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class = "col-lg-12">
							<h2>CONTACT INFORMATION</h2>
							<p>&nbsp;</p>
							<h4>NYAMBENE CLINICAL MEDICAL SERVICES</h4><br />
							<h4><i class = "fa fa-building"></i> HEAD OFFICE</h4><br />
							<h4><i class = "fa fa-envelope"></i> P.O BOX 2334, MAUA</h4><br />
							<h4><i class = "fa fa-phone"></i> TEL : 0723333444</h4><br />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						
						<div class = "col-lg-12">
							<h2>SEND US MAIL</h2>
						</div>

						<form action = "" method = "POST" enctype = "multipart/form-data">
							<p><?php echo $msg;?> &nbsp;</p>
							<div class = "col-lg-6">
								<div class = "form-group">
									<input type="text" class = "form-control" name="name" placeholder="name" />
								</div>
							</div>
							
							<div class = "col-lg-6">
								<div class = "form-group">
									<input type="email" class = "form-control" name="email" placeholder="email" required />
								</div>
							</div>
							
							<div class = "col-lg-12">
								
								
								<div class = "form-group">
									<textarea rows = "4" style = "resize:none" class = "form-control" name="message" placeholder="message" required></textarea>
								</div>
								
								<div class = "form-group">
									<button type = "submit" class = "btn btn-info btn-block">SEND <i class = "fa fa-send"></i></button>
								</div>
							</div>
							
						</form>
					</div>
					
					<div class = "col-lg-12">
						<div class = "col-lg-12">
							<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:300px;width:100%;'><div id='gmap_canvas' style='height:300px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="https:/disclaimergenerator.net">disclaimer example</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:11,center:new google.maps.LatLng(0.25,37.89999999999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(0.25,37.89999999999998)});infowindow = new google.maps.InfoWindow({content:'<strong>Nyambene Clinical Services and Nursing Home</strong><br>Nyambene, maua<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'includes/footer.inc.php';?>
