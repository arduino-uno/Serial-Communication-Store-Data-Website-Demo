<!DOCTYPE html>
<html lang="en">
<head>
<base target="_parent"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdbootstrap@4.8.10/css/mdb.min.css">
<link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/mdb-plugins-gathered.min.css">
<style type="text/css">
/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}
@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}

</style>
</head>
<body>
<div style="margin:30px">&nbsp;</div>
<section class="content container">
	<header>		
		<h1><i class="fas fa-cloud-sun"></i>&nbsp;Temperature/Humidity</h1>
	</header>
	
	<div class="row">
		<div class="card col-7">
			<div class="card-body">
				<h5 class="card-title">Temperature</h5>
				<p class="card-text text-center" style="font-weight: bolder;font-size: 5rem;">
					<span id="tempc">22</span>°C
				</p>
				<div class="d-flex">
					<hr class="my-auto flex-grow-1">
						<div class="px-4" style="font-weight: bolder;font-size: 1rem;"><?php echo date('l, j F Y');?></div>
					<hr class="my-auto flex-grow-1">
				</div>
				<p class="card-text text-center" style="font-weight: bolder;font-size: 5rem;">
					<span id="tempf">22</span>°F
				</p>
			</div>
		</div>
		<div class="col-5">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Humidity</h5>
					<p class="card-text text-center" style="font-weight: bolder;font-size: 5rem;">
					<i aria-hidden="true" class="fa fa-tint"></i>
					<span id="humi">59.6</span>%</p>
				</div>
			</div>
			<div class="row card-deck"  style="margin-top: 1rem;">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">from net</h5>
						<div class="row">
							<div class="col text-right">Temperature:</div>
							<div class="col"><i aria-hidden="true" class="fa fa-thermometer-half"></i>
								<span id="net-temperature">8.7</span> °C
							</div>
						</div>
						<div class="row">
							<div class="col text-right">Pressure:</div>
							<div class="col"><span id="net-pressure">1019.0</span> hPa
							</div>
						</div>
						<div class="row">
							<div class="col text-right">Humidity:</div>
							<div class="col"><i aria-hidden="true" class="fa fa-tint"></i>
								<span id="net-humidity">93.0</span>%
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 1rem;">
		<div class="card col-7">
			<div class="card-body">
				<div class="row">
					<div class="col custom-control custom-switch">
						<input class="custom-control-input" id="automation" type="checkbox">
						<label class="custom-control-label" for="automation">Enable automation</label>
					</div>
				</div>
			</div>
		</div>
		<div class="col-5">
		<div class="card">  
			<div class="card-body">
				<div class="row">
					<div class="col custom-control custom-switch">
						<input class="custom-control-input" id="manualOverride" type="checkbox">
						<label class="custom-control-label" for="manualOverride">Manual override</label>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
	setTimeout(function(){

		$.getJSON( "showdata.php", function( data ) {
			
			$.each( data.result, function() {
				var tempc = Math.round( this['tempc'] );
				var tempf = Math.round( this['tempf'] );
				var humi = Math.round( this['humi'] );
				
				$('#tempc').text( tempc );
				$('#tempf').text( tempf );
				$('#humi').text( humi );
			});
			
		});
		
	}, 1000);//wait 1 seconds
});	
</script>