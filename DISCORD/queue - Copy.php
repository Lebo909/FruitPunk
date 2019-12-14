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

  <!-- Your custom styles (optional) -->
  <style>
  
	.form-control::-webkit-input-placeholder {
	  color: white;
	  font-size: 20px;
	}
	.form-control::{text-white;}
	
	.table a
{
    display:block;
    text-decoration:none;
}
	
  </style>
</head>

              <!-- Grid row -->
              <div class="row">

                <!-- Grid column -->
                <div class="col-md-12">

				<!-- Card -->
                  <div class="card">

                    <!-- Card content -->
                    <div class="card-body mx-4">
                      
					  <!-- Title -->
                      <h3 class="card-title mt-4">Queue</h3>
                      <hr class="grey">
					
					<div class="row col-md-12">
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
						echo	'<div class="row col-md-4 my-1 pb-1">';
						echo	'<div class="embed-responsive embed-responsive-16by9">';
						echo	'<iframe src="https://www.youtube.com/embed/'.$vidid.'?rel=0&modestbranding=1&autohide=1&showinfo=0" frameborder="0" allowfullscreen></iframe>';
						echo	'</div>';
						echo	'</div>';
						echo	'<hr>';
						}
			?>
					</div>
                      <hr>

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


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  
  <!-- Animations -->
  <link rel="stylesheet" href="css/animate.css">
  <script src="js/wow.min.js"></script>
  <script> new WOW().init(); </script>
  
  <script>

  </script>
			  
			  
			  
</html>