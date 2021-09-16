<?php

$correo= trim($_POST['correo']);
$pswd = trim($_POST['pswd']);

if($correo=="" or $pswd=="" )
{
	$mensaje = "Los campos no deben ir vacios";
	print "<meta http-equiv='refresh' content='0;url=/Claptone Projects/elmundodelastic.com/registro.php?mensaje=$mensaje'>";
	$todook= 0;
}

else
{
	$todook= 1;
	$mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
	//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	include ('classprovedor.php');
	include ('validaciones.php');

	$provedores = new provedores();
	$provedores->setcorreo($correo);
	$provedores->setpswd($pswd);
	$validaciones=new validaciones();

	$queryProv = ("SELECT * FROM provedores WHERE correo = '".$correo."' AND activo = 'SI' and pswd = '".$pswd."'");
				$resProv = $mysqli->query($queryProv);
				$cuantos = mysqli_num_rows($resProv);

	if( $validaciones->validaEmail($correo)=="error" )
		{
		$mensaje = "No cumple con validacion";
		//print "<meta http-equiv='refresh' content='0;url=/Claptone Projects/elmundodelastic.com/registro.php?mensaje=$mensaje'>";
		$todook= 0;	
		exit;
		}
	$resultado = $provedores->buscausuarioporuserypassw();

	if($cuantos==0)
	{
	$mensaje = "El usuario o password no existen";
	//print "<meta http-equiv='refresh' content='0;url=/Claptone Projects/elmundodelastic.com/registro.php?mensaje=$mensaje'>";
	echo $mensaje;
	ECHO $queryProv;
	$todook= 0;	
	}

	if ($todook ==1)
	{

		ECHO "SI SIRVE";
				$correo = $_POST["correo"];
				$pswd = $_POST["pswd"];

				while($rowProv = mysqli_fetch_array($resProv))
				{
				$idpro = $rowProv['idpro'];
				$nombreempresa = $rowProv['nombreempresa'];
				$direccion = $rowProv['direccion'];
				$correo = $rowProv['correo'];
				$telefono = $rowProv['telefono'];
				$web = $rowProv['web'];
				$idest = $rowProv['idest'];
				$pswd = $rowProv['pswd'];
				$activo  = $rowProv['activo'];
				$archivo = $rowProv['archivo'];
				$ruta = $rowProv['ruta'];
				$giro = $rowProv['giro'];
				}

				if($cuantos == 1)
				{
				//header("Location: pagina.html")
				echo "Bienvenido:" .$nombreempresa;
				}
				//else if ($nr == 0) 
				{
				//header("Location: login.html");
				//echo "No ingreso"; 
				}

}
	
	print "<meta http-equiv='refresh' content='0;url=sesiones.php?&idpro=$idpro&nombreempresa=$nombreempresa&ruta=$ruta&mensaje=$mensaje'>";
}


?>















