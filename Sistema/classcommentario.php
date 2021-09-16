
<?php

class comment 

//private solo se puede revisar desde ahí y los publicos los puedes ver desde fuera
{
	private $idcom;
	private $nombre;
	private $email;
	private $comentario;
	private $idpro;
	
					public function setidcom($idcom)
					{
					$this->idcom =$idcom;
					}
					public function getidcom()
					{
					return $this->idcom;
					}

					public function setnombre($nombre)
					{
					$this->nombre =$nombre; //referencia a esa clase
					}
					public function getnombre()
					{
					return $this->nombre;
					}
					
					public function setemail($email)
					{
					$this->email =$email; //referencia a esa clase
					}
					public function getemail()
					{
					return $this->email;
					}

					public function setcomentario($comentario)
					{
					$this->comentario =$comentario;
					}
					public function getcomentario()
					{
					return $this->comentario;
					}

					public function setidpro($idpro)
					{
					$this->idpro =$idpro;
					}
					public function getidpro()
					{
					return $this->idpro;
					}

				public function insertaComment()
					{
						$idcom = $this->idcom;
						$nombre = $this->nombre;
						$email = $this->email;
						$comentario = $this->comentario;
						$idpro = $this->idpro;

						$queryCom = "INSERT INTO comentarios (nombre,email,comentario,idpro) 
								VALUES('$nombre','$email','$comentario','$idpro')";


						$mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
						//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
						if(mysqli_connect_errno()){
							echo 'Conexion Fallida : ', mysqli_connect_error();
							exit();
						}

						$inscm = $mysqli->query($queryCom);

						
						return 1;
					}
			
}


?>
	