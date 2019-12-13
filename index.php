<?php
	//Escribir en el fichero el nmbre del Pokémon favorito y las preferencias
	include("./php/fichero_session_cookie_fondo.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>PokéDex Kanto by Fabio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="stylesheet" type="text/css" href="./css/pokedex.css">
	<link rel="icon" type="image/png" href="./img/pokeball.png">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="./js/pokedex.js"></script>
	<?php
	//Ficheros y ajax js
		include("./php/fichero_y_ajax.php");
	?>
	<script>
		function filtrar(str) {
			var starred = "https://img.pokemondb.net/sprites/x-y/normal/";
			var png = ".png";
			if (str.length == 0) {
				document.getElementById("imgcontainer2").innerHTML= '<span onclick="document.getElementById(`id02`).style.display=`none`" class="close" title="Close Modal">&times;</span><img src="./img/pokemon_logo.png" alt="Pokémon" height="300" class="avatar" id="starred">';
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("imgcontainer2").innerHTML='<span onclick="document.getElementById(`id02`).style.display=`none`" class="close" title="Close Modal">&times;</span><img src="'
						+ starred + this.responseText + png + '" alt="Pokémon" height="300" class="avatar" id="starred"><p><?php echo $temp_starred; ?></p>';
					}
				};
				xmlhttp.open("GET", "./php/datos_pokemon.php?q=" + str, true);
				xmlhttp.send();
			}
		}
	</script>
    <style>
  		body {
			  background-image: url(<?php echo $background_check;?>);
		  }
	</style>
