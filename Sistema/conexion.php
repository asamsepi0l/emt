<?php
//crear una clase que se recomienda se llame igual que el archivo 
class conexion
{
	//se crea el metodo COnecta, el cual se encargara de conectar a la BAse de datos
	public function conecta()
	{
		$mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
		//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
		if(mysqli_connect_errno()){
			echo 'Conexion Fallida : ', mysqli_connect_error();
			exit();
		}

		
	}
}
?>