<html>
							<table id="table" class="table table-wrapper-scroll-y my-custom-scrollbar tableFixHead" cellspacing="0" width="100%">
							<thead>
								<tr>
								<th class="th-sm">#</th>
								<th class="th-sm">Link</th>								
								</tr>
							</thead>
							<tbody>
				</html>
						<?php
							$count = 0;
							
							//while($row = mysqli_fetch_array($result))
							foreach ($result as $row)
							{
							$count++;
							
							echo "<tr>";
							echo '<td>' . $count . '</td>';
							echo '<td><a href="'.$row['url'].'">'.$row['url'].'</a></td>';
							echo "</tr>";
							}
							echo "</table>";
							
						?>
				<html>
							</tbody>
							
						</table>
