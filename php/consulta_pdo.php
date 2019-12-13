<?php
	//INSERT INTO `pokemon` (`num_dex`, `specie_name`, `type_1`, `type_2`) VALUES ('026', 'Raichu', 'Eléctrico', NULL);
	/*
	$conexion = new PDO("mysql:host=localhost;dbname=pokedex", "root", "root123.,");
	$consulta = $conexion->stmt_init();
	$consulta->prepare("INSERT INTO `pokemon` (`num_dex`, `specie_name`, `type_1`, `type_2`) VALUES (?,?,?,?)");
	$num_dex = 26;
	$specie = $_GET['add_pokemon'];
	$type_1 = "Eléctrico";
	$type_2 = NULL;
	$consulta->bind_param('ssss', $num_dex, $specie, $type_1, $type_2);
	$consulta->execute();
	$consulta->close();
	unset($conexion);
	//$sql = "INSERT INTO `pokemon` (`num_dex`, `specie_name`, `type_1`, `type_2`) VALUES ('026', 'Raichu', 'Eléctrico', NULL);";
	echo '<marquee direction="across" width="100%" behavior="alternate" style="border:solid">'. $error_msg . "</marquee>";*/

	$servername = "localhost";
	$username = "root";
	$password = "root123.,";
	$dbname = "pokedex";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO `pokemon` (`num_dex`, `specie_name`, `type_1`, `type_2`)
		VALUES (:num_dex, :specie_name, :type_1, :type_2)");
		$stmt->bindParam(':num_dex', $num_dex);
		$stmt->bindParam(':specie_name', $specie_name);
		$stmt->bindParam(':type_1', $type_1);
		$stmt->bindParam(':type_2', $type_2);

		// insert a row
		$num_dex = "149";
		$specie_name = "Dragonite";
		$type_1 = "Dragón";
		$type_2 = "Volador";
		$stmt->execute();
	} catch(PDOException $e) {
		if (strpos($e, 'PRIMARY') !== false) {
		    echo '<marquee direction="across" width="100%" behavior="alternate" style="border:solid;background-color:lightyellow">New records created successfully</marquee>';
		}
	}
	$conn = null;

?>