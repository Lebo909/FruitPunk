<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "sandbox";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	$result = mysqli_query($conn,"SELECT * FROM song_queue ORDER BY id DESC;");
	
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

			<html>
                      <hr>
							<table id="tbl" class="table table-sm white-text" cellspacing="0" width="100%">
							<thead>
								<tr>
								<th class="th-sm">ID</th>
								<th class="th-sm">URL</th>
								<th class="th-sm">THUMBNAIL</th>
								<th class="th-sm">TITLE</th>					
								<th class="th-sm">DURATION</th>					
								<th class="th-sm">STATUS</th>					
								</tr>
							</thead>
							<tbody>
				</html>
						<?php
						
							#while($row = mysqli_fetch_array($result))
						#if (is_array($result) || is_object($result))
#{	
						foreach ($result as $row)
							{
								echo "<tr>";
								echo "<td>" . $row['id'] . "</td>";
								echo "<td>" . $row['url'] . "</td>";
								echo "<td>" . $row['thumbnail_url'] . "</td>";
								echo "<td>" . $row['title'] . "</td>";
								echo "<td>" . $row['duration'] . "</td>";
								echo "<td>" . $row['status'] . "</td>";
								echo "</tr>";
							}
#}
							?>
							</table>
							
 

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
