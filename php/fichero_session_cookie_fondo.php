<?php
	$usuario_session = session_name("usuario");
	session_start();
	$background_check = "./img/background.gif";
	$login_check = "./img/login.gif";
	$theme = "";
	if ($_SERVER['REQUEST_METHOD'] == "GET") {
			if (isset($_GET["theme"]))
				$theme = $_GET['theme'];
	        if ($theme == "Troll") {
				$background_check = "./img/login.gif";
				$login_check = "./img/background.gif";
				$theme = "Troll";
				include("consulta_pdo.php");
            } else {
				$background_check = "./img/background.gif";
				$login_check = "./img/login.gif";
				$theme = "Magikarp";
			}
		$fichero = fopen("./txt/preferences.txt", "w+");
		if (isset($_GET["pokemon"]))
			setcookie("pokemon_starred", $_GET["pokemon"]);	
		$valores = "El fondo de pantalla elegido es: <br>" . $theme;
		if(isset($_COOKIE["pokemon_starred"]))
			$valores .= "<br>Y tu Pokémon favorito es: " . $_COOKIE["pokemon_starred"] . "<br>";
		$linea = fputs($fichero, $valores);
		$linea = fgets($fichero);
		fgetc($fichero);
		fclose($fichero);
	}
?>