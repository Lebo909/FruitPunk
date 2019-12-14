<!DOCTYPE html>
<html lang="en">

<head>
<?php
			if(isset($_POST['search']))
			{
				$url = $_POST['search'];
				echo "video link : " . $url . "<br>";
				$vidid = preg_replace("#.*youtube\.com/watch\?v=#", "", $url);
				echo "the video Id : " . $vidid . "<br>";
				echo "the url : " . $url . "<br>";
			}
			else
			{
				echo "<br>";
				echo "the video Id : HE GONE" . $vidid . "<br>";
				echo "the url : HE GONE TOO" . $url . "<br>";
			}
					
			while($row = mysqli_fetch_array($result))
			{

			echo			"<div class=\"row col-xl-4 mb-5 pb-3\">"
			echo				"<div class=\"embed-responsive embed-responsive-16by9\">"
			echo					"<iframe src=\"//www.youtube.com/embed/\"" . $vidid . "\"?rel=0&modestbranding=1&autohide=1&showinfo=0\" frameborder=\"0\" allowfullscreen></iframe>"
			echo				"</div>"
			echo			"</div>"
			echo			"<hr>"
			}
			
?>


<body>
	<form method='POST'>
		<input id = 'search' name='vidsearch'/>
		<br>
		<input type='submit'/>
	</form>
	<?php
		if(isset($_POST['search']))
		{
				$url = $_POST['search'];
				echo :"video link : " . $url . "<br>";
				$vidid = preg_replace("#.*youtube\.com/watch\?v=#", "", $text);
				echo "the video Id : " . $vidid . "<br>";
	
	?>
</body>


GOOD POST CODE
				<?php
					if(isset($_POST['search']))
					{
						$url = $_POST['search'];
						echo "video link : " . $url . "<br>";
						$vidid = preg_replace("#.*youtube\.com/watch\?v=#", "", $url);
						echo "the video Id : " . $vidid . "<br>";
						echo "the url : " . $url . "<br>";
					}
					else{
						echo "<br>";
						echo "the video Id : HE GONE" . $vidid . "<br>";
						echo "the url : HE GONE TOO" . $url . "<br>";
					}
				?>	
				
				
				
				
						<div class="row col-xl-4 mb-5 pb-3">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe width="560" height="315" src="//www.youtube.com/embed/BEtIoGQxqQs?rel=0&modestbranding=1&autohide=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
						<hr>