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

$result = mysqli_query($conn, "SELECT * FROM song_queue WHERE status=0;");

$rmeme=array_rand($memes, 3);

$rmeme1=array_rand($memes1, 3);

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Fruit Punk</title>
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

		<link rel="icon" href='crylaugh.ico'>

	<header>
		<!--Navbar-->
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
		  <div class="container">
			<img class="px-2"  src="fpgood.png" alt="logo" width="49">
			<a class="nava navbar-brand" href="#"><strong>fp</strong></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
			  aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent-7">
			  <ul class="navbar-nav px-3">
				<li class="nav-item active">
				  <a class="nav-link" href="index.php">Queue <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item px-3">
				  <a class="nav-link" href="playlists.php">Playlists</a>
				</li>
			  </ul>
			  <ul class="navbar-nav ml-auto">
				<li class="nav-item">
				  <a class="nav-link pl-5" href="#">© <?php echo $memes1[$rmeme1[0]];?> 2020</a>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>
	</header>

		<!-- Title Bar -->

		<div class="container-fluid grey darken-3 pt-5">
			<div class="row flex-center">
				<!-- Title -->
				<img class="animated tada" src="punk.png" alt="logo" width="100">
				<h1 style="color:#fd4964;" class="text my-3 mt-3 ml-3 pt-3 display-2 animated fadeIn"><strong>Fruit Punk<strong></h1>
			</div>

		<div class="row flex-center">
			<?php echo '<h3 style="color:#00d277;" class="text text-center animated fadeIn">"'.$memes[$rmeme[0]].'"</h3>';?>
		</div>

		<?php
			function http($url, $data = [], $method = 'get'){

				$ch = curl_init();
				$chOpts = [
					CURLOPT_SSL_VERIFYPEER => false,
					CURLOPT_HEADER => false,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_CONNECTTIMEOUT => 8,
					CURLOPT_TIMEOUT => 16,
					CURLOPT_HTTPHEADER, [
						'Content-Type: application/json'
					]
				];

				if ($method == 'post') {
					$chOpts[CURLOPT_POST] = true;
					$chOpts[CURLOPT_POSTFIELDS] = $data;
					$chOpts[CURLOPT_URL] = $url;
				}
				else {
					$url.='?'.is_array($data)?http_build_query($data):$data;
					$chOpts[CURLOPT_URL] = $url;
				}

				curl_setopt_array($ch, $chOpts);
				$response = curl_exec($ch);
				curl_close($ch);
				return $response;
			}
			
			if(isset($_POST['search']))
			{
				$url = 'http://localhost:5000/postmethod';
				http($url, json_encode(["type" => "new", "url" => $_POST['search']]), 'post');
			} 
		?>

		<!-- URL Bar and POST -->
		<form action="submitted.php" method="POST" role="form">	  
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
