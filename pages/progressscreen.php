<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2><u>Progress</u></h2>
		<p>
			<table>
				<tr>
					<th>
						Made what
					</th>
					<th>
						By who
					</th>
				</tr>
				<?php
					include_once 'repositories/progressrepository.php';
					$progress = getAllProgress($connection);
					foreach($progress as &$progressitem)
					{
						$made = $progressitem -> _get("made");
						$who = $progressitem -> _get("who");
						echo "<tr><td>$who</td><td>$made</td></tr>";
					}
				?>
			</table>
		</p>
	</div>
</div>