<?php
		$fichero = fopen("./txt/preferences.txt", "r");
		$temp_starred = "";
		while(! feof($fichero)) {
			$line = fgets($fichero);
			$temp_starred .= $line. "<br>";
		  }
		fclose($fichero);
		echo "<script>
			$(document).ready(function () {
				$(\".sub_container_p > img.pkmn\").click(function () {
					var id = $(this).attr(\"id\");
					var alt = $(this).attr(\"alt\").toLowerCase();
					var starred = \"https://img.pokemondb.net/sprites/x-y/normal/\" + alt + \".png\";
					$('.imgcontainer2').html('<span onclick=\"document.getElementById(`id02`).style.display=`none`\" class=\"close\" title=\"Close Modal\">&times;</span\>' + 
					'<img src=\"' + starred + '\" alt=\"Pokémon\" height=\"300\" class=\"avatar\" id=\"starred\"><p>" . $temp_starred . "</p>');
				});
			});

			if (!localStorage.getItem(\"reload\")) {
				localStorage.setItem(\"reload\", \"true\");
				location.reload();
			} else {
				localStorage.removeItem(\"reload\");
			}
		</script>";
	?>