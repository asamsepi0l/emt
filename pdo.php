<?php
<link rel="shortcut icon" href="img\icons\icoUAMEX.ico" />
try{
    $conexion = new PDO('mysql:host=127.0.0.1;dbname=id3664941_elmunticbase', 'root'. '');
    echo "Correct connection, PHP Version: ". phpversion(). "<br><br>";

    //Old method QUERY
    $resu = $conexion->query('SELECT * FROM CATEGORIAS');

    foreach ($resu as $datos) {
        print_r ($datos,0) . " <br><br>";
    }


}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

?>