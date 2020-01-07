<?php

	$con=mysqli_connect("localhost","root","mysql","music_player");
		// Check connection
		if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

	$result = mysqli_query($con,"SELECT * FROM song_queue WHERE status=0");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Dumb Videos</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- DataTables.net  -->
  <link rel="stylesheet" type="text/css" href="css/addons/datatables.min.css">
  <link rel="stylesheet" href="css/addons/datatables-select.min.css">

  <!-- Your custom styles (optional) -->
  <style>
  
	.form-control::-webkit-input-placeholder {
	  color: white;
	  font-size: 20px;
	}
	.form-control::{text-white;}
	
  </style>
</head>

<body>

  <!-- Title Bar -->
  <section>
    <div class="container-fluid blue-gradient lighten-3">

      <!-- Title -->
      <h1 class="text-center white-text pb-3 pt-3 display-1 animated fadeInDown"><strong>MEME QUEUE</strong></h1>
	  <h5 class="text-center white-text animated fadeIn slower m3">The Discord Audio Companion</h5>
	  <div class="row flex-center col-xl-12"></div>
	  
      <!-- URL Bar and POST -->
	 <form action="index.php" method="POST" role="form">	  
      <div class="form-group row flex-center">
		
		<div class="md-form search my-5 mb-3 mt-0 col-lg-6 p-3">
		  <input class="form-control text-center" type="text" id="search" name="search" placeholder="Enter YouTube URL to Add Video" aria-label="Search">
		</div>
	  </div>
	 </form>

			<div class="row flex-center text-white">Last Added: <?php print_r($_POST['search']);?></div>

    </div>
  </section>
  
				<?php
				//SearchbarText appended to DB table, if valid URL
				
						if(isset($_POST['search']))
						{
							$url = $_POST['search'];
							
							if (strpos($url, 'youtube.com') !== false) 
							{
								$vidid = preg_replace("#.*youtube\.com/watch\?v=#", "", $url);
								echo "the video Id : " . $vidid . "<br>";
								echo "regular url : " . $url . "<br>";
								echo 'valid youtube url';
								mysqli_query($con,"INSERT INTO song_queue (url, status) VALUES ('$url', 0);" );
							}
							else if (strpos($url, 'youtu.be') !== false) 
							{
								$vidid = preg_replace("#.*youtu\.be/#", "", $url);
								echo "the video Id : " . $vidid . "<br>";
								echo "shorter url : " . $url . "<br>";
								echo 'valid youtube url';
								mysqli_query($con,"INSERT INTO song_queue (url, status) VALUES ('$url', 0);" );
							}							
							else
							{
								echo "nice url, dummy!";
							}
						} 
				?>
				
  <!-- Queue section -->
  <section>

    <div class="container-fluid grey lighten-3">
	
      <div class="container">

        <div class="row mt-5 pt-3">

          <div class="col-lg-12 col-12 mt-1 mx-lg-4">

            <section class="pb-3 text-center text-lg-left">

              <!-- Grid row -->
              <div class="row mb-5 pb-3">

                <!-- Grid column -->
                <div class="col-md-12">

				<!-- Card -->
                  <div class="card">

                    <!-- Card content -->
                    <div class="card-body mx-4">
                      
					  <!-- Title -->
                      <h3 class="card-title mt-4">Queue</h3>
                      <hr>					  
				<!--
						<div class="container-fluid">
						
							<div class="row">
							
								<div class="row col-xl-5 mb-5 pb-3">
									<div class="embed-responsive embed-responsive-16by9">
										<iframe src="//www.youtube.com/embed/BEtIoGQxqQs?rel=0&modestbranding=1&autohide=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
									</div>
								</div>
								
								<div class="col-xl-6">
									<div class="row"><h2 class="text-center">TITLE ONE<h2></div>
									<div class="row"><div><h4 class="text-center">DETAIL ONE<h4></div></div>
								</div>
							</div>
						</div>
				-->
			<?php
						//foreach ($result as $row)
						while($row = mysqli_fetch_array($result))
						{
							if (strpos($row['url'], 'youtube.com') !== false)
							{
								$vidid = preg_replace("#.*youtube\.com/watch\?v=#", "", $row['url']);
							}
							else if (strpos($row['url'], 'youtu.be') !== false)
							{
								$vidid = preg_replace("#.*youtu\.be/#", "", $row['url']);
							}							
							else
							{
								echo "url in table is wrong format";
							}
						echo 	'URL='.$row['url'].'<br>';
						echo 	'ID='.$vidid;
						echo	'<div class="row col-xl-5">';
						echo	'<div class="embed-responsive embed-responsive-16by9">';
						echo	'<iframe src="https://www.youtube.com/embed/'.$vidid.'?rel=0&modestbranding=1&autohide=1&showinfo=0" frameborder="0" allowfullscreen></iframe>';
						echo	'</div>';
						echo	'</div>';
						echo	'<hr>';
						}
			?>

                      <hr>
							<table id="tbl" class="table table-sm table-striped" cellspacing="0" width="100%">
							<thead>
								<tr>
								<th class="th-sm">ID</th>
								<th class="th-sm">URL</th>					
								<th class="th-sm">STATUS</th>					
								</tr>
							</thead>
							<tbody>
				</html>
						<?php
						
							//while($row = mysqli_fetch_array($result))
							foreach ($result as $row)
							{
							echo "<tr>";
							echo "<td>" . $row['id'] . "</td>";
							echo "<td>" . $row['url'] . "</td>";
							echo "<td>" . $row['status'] . "</td>";
							echo "</tr>";
							}
							echo "</table>";
							
						?>
				<html>
							</tbody>
							
						</table>
                      <hr>

				
					<hr>
                    </div>
                    <!-- Card content -->

                  </div>
                  <!-- Card -->

                </div>
                <!-- Grid column -->

              </div>
              <!-- Grid row -->

            </section>

          </div>

        </div>

      </div>

    </div>

  </section>
  <!-- Queue section -->

  <!-- Footer -->
  <footer class="page-footer stylish-color-dark text-center text-md-left pt-5">

    <!-- Footer Links -->
    <div class="container flex-center">

      <div class="row py-3 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-12 col-lg-12">

          <!-- Copyright -->
          <p class="text-center text-md-left grey-text">
            okay, <a href="#" target="_blank"> Fucker?
            </a>
          </p>
          <!-- Copyright -->

        </div>
        <!-- Grid column -->



    </div>

  </footer>
  <!-- Footer -->
  

	  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- DataTables  -->
  <script type="text/javascript" src="js/addons/datatables.min.js"></script> 
  
  <!-- Animations -->
  <link rel="stylesheet" href="css/animate.css">
  <script src="js/wow.min.js"></script>
  <script> new WOW().init(); </script>
  
  <script>
  	//Datatable Column Search
	$(document).ready(function() {
		
	// DataTable
	var table = $('#tbl').DataTable();
				
	$('.dataTables_length').addClass('bs-select');
	
	new $.fn.dataTable.ColReorder(table);
	});
  </script>
  
  
 </body>
 
</html>
