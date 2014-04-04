<br/><br/></div>
<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<div class="container">
	<h2>Progress</h2>
		<table class='table'>
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
</div>