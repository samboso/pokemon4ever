<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    </head>
    <body>
            <?php
                if (isset($_REQUEST['pos']))
                    $inicio=$_REQUEST['pos'];
                else
                    $inicio=0;
                $impresos=0;
    
                // Rellenamos el desplegable con los datos de todos los productos
                $conexion = new PDO("mysql:host=localhost;dbname=pokedex", "root", "root123.,");
                $sql = "SELECT specie_name, num_dex FROM pokemon limit $inicio,3";
                $resultado = $conexion->query($sql);
                if($resultado) {
                    $fila = $resultado->fetch();
                    echo "<table>";
                    echo "<tr><th>Código</th><th>Nombre corto</th></tr>";
                    while ($fila != null) {
                        $impresos++;
                        echo "<tr><td>" . $fila['num_dex'] . "</td>";
                        echo "<td>" . $fila['specie_name']. "</td></tr>";
                        $fila = $resultado->fetch();
                    }
                    echo "</table>";
                }
                if ($inicio==0)
                    echo "anteriores ";
                else{
                    $anterior=$inicio-3;
                    echo "<a href=\"paginacion_pokedex.php?pos=$anterior\">Anteriores </a>" . " -- ";
                }
                if ($impresos==3){
                    $proximo=$inicio+3;
                    echo "<a href=\"paginacion_pokedex.php?pos=$proximo\">Siguientes</a>";
                }
                else
                    echo "siguientes";
            ?>
        <?php
            unset($conexion);
        ?>
        </div>
    </body>
</html>






