<?php 
include 'db/connection.php';
$connection = openDB();
include 'functions/header.php'; 
?>
		<h2>Progress</h2>
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
					include 'repositories/progressrepository.php';
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
<?php include 'functions/footer.php'; ?>