</head>
<body>
	<span id="login_span" class="login_span"><img class="login" src="<?php echo $login_check;?>" alt="Login" onclick="document.getElementById('id01').style.display='block'"></span>
	<span id="login_span_2" class="login_span"><img class="preferences" src="./img/gear.png" alt="Perferences" onclick="document.getElementById('id02').style.display='block'"></span>
	<button class="button_display" onclick="display_web()">Mostrar web</button>
	<button class="button_display button_hide" onclick="hide_web()">Ocultar web</button>

	<div class="fondo" id="fondo" tabindex="1">
		<div class="interior" id="interior">
			<div class="frente">
				<video id="opening_1" controls autoplay>
					<source autoplay src="./video/pokemon_opening_1.mp4" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</div>

	<div class="trasera" id="trasera">
	<header>
		<center>
			<h1>PokéDex de los Pokémon de Kanto</h1>
		</center>
	</header>
	<div id="id01" class="modal">
  
		<form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="./img/pokemon_logo.png" alt="Pokémon" class="avatar">
			</div>
			<div class="container">
				<label for="user" id="user_label"><b>Username</b></label>
				<input type="text" id="user" placeholder="Enter Username" name="user" required>

				<label for="password"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				        
				<button type="submit">Login</button>
				<label>
					<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="<?=password() ?>">password?</a></span>
			</div>
		</form>
	</div>

	<div id="id02" class="modal2">
  
		<form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="get">
			<div class="imgcontainer2" id="imgcontainer2">
				<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="./img/pokemon_logo.png" alt="Pokémon" class="avatar" id="starred">
			</div>
			<div class="container">
				<label for="theme"><b>Theme</b></label><br>
				<input type="radio" name="theme" value="Magikarp" required>Magikarp<br>
				<input type="radio" name="theme" value="Troll">Troll<br><br>

				<label for="theme"><b>Favourite Pokémon</b></label><br>
				<input type="text" name="pokemon" onkeyup="filtrar(this.value)">
				<!--<input type="text" name="add_pokemon" placeholder="Escriba aquí para añadir Pokémon">-->
				<button type="submit">Accept</button>
				<label>
					<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
			</div>
		</form>
	</div>
	
		<div class="container_p">
			<div class="sub_container_p not_first">
				<span>Bulbasaur</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/bulbasaur.png" id="pkmn001" class="pkmn" alt="Bulbasaur">
			</div>
			<div class="sub_container_p not_first">
				<span>Ivysaur</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/ivysaur.png" id="pkmn002" class="pkmn" alt="Ivysaur">
			</div>
			<div class="sub_container_p not_first">
				<span>Venusaur</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/venusaur.png" id="pkmn003" class="pkmn" alt="Venusaur">
			</div>
			<div class="sub_container_p not_first">
				<span>Charmander</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/charmander.png" id="pkmn004" class="pkmn" alt="Charmander">
			</div>
			<div class="sub_container_p not_first">
				<span>Charmeleon</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/charmeleon.png" id="pkmn005" class="pkmn" alt="Charmeleon">
			</div>
			<div class="sub_container_p not_first">
				<span>Charizard</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/charizard.png" id="pkmn006" class="pkmn" alt="Charizard">
			</div>
			<div class="sub_container_p not_first">
				<span>Squirtle</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/squirtle.png" id="pkmn007" class="pkmn" alt="Squirtle">
			</div>
			<div class="sub_container_p not_first">
				<span>Wartortle</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/wartortle.png" id="pkmn008" class="pkmn" alt="Wartortle">
			</div>
			<div class="sub_container_p not_first">
				<span>Blastoise</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/blastoise.png" id="pkmn009" class="pkmn" alt="Blastoise">
			</div>
			<div class="sub_container_p not_first">
				<span>Caterpie</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/caterpie.png" id="pkmn010" class="pkmn" alt="Caterpie">
			</div>
			<div class="sub_container_p not_first">
				<span>Metapod</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/metapod.png" id="pkmn011" class="pkmn" alt="Metapod">
			</div>
			<div class="sub_container_p not_first">
				<span>Butterfree</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/butterfree.png" id="pkmn012" class="pkmn" alt="Butterfree">
			</div>
			<div class="sub_container_p not_first">
				<span>Weedle</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/weedle.png" id="pkmn013" class="pkmn" alt="Weedle">
			</div>
			<div class="sub_container_p not_first">
				<span>Kakuna</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/kakuna.png" id="pkmn014" class="pkmn" alt="Kakuna">
			</div>
			<div class="sub_container_p not_first">
				<span>Beedrill</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/beedrill.png" id="pkmn015" class="pkmn" alt="Beedrill">
			</div>
			<div class="sub_container_p not_first">
				<span>Pidgey</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/pidgey.png" id="pkmn016" class="pkmn" alt="Pidgey">
			</div>
			<div class="sub_container_p not_first">
				<span>Pidgeotto</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/pidgeotto.png" id="pkmn017" class="pkmn" alt="Pidgeotto">
			</div>
			<div class="sub_container_p not_first">
				<span>Pidgeot</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/pidgeot.png" id="pkmn018" class="pkmn" alt="Pidgeot">
			</div>
			<div class="sub_container_p not_first">
				<span>Rattata</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/rattata.png" id="pkmn019" class="pkmn" alt="Rattata">
			</div>
			<div class="sub_container_p not_first">
				<span>Raticate</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/raticate.png" id="pkmn020" class="pkmn" alt="Raticate">
			</div>
			<div class="sub_container_p not_first">
				<span>Spearow</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/spearow.png" id="pkmn021" class="pkmn" alt="Spearow">
			</div>
			<div class="sub_container_p not_first">
				<span>Fearow</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/fearow.png" id="pkmn022" class="pkmn" alt="Fearow">
			</div>
			<div class="sub_container_p not_first">
				<span>Ekans</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/ekans.png" id="pkmn023" class="pkmn" alt="Ekans">
			</div>
			<div class="sub_container_p not_first">
				<span>Arbok</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/arbok.png" id="pkmn024" class="pkmn" alt="Arbok">
			</div>
			<div class="sub_container_p not_first">
				<span>Pikachu</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/pikachu.png" id="pkmn025" class="pkmn" alt="Pikachu">
			</div>
			<div class="sub_container_p not_first">
				<span>Raichu</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/raichu.png" id="pkmn026" class="pkmn" alt="Raichu">
			</div>
			<div class="sub_container_p not_first">
				<span>Sandshrew</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/sandshrew.png" id="pkmn027" class="pkmn" alt="Sandshrew">
			</div>
			<div class="sub_container_p not_first">
				<span>Sandslash</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/sandslash.png" id="pkmn028" class="pkmn" alt="Sandslash">
			</div>
			<div class="sub_container_p not_first">
				<span>Nidoran♀</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/nidoran-f.png" id="pkmn029" class="pkmn" alt="Nidoran-F">
			</div>
			<div class="sub_container_p not_first">
				<span>Nidorina</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/nidorina.png" id="pkmn030" class="pkmn" alt="Nidorina">
			</div>
			<div class="sub_container_p not_first">
				<span>Nidoqueen</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/nidoqueen.png" id="pkmn031" class="pkmn" alt="Nidoqueen">
			</div>
			<div class="sub_container_p not_first">
				<span>Nidoran♂</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/nidoran-m.png" id="pkmn032" class="pkmn" alt="Nidoran-M">
			</div>
			<div class="sub_container_p not_first">
				<span>Nidorino</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/nidorino.png" id="pkmn033" class="pkmn" alt="Nidorino">
			</div>
			<div class="sub_container_p not_first">
				<span>Nidoking</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/nidoking.png" id="pkmn034" class="pkmn" alt="Nidoking">
			</div>
			<div class="sub_container_p not_first">
				<span>Clefairy</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/clefairy.png" id="pkmn035" class="pkmn" alt="Clefairy">
			</div>
			<div class="sub_container_p not_first">
				<span>Clefable</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/clefable.png" id="pkmn036" class="pkmn" alt="Clefable">
			</div>
			<div class="sub_container_p not_first">
				<span>Vulpix</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/vulpix.png" id="pkmn037" class="pkmn" alt="Vulpix">
			</div>
			<div class="sub_container_p not_first">
				<span>Ninetales</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/ninetales.png" id="pkmn038" class="pkmn" alt="Ninetales">
			</div>
			<div class="sub_container_p not_first">
				<span>Jigglypuff</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/jigglypuff.png" id="pkmn039" class="pkmn" alt="Jigglypuff">
			</div>
			<div class="sub_container_p not_first">
				<span>Wigglytuff</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/wigglytuff.png" id="pkmn040" class="pkmn" alt="Wigglytuff">
			</div>
			<div class="sub_container_p not_first">
				<span>Zubat</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/zubat.png" id="pkmn041" class="pkmn" alt="Zubat">
			</div>
			<div class="sub_container_p not_first">
				<span>Golbat</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/golbat.png" id="pkmn042" class="pkmn" alt="Golbat">
			</div>
			<div class="sub_container_p not_first">
				<span>Oddish</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/oddish.png" id="pkmn043" class="pkmn" alt="Oddish">
			</div>
			<div class="sub_container_p not_first">
				<span>Gloom</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/gloom.png" id="pkmn044" class="pkmn" alt="Gloom">
			</div>
			<div class="sub_container_p not_first">
				<span>Vileplume</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/vileplume.png" id="pkmn045" class="pkmn" alt="Vileplume">
			</div>
			<div class="sub_container_p not_first">
				<span>Paras</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/paras.png" id="pkmn046" class="pkmn" alt="Paras">
			</div>
			<div class="sub_container_p not_first">
				<span>Parasect</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/parasect.png" id="pkmn047" class="pkmn" alt="Parasect">
			</div>
			<div class="sub_container_p not_first">
				<span>Venonat</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/venonat.png" id="pkmn048" class="pkmn" alt="Venonat">
			</div>
			<div class="sub_container_p not_first">
				<span>Venomoth</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/venomoth.png" id="pkmn049" class="pkmn" alt="Venomoth">
			</div>
			<div class="sub_container_p not_first">
				<span>Diglett</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/diglett.png" id="pkmn050" class="pkmn" alt="Diglett">
			</div>
			<div class="sub_container_p not_first">
				<span>Dugtrio</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/dugtrio.png" id="pkmn051" class="pkmn" alt="Dugtrio">
			</div>
			<div class="sub_container_p not_first">
				<span>Meowth</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/meowth.png" id="pkmn052" class="pkmn" alt="Meowth">
			</div>
			<div class="sub_container_p not_first">
				<span>Persian</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/persian.png" id="pkmn053" class="pkmn" alt="Persian">
			</div>
			<div class="sub_container_p not_first">
				<span>Psyduck</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/psyduck.png" id="pkmn054" class="pkmn" alt="Psyduck">
			</div>
			<div class="sub_container_p not_first">
				<span>Golduck</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/golduck.png" id="pkmn055" class="pkmn" alt="Golduck">
			</div>
			<div class="sub_container_p not_first">
				<span>Mankey</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/mankey.png" id="pkmn056" class="pkmn" alt="Mankey">
			</div>
			<div class="sub_container_p not_first">
				<span>Primeape</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/primeape.png" id="pkmn057" class="pkmn" alt="Primeape">
			</div>
			<div class="sub_container_p not_first">
				<span>Growlithe</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/growlithe.png" id="pkmn058" class="pkmn" alt="Growlithe">
			</div>
			<div class="sub_container_p not_first">
				<span>Arcanine</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/arcanine.png" id="pkmn059" class="pkmn" alt="Arcanine">
			</div>
			<div class="sub_container_p not_first">
				<span>Poliwag</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/poliwag.png" id="pkmn060" class="pkmn" alt="Poliwag">
			</div>
			<div class="sub_container_p not_first">
				<span>Poliwhirl</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/poliwhirl.png" id="pkmn061" class="pkmn" alt="Poliwhirl">
			</div>
			<div class="sub_container_p not_first">
				<span>Poliwrath</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/poliwrath.png" id="pkmn062" class="pkmn" alt="Poliwrath">
			</div>
			<div class="sub_container_p not_first">
				<span>Abra</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/abra.png" id="pkmn063" class="pkmn" alt="Abra">
			</div>
			<div class="sub_container_p not_first">
				<span>Kadabra</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/kadabra.png" id="pkmn064" class="pkmn" alt="Kadabra">
			</div>
			<div class="sub_container_p not_first">
				<span>Alakazam</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/alakazam.png" id="pkmn065" class="pkmn" alt="Alakazam">
			</div>
			<div class="sub_container_p not_first">
				<span>Machop</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/machop.png" id="pkmn066" class="pkmn" alt="Machop">
			</div>
			<div class="sub_container_p not_first">
				<span>Machoke</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/machoke.png" id="pkmn067" class="pkmn" alt="Machoke">
			</div>
			<div class="sub_container_p not_first">
				<span>Machamp</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/machamp.png" id="pkmn068" class="pkmn" alt="Machamp">
			</div>
			<div class="sub_container_p not_first">
				<span>Bellsprout</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/bellsprout.png" id="pkmn069" class="pkmn" alt="Bellsprout">
			</div>
			<div class="sub_container_p not_first">
				<span>Weepinbell</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/weepinbell.png" id="pkmn070" class="pkmn" alt="Weepinbell">
			</div>
			<div class="sub_container_p not_first">
				<span>Victreebel</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/victreebel.png" id="pkmn071" class="pkmn" alt="Victreebel">
			</div>
			<div class="sub_container_p not_first">
				<span>Tentacool</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/tentacool.png" id="pkmn072" class="pkmn" alt="Tentacool">
			</div>
			<div class="sub_container_p not_first">
				<span>Tentacruel</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/tentacruel.png" id="pkmn073" class="pkmn" alt="Tentacruel">
			</div>
			<div class="sub_container_p not_first">
				<span>Geodude</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/geodude.png" id="pkmn074" class="pkmn" alt="Geodude">
			</div>
			<div class="sub_container_p not_first">
				<span>Graveler</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/graveler.png" id="pkmn075" class="pkmn" alt="Graveler">
			</div>
			<div class="sub_container_p not_first">
				<span>Golem</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/golem.png" id="pkmn076" class="pkmn" alt="Golem">
			</div>
			<div class="sub_container_p not_first">
				<span>Ponyta</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/ponyta.png" id="pkmn077" class="pkmn" alt="Ponyta">
			</div>
			<div class="sub_container_p not_first">
				<span>Rapidash</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/rapidash.png" id="pkmn078" class="pkmn" alt="Rapidash">
			</div>
			<div class="sub_container_p not_first">
				<span>Slowpoke</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/slowpoke.png" id="pkmn079" class="pkmn" alt="Slowpoke">
			</div>
			<div class="sub_container_p not_first">
				<span>Slowbro</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/slowbro.png" id="pkmn080" class="pkmn" alt="Slowbro">
			</div>
			<div class="sub_container_p not_first">
				<span>Magnemite</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/magnemite.png" id="pkmn081" class="pkmn" alt="Magnemite">
			</div>
			<div class="sub_container_p not_first">
				<span>Magneton</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/magneton.png" id="pkmn082" class="pkmn" alt="Magneton">
			</div>
			<div class="sub_container_p not_first">
				<span>Farfetch’d</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/farfetchd.png" id="pkmn083" class="pkmn" alt="Farfetchd">
			</div>
			<div class="sub_container_p not_first">
				<span>Doduo</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/doduo.png" id="pkmn084" class="pkmn" alt="Doduo">
			</div>
			<div class="sub_container_p not_first">
				<span>Dodrio</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/dodrio.png" id="pkmn085" class="pkmn" alt="Dodrio">
			</div>
			<div class="sub_container_p not_first">
				<span>Seel</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/seel.png" id="pkmn086" class="pkmn" alt="Seel">
			</div>
			<div class="sub_container_p not_first">
				<span>Dewgong</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/dewgong.png" id="pkmn087" class="pkmn" alt="Dewgong">
			</div>
			<div class="sub_container_p not_first">
				<span>Grimer</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/grimer.png" id="pkmn088" class="pkmn" alt="Grimer">
			</div>
			<div class="sub_container_p not_first">
				<span>Muk</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/muk.png" id="pkmn089" class="pkmn" alt="Muk">
			</div>
			<div class="sub_container_p not_first">
				<span>Shellder</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/shellder.png" id="pkmn090" class="pkmn" alt="Shellder">
			</div>
			<div class="sub_container_p not_first">
				<span>Cloyster</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/cloyster.png" id="pkmn091" class="pkmn" alt="Cloyster">
			</div>
			<div class="sub_container_p not_first">
				<span>Gastly</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/gastly.png" id="pkmn092" class="pkmn" alt="Gastly">
			</div>
			<div class="sub_container_p not_first">
				<span>Haunter</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/haunter.png" id="pkmn093" class="pkmn" alt="Haunter">
			</div>
			<div class="sub_container_p not_first">
				<span>Gengar</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/gengar.png" id="pkmn094" class="pkmn" alt="Gengar">
			</div>
			<div class="sub_container_p not_first">
				<span>Onix</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/onix.png" id="pkmn095" class="pkmn" alt="Onix">
			</div>
			<div class="sub_container_p not_first">
				<span>Drowzee</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/drowzee.png" id="pkmn096" class="pkmn" alt="Drowzee">
			</div>
			<div class="sub_container_p not_first">
				<span>Hypno</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/hypno.png" id="pkmn097" class="pkmn" alt="Hypno">
			</div>
			<div class="sub_container_p not_first">
				<span>Krabby</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/krabby.png" id="pkmn098" class="pkmn" alt="Krabby">
			</div>
			<div class="sub_container_p not_first">
				<span>Kingler</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/kingler.png" id="pkmn099" class="pkmn" alt="Kingler">
			</div>
			<div class="sub_container_p not_first">
				<span>Voltorb</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/voltorb.png" id="pkmn100" class="pkmn" alt="Voltorb">
			</div>
			<div class="sub_container_p not_first">
				<span>Electrode</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/electrode.png" id="pkmn101" class="pkmn" alt="Electrode">
			</div>
			<div class="sub_container_p not_first">
				<span>Exeggcute</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/exeggcute.png" id="pkmn102" class="pkmn" alt="Exeggcute">
			</div>
			<div class="sub_container_p not_first">
				<span>Exeggutor</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/exeggutor.png" id="pkmn103" class="pkmn" alt="Exeggutor">
			</div>
			<div class="sub_container_p not_first">
				<span>Cubone</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/cubone.png" id="pkmn104" class="pkmn" alt="Cubone">
			</div>
			<div class="sub_container_p not_first">
				<span>Marowak</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/marowak.png" id="pkmn105" class="pkmn" alt="Marowak">
			</div>
			<div class="sub_container_p not_first">
				<span>Hitmonlee</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/hitmonlee.png" id="pkmn106" class="pkmn" alt="Hitmonlee">
			</div>
			<div class="sub_container_p not_first">
				<span>Hitmonchan</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/hitmonchan.png" id="pkmn107" class="pkmn" alt="Hitmonchan">
			</div>
			<div class="sub_container_p not_first">
				<span>Lickitung</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/lickitung.png" id="pkmn108" class="pkmn" alt="Lickitung">
			</div>
			<div class="sub_container_p not_first">
				<span>Koffing</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/koffing.png" id="pkmn109" class="pkmn" alt="Koffing">
			</div>
			<div class="sub_container_p not_first">
				<span>Weezing</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/weezing.png" id="pkmn110" class="pkmn" alt="Weezing">
			</div>
			<div class="sub_container_p not_first">
				<span>Rhyhorn</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/rhyhorn.png" id="pkmn111" class="pkmn" alt="Rhyhorn">
			</div>
			<div class="sub_container_p not_first">
				<span>Rhydon</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/rhydon.png" id="pkmn112" class="pkmn" alt="Rhydon">
			</div>
			<div class="sub_container_p not_first">
				<span>Chansey</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/chansey.png" id="pkmn113" class="pkmn" alt="Chansey">
			</div>
			<div class="sub_container_p not_first">
				<span>Tangela</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/tangela.png" id="pkmn114" class="pkmn" alt="Tangela">
			</div>
			<div class="sub_container_p not_first">
				<span>Kangaskhan</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/kangaskhan.png" id="pkmn115" class="pkmn" alt="Kangaskhan">
			</div>
			<div class="sub_container_p not_first">
				<span>Horsea</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/horsea.png" id="pkmn116" class="pkmn" alt="Horsea">
			</div>
			<div class="sub_container_p not_first">
				<span>Seadra</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/seadra.png" id="pkmn117" class="pkmn" alt="Seadra">
			</div>
			<div class="sub_container_p not_first">
				<span>Goldeen</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/goldeen.png" id="pkmn118" class="pkmn" alt="Goldeen">
			</div>
			<div class="sub_container_p not_first">
				<span>Seaking</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/seaking.png" id="pkmn119" class="pkmn" alt="Seaking">
			</div>
			<div class="sub_container_p not_first">
				<span>Staryu</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/staryu.png" id="pkmn120" class="pkmn" alt="Staryu">
			</div>
			<div class="sub_container_p not_first">
				<span>Starmie</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/starmie.png" id="pkmn121" class="pkmn" alt="Starmie">
			</div>
			<div class="sub_container_p not_first">
				<span>Mr.Mime</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/mr-mime.png" id="pkmn122" class="pkmn" alt="Mr-Mime">
			</div>
			<div class="sub_container_p not_first">
				<span>Scyther</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/scyther.png" id="pkmn123" class="pkmn" alt="Scyther">
			</div>
			<div class="sub_container_p not_first">
				<span>Jynx</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/jynx.png" id="pkmn124" class="pkmn" alt="Jynx">
			</div>
			<div class="sub_container_p not_first">
				<span>Electabuzz</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/electabuzz.png" id="pkmn125" class="pkmn" alt="Electabuzz">
			</div>
			<div class="sub_container_p not_first">
				<span>Magmar</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/magmar.png" id="pkmn126" class="pkmn" alt="Magmar">
			</div>
			<div class="sub_container_p not_first">
				<span>Pinsir</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/pinsir.png" id="pkmn127" class="pkmn" alt="Pinsir">
			</div>
			<div class="sub_container_p not_first">
				<span>Tauros</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/tauros.png" id="pkmn128" class="pkmn" alt="Tauros">
			</div>
			<div class="sub_container_p not_first">
				<span>Magikarp</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/magikarp.png" id="pkmn129" class="pkmn" alt="Magikarp">
			</div>
			<div class="sub_container_p not_first">
				<span>Gyarados</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/gyarados.png" id="pkmn130" class="pkmn" alt="Gyarados">
			</div>
			<div class="sub_container_p not_first">
				<span>Lapras</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/lapras.png" id="pkmn131" class="pkmn" alt="Lapras">
			</div>
			<div class="sub_container_p not_first">
				<span>Ditto</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/ditto.png" id="pkmn132" class="pkmn" alt="Ditto">
			</div>
			<div class="sub_container_p not_first">
				<span>Eevee</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/eevee.png" id="pkmn133" class="pkmn" alt="Eevee">
			</div>
			<div class="sub_container_p not_first">
				<span>Vaporeon</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/vaporeon.png" id="pkmn134" class="pkmn" alt="Vaporeon">
			</div>
			<div class="sub_container_p not_first">
				<span>Jolteon</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/jolteon.png" id="pkmn135" class="pkmn" alt="Jolteon">
			</div>
			<div class="sub_container_p not_first">
				<span>Flareon</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/flareon.png" id="pkmn136" class="pkmn" alt="Flareon">
			</div>
			<div class="sub_container_p not_first">
				<span>Porygon</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/porygon.png" id="pkmn137" class="pkmn" alt="Porygon">
			</div>
			<div class="sub_container_p not_first">
				<span>Omanyte</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/omanyte.png" id="pkmn138" class="pkmn" alt="Omanyte">
			</div>
			<div class="sub_container_p not_first">
				<span>Omastar</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/omastar.png" id="pkmn139" class="pkmn" alt="Omastar">
			</div>
			<div class="sub_container_p not_first">
				<span>Kabuto</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/kabuto.png" id="pkmn140" class="pkmn" alt="Kabuto">
			</div>
			<div class="sub_container_p not_first">
				<span>Kabutops</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/kabutops.png" id="pkmn141" class="pkmn" alt="Kabutops">
			</div>
			<div class="sub_container_p not_first">
				<span>Aerodactyl</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/aerodactyl.png" id="pkmn142" class="pkmn" alt="Aerodactyl">
			</div>
			<div class="sub_container_p not_first">
				<span>Snorlax</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/snorlax.png" id="pkmn143" class="pkmn" alt="Snorlax">
			</div>
			<div class="sub_container_p not_first">
				<span>Articuno</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/articuno.png" id="pkmn144" class="pkmn" alt="Articuno">
			</div>
			<div class="sub_container_p not_first">
				<span>Zapdos</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/zapdos.png" id="pkmn145" class="pkmn" alt="Zapdos">
			</div>
			<div class="sub_container_p not_first">
				<span>Moltres</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/moltres.png" id="pkmn146" class="pkmn" alt="Moltres">
			</div>
			<div class="sub_container_p not_first">
				<span>Dratini</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/dratini.png" id="pkmn147" class="pkmn" alt="Dratini">
			</div>
			<div class="sub_container_p not_first">
				<span>Dragonair</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/dragonair.png" id="pkmn148" class="pkmn" alt="Dragonair">
			</div>
			<div class="sub_container_p not_first">
				<span>Dragonite</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/dragonite.png" id="pkmn149" class="pkmn" alt="Dragonite">
			</div>
			<div class="sub_container_p not_first">
				<span>Mewtwo</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/mewtwo.png" id="pkmn149" class="pkmn" alt="Mewtwo">
			</div>
			<div class="sub_container_p not_first">
				<span>Mew</span>
				<img src="https://img.pokemondb.net/sprites/x-y/normal/mew.png" id="pkmn149" class="pkmn" alt="Mew">
			</div>
		</div>
	
	<?php
		//Iniciar sesión con las variables en local y escribir en el fichero el nombre de usuario obtenido del formulario
		include("./php/session_login.php");
		//Mostrar la tabla de PokéDex detallada
		include("./php/xml.php");
	?>
			</div>
		</div>
	</div>
</body>
</html>