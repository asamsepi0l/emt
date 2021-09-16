<?php
$idpro= $_GET['idpro'];
$nombreempresa= $_GET['nombreempresa'];
$ruta= $_GET['ruta'];
$mensaje= $_GET['mensaje'];

session_start();
$_SESSION['idpro']=$idpro;
$_SESSION['nombreempresa']=$nombreempresa;
$_SESSION['ruta']=$ruta;
$_SESSION['mensaje']=$mensaje;


print "<meta http-equiv='refresh' content='0;url=index.php'>";


?>