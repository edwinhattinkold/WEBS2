<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php	 
	function openDB()
	{
		$db_hostnaam = "databases.aii.avans.nl"; // De locatie waar de MySQL-service draait
		$db_gebruiker = "egjhatti"; // De gebruikersnaam waarmee naar de database kan worden verbonden
		$db_wachtwoord = "Ab12345"; // Het wachtwoord waarmee naar de database kan worden verbonden
		$db_naam = "egjhatti_db"; // De naam van de database zelf, deze moet via de DBMS worden aangemaakt
		$mysqli = new mysqli($db_hostnaam, $db_gebruiker, $db_wachtwoord, $db_naam);
		
		if ($mysqli->connect_errno!= 0) //er gaat iets fout ...
		{
			die("Probleem bij het leggen van connectie of selecteren van database");
		}
		
		return $mysqli;
	}
	
	function closeDB($mysqli)
	{
		$mysqli->close();
	}
	

?>