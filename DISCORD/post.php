  
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
								$append = mysqli_query($con,"INSERT INTO song_queue (url, status) VALUES ('$url', 0);" );
							}
							else if (strpos($url, 'youtu.be') !== false) 
							{
								$vidid = preg_replace("#.*youtu\.be/#", "", $url);
								echo "the video Id : " . $vidid . "<br>";
								echo "shorter url : " . $url . "<br>";
								echo 'valid youtube url';
								$append = mysqli_query($con,"INSERT INTO song_queue (url, status) VALUES ('$url', 0);" );
							}							
							else
							{
								echo "nice url, dummy!";
							}
						} 
				?>