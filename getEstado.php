<?php
<link rel="shortcut icon" href="img\icons\icoUAMEX.ico" />
$mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
if(mysqli_connect_errno()){
	echo 'Conexion Fallida : ', mysqli_connect_error();
	exit();
}

	$idest = $_POST['idest'];
	
	$queryM = "SELECT idest, estado FROM estado WHERE activo= 'si'";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Estado</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idest']."'>".$rowM['estado']."</option>";
	}
	
	echo $html;
?>		