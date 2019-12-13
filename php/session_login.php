<?php
		//$user_check = "AshKetchum";
		//$pass_check = "Haztecontodos";
		$fichero = fopen("./txt/preferences.txt", "a+");
		$cont = 0;
		if (isset($_SESSION['usuario']))
			$usuario = $_SESSION['usuario'];
		try {
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$user = $_POST['user'];
				$password = $_POST['password'];
				$mysqli = new mysqli('localhost', 'root', 'root123.,', 'pokedex');
				if ($mysqli->connect_error)
					die('Error de Conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
				$mysqli->query("SET NAMES 'utf8'");
				if ($resultado = $mysqli->query("SELECT user, password FROM user_pkmn"))  {
					while ($pokemondb = $resultado->fetch_assoc() && $cont < 1) {
						$user_check = $pokemondb["user"];
						$pass_check = $pokemondb["password"];
						if ((($user == $user_check) && ($password == $pass_check)) || $cont == 0) {
							echo "<script>alert('Bienvenid@ " . $usuario . "');</script>";
							$valores = "El usuario es: " . $user;
						} elseif (($user == $user_check) && ($password == $pass_check)) {
							echo "<script>alert('Por favor, introduza bien los datos.');</script>";
						}
						$cont++;
					}
					$_SESSION['usuario'] = $user;
					$linea = fputs($fichero, $valores);
					fclose($fichero);		
				}
				mysqli_free_result($resultado);
			}
			$mysqli->close();
		} catch(Exception $e) {
			$e->getMessage();
		}
?>