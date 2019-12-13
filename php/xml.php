<?php
		$xml = simplexml_load_file("./xml/xml_dex.xml");
		libxml_get_errors($xml);
		echo "<hr>";
		echo "<center>";
		echo "<table id='species' border='1'>";
		foreach ($xml->pokemon as $pokemon) {
			echo "<tr><td>";
			echo "Nº Pokédex: ";
			echo "</td><td>";
			echo $pokemon->num_pokedex;
			echo "</td></tr>";
			echo "<tr><td>";
			echo "Especie: ";
			echo "</td><td>";
			echo $pokemon->especie;
			echo "</td></tr>";
			echo "<tr><td>";
			echo "Tipo 1: ";
			echo "</td><td>";
			echo $pokemon->tipo[0];
			echo "</td></tr>";
			echo "<tr><td>";
			echo "Tipo 2: ";
			echo "</td><td>";
			if(($pokemon->tipo[1]) == "")
				echo "-------";
			else
				echo $pokemon->tipo[1];
			echo "</td></tr>";			
		}
		echo "</table>";
		echo "</center>";
		echo "<br>";
	?>