<?php

class provedores {

	private $idpro;
	private $nombreempresa;
	private $direccion;
	private $correo;
	private $telefono;
	private $activo;
	private $web;
	private $idest;
	private $pswd;
	private $archivo;
	private $ruta;
	private $giro;
	private $estado;
	private $video;

	
					public function setactivo($activo)
			        {
			        $this->activo =$activo;
			        }
			        public function getactivo()
			        {
			        return $this->activo;
			        }

			        public function setestado($estado)
			        {
			        $this->estado =$estado;
			        }
			        public function getestado()
			        {
			        return $this->estado;
			        }

			        public function setgiro($giro)
			        {
			        $this->giro =$giro;
			        }
			        public function getgiro()
			        {
			        return $this->giro;
			        }

					public function setidpro($idpro)
					{
					$this->idpro =$idpro;
					}
					public function getidpro()
					{
					return $this->idpro;
					}

						public function setvideo($video)
					{
					$this->video =$video;
					}
					public function getvideo()
					{
					return $this->video;
					}

					public function setnombreempresa($nombreempresa)
					{
					$this->nombreempresa =$nombreempresa;
					}
					public function getnombreempresa()
					{
					return $this->nombreempresa;
					}
					
							

					public function setdireccion($direccion)
					{
					$this->direccion =$direccion;
					}
					public function getdireccion()
					{
					return $this->direccion;
					}

					public function setcorreo($correo)
					{
					$this->correo =$correo;
					}
					public function getcorreo()
					{
					return $this->correo;
					}

					public function settelefono($telefono)
					{
					$this->telefono =$telefono;
					}
					public function gettelefono()
					{
					return $this->telefono;
					}
					
					
						public function setweb($web)
					{
					$this->web =$web;
					}
					public function getweb()
					{
					return $this->web;
					}
					
						public function setidest($idest)
					{
					$this->idest =$idest;
					}
					public function getidest()
					{
					return $this->idest;
					}

						public function setpswd($pswd)
					{
					$this->pswd =$pswd;
					}
					public function getpswd()
					{
					return $this->pswd;
					}



					public function setarchivo($archivo)
					{
					$this->archivo =$archivo; //referencia a esa clase
					}
					public function getarchivo()
					{
					return $this->archivo;
					}
					
					
					public function setruta($ruta)
					{
					$this->ruta =$ruta; //referencia a esa clase
					}
					public function getruta()
					{
					return $this->ruta;
					}



			
						public function insertaProv()

						


						{
							$idpro = $this->idpro;
							$nombreempresa = $this->nombreempresa;
							$direccion = $this->direccion;
							$correo = $this->correo;
							$telefono = $this->telefono;
							$web = $this->web;
							$idest = $this->idest;
							$pswd = $this->pswd;
							$activo = $this->activo;
							$archivo = $this->archivo;
							$ruta = $this->ruta;
							$giro = $this->giro;
			
							$queryProv = "SELECT * FROM provedores WHERE idpro = '$idpro'";
							
							$mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
							//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
							if(mysqli_connect_errno()){
							echo 'Conexion Fallida : ', mysqli_connect_error();
							exit();
							}


							$resProv = $mysqli->query($queryProv);
							$cuantos = mysqli_num_rows($resProv);

						
			
							if ($cuantos== 0)
							{
							$insProv = "INSERT INTO provedores 
									(nombreempresa, direccion, correo, telefono, web, idest, pswd, activo, archivo, ruta, giro) 
											VALUES('$nombreempresa','$direccion', '$correo','$telefono','$web',
			 										$idest, '$pswd', '$activo' ,'$archivo','$ruta', '$giro')";
							//echo $sql;
							$resIns = $mysqli->query($insProv);
							return 1;
							}
							else
							{
							return 0;
							}
						}



					public function buscausuarioporuserypassw()
						{
							$mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
						//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
						if(mysqli_connect_errno()){
						echo 'Conexion Fallida : ', mysqli_connect_error();
						exit();
						}
						$correo = $this->correo;
						$pswd = $this->pswd;

						$queryProv = "SELECT * FROM provedores WHERE correo= '$correo' 
						AND pswd= '$pswd' AND activo = 'SI'";
		
						$resIns = $mysqli->query($queryProv);
						$cuantos = mysqli_num_rows($resIns);
		
		
						if ($cuantos==0)
						{
						return 0;
						}	
						else
						{

						while($rowProv = mysqli_fetch_array($resIns))
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
						}
						}
	
	public function buscaEstado()
	{
							$estado = $this->estado;
							$idest = $this->idest;
			$sql = "SELECT estado FROM estado";	


									$consulta = mysql_query($sql) or die ("error de consulta buscarporidpro");
										$this->estado = mysql_result($consulta,0,'estado');
						}



	public function buscarporidpro()
	{
							$idpro = $this->idpro;

			$sql = "SELECT idpro, nombreempresa, direccion, correo, telefono, web, idest, activo, archivo, ruta, giro, pswd, video
	FROM provedores WHERE idpro=$idpro
	ORDER BY idpro";	


									$consulta = mysql_query($sql) or die ("error de consulta buscarporidpro");
										$this->idpro = mysql_result($consulta,0,'idpro');
										$this->nombreempresa = mysql_result($consulta,0,'nombreempresa');
										$this->direccion = mysql_result($consulta,0,'direccion');
										$this->correo = mysql_result($consulta,0,'correo');
										$this->pswd = mysql_result($consulta,0,'pswd');

										$this->telefono = mysql_result($consulta,0,'telefono');
									    $this->web = mysql_result($consulta,0,'web');
									    $this->idest = mysql_result($consulta,0,'idest');
										$this->activo = mysql_result($consulta,0,'activo');
										$this->archivo = mysql_result($consulta,0,'archivo');
						$this->ruta = mysql_result($consulta,0,'ruta');
						$this->giro = mysql_result($consulta,0,'giro');
												$this->video = mysql_result($consulta,0,'video');

						
						
						}



					public function modificarProv()
					{


						$idpro= $this->idpro;
						$nombreempresa= $this->nombreempresa;
						$direccion= $this->direccion;
						$correo= $this->correo;
						$telefono= $this->telefono;
						$web= $this->web;
						$idest= $this->idest;
						$video= $this->video;
						$pswd= $this->pswd;
						$activo= $this->activo;
						$archivo = $this->archivo;
						$ruta =  $this->ruta;
						$giro =  $this->giro;

if($archivo=="" ){

						
						
						
						$sql="UPDATE provedores set idpro=$idpro, nombreempresa='$nombreempresa'
						,direccion='$direccion', correo='$correo',telefono='$telefono'
						,web='$web', idest='$idest', pswd='$pswd', activo='$activo', giro='$giro', video='$video'
						where idpro=$idpro";
					}

					else{

$sql="UPDATE provedores set 
idpro=$idpro, nombreempresa='$nombreempresa'
						,direccion='$direccion', correo='$correo',telefono='$telefono'
						,web='$web', idest='$idest', pswd='$pswd', activo='$activo',
archivo='$archivo', ruta= '$ruta', giro='$giro', video='$video'			 
					 where idpro=$idpro";

}


						$consulta = mysql_query($sql) or die ("Khe?".mysql_error());
					}

										
									}	









//private solo se puede revisar desde ahí y los publicos los puedes ver desde fuera

	

							

	
?>
	