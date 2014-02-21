<?php 
include 'db/connection.php';
$connection = openDB();
include 'header.php'; 
?>
	<div id="submenu_border">
	<div id = "tekst">
		<h2>Progress</h2>
		<br />
		<br />
		<table id="progressTable">
			<tr>
				<td>
					Wat
				</td>
				<td>
					Wie
				</td>
			</tr>
			<tr>
				<td>
					Basis gemaakt
				</td>
				<td>
					Thim Heider
				</td>
			</tr>
			<tr>
				<td>
					Database gemaakt
				</td>
				<td>
					Edwin hattink
				</td>
			</tr>
		</table>
	</div>
<?php include 'footer.php'; ?>