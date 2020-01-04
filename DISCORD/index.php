<?php

$servername = "localhost";
$username = "host";
$password = "hostpass123";
$dbname = "music_player";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$thestatus=0;

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

include('arrays.php');

$result = mysqli_query($conn, "SELECT * FROM song_queue;");

$rmeme=array_rand($memes, 3);

$rmeme1=array_rand($memes1, 3);

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?php echo $memes1[$rmeme1[0]];?></title>
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Material Design Bootstrap -->
		<link rel="stylesheet" href="css/mdb.min.css">
		<!-- Latest Sortable -->
		<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

		<!-- Your custom styles (optional) -->
		<style>
			#search::placeholder {
				color: white;
			}
		</style>
	</head>

	<body>

		<!-- SCRIPTS -->
		<!-- JQuery -->
		<script src="js/jquery-3.4.1.min.js"></script>
		<!-- Bootstrap tooltips -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<!-- MDB core JavaScript -->
		<script type="text/javascript" src="js/mdb.min.js"></script>
		<!-- Latest Sortable -->
		<script src="http://SortableJS.github.io/Sortable/Sortable.js"></script>


		<!-- Animations -->
		<link rel="stylesheet" href="css/animate.css">
		<script src="js/wow.min.js"></script>
		<script> new WOW().init(); </script>

			<script>
			function loadXMLDoc() {
				var xmlhttp;
				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else { // code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("POST", "http://0.0.0.0:5000/postmethod", true);
				xmlhttp.send(JSON.stringify({"type":"new", "url":document.getElementById("search").value}));
			}
		</script>

		<link rel="icon" href='crylaugh.ico'>

		<!-- Title Bar -->

		<div class="container-fluid grey darken-3">
			<div class="row flex-center">
				<!-- Title -->
				<img class="animated tada" src="punk.png" alt="logo" width="100">
				<h1 style="color:#fd4964;" class="text my-3 mt-3 ml-3 pt-3 display-2 animated fadeIn"><strong>Fruit Punk<strong></h1>
			</div>

		<div class="row flex-center">
			<?php echo '<h3 style="color:#00d277;" class="text text-center animated fadeIn">"'.$memes[$rmeme[0]].'"</h3>';?>
		</div>

		<!-- URL Bar and POST -->
		<form action="index.php" method="POST" role="form" onsubmit="loadXMLDoc()">	  
			<div class="form-group container flex-center pt-3">
				<div class="md-form search col-lg-8">
					<input class="form-control text-center" type="text" id="search" name="search" placeholder="Enter YouTube URL to Add Video" aria-label="Search">
				</div>
			</div>
		</form>

		<!-- Queue section -->
		<section>
			<div class="container-fluid grey darken-3">
				<div class="container grey darken-3">
					<div class="container-fluid p-2">
						<div class="row pt-3">
							<div class="col-lg-12 col-12 mt-1">
								<section>
									<?php
										include('queue.php'); 
										include('checktable.php'); 
										include('login.php'); 
									?>
								</section>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
