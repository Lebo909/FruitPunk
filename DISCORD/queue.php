<?php
	
	$vcount = 0;
		
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title></title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="css/mdb.min.css">

	<!-- Your custom styles (optional) -->
	<style>

	</style>


	<!-- SCRIPTS -->
	<!-- JQuery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="js/mdb.min.js"></script>
	<!-- YouTube API -->
	<script src= "https://apis.google.com/js/client.js"></script>

	
	<!-- Animations -->
	<link rel="stylesheet" href="css/animate.css">
	<script src="js/wow.min.js"></script>
	<script> new WOW().init(); </script>

</head>
<body>
				<!-- Grid row -->
				<div class="row">

				<!-- Grid column -->
				<div class="col-md-12">

				<!-- Card -->
					<div class="card grey darken-2">

					<!-- Card content -->
					<div class="card-body px-3 grey darken-2">
						
							<!-- Title -->
							<h3 class="card-title text-center" style="color:#00d277;">Queue</h3>
							<hr class="grey darken-4 mb-5">
						
							<ol class="example">

								<?php

								while($row = mysqli_fetch_array($result))
								{
									
									if(strval(substr(gmdate("H:i:s",$row['duration']),-8,2))=='00')
									{
										$dur = substr(gmdate("H:i:s",$row['duration']),-5);
									}
									else
									{
										$dur = gmdate("H:i:s",$row['duration']);
									}
									$vcount++;
								
									if($vcount == 1)
									{
										echo '
											<div class="col-lg-12">
											 <div class="row">
												<div class="col-6">
													<img class="img-fluid float-right border border-dark rounded-lg mb-2" src="'.$row['thumbnail_url'].'" alt="logo">
												</div>																				
												<div class="col-4 my-auto">
													<a href="'.$row['url'].'"><h4 style="color:#ffffff;" class="text text-left">'.$row['title'].'</h4></a>
													<br>
													<h4 class="text text-white text-left">'.$dur.'</h4>
												</div>																										
											 </div>																										
											</div>';							
									}
									else
									{
										echo '
										<li id="item-'.$vcount.'" class="list-group-item listitem grey darken-2 border border-dark rounded my-2">
											<div class="col-lg-12">
												<div class="row grey darken-2">
													<div class="col-lg-2 my-auto">
														
														<img class="img-fluid w-75 border border-dark rounded-lg"  src="'.$row['thumbnail_url'].'" alt="vidart">
													</div>
													<div class="col-lg-8 my-auto mx-auto">
														<a href="'.$row['url'].'"><t style="color:#ffffff;" class="text">'.$row['title'].'</t></a>
													</div>													
													<div class="col-lg-2 my-auto text-right">
													<form action="deleted.php" id="delForm" method="post" role="form">
														<t style="color:#ffffff;" class="text">'.$dur.'</t>
														    <button type="submit" id="delete" name="delete" value='.$vcount.' class="fas fa-times-circle white-text ml-5" style="border:0px transparent; background-color: transparent;" ></button>
													</form>
													</div>										
												</div>
											</div>
										</li>';
									}
								}
									
								$vcount+1;
								
						?>
							</ol>			
							<br>
						
					
					</div>
					<!-- Card content -->

					</div>
					<!-- Card -->

				</div>
				<!-- Grid column -->

				</div>
				<!-- Grid row -->

	<script>
		$(document).ready(function(){
		    $("a.fas.fa-times-circle.white-text.ml-5").click(function(){
		        document.getElementById("delForm").submit();
		    }); 
		});
	</script>

	<script>
		$(document).ready(function() {
			$("ol.example").sortable({
				update:function(event, ui){
					alert("in the update");
					var mydata = $(this).sortable('serialize');

					// POST to server using $.post or $.ajax
					$.ajax({
						data: mydata,
						type: 'POST',
						url: 'http://localhost:5000/'
					});
				}
			});
		});
	</script>

</body>
</html>