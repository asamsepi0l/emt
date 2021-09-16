<?php

class productosc

//private solo se puede revisar desde ahí y los publicos los puedes ver desde fuera
{
	private $idprod;
	private $nproductos;
	private $idcat;
	private $precio;
	private $activo;
	private $idmar;
	private $idpro;
	private $archivo;
	private $ruta;
	private $descrip;
	private $ram;
	private $hdd;
	private $procesador;




	public function setidmar($idmar)
					{
					$this->idmar =$idmar;
					}
					public function getidmar()
					{
					return $this->idmar;
					}


					public function setidprod($idprod)
					{
					$this->idprod =$idprod;
					}
					public function getidprod()
					{
					return $this->idprod;
					}

					public function setdescrip($descrip)
					{
					$this->descrip =$descrip;
					}
					public function getdescrip()
					{
					return $this->descrip;
					}

						public function setidpro($idpro)
					{
					$this->idpro =$idpro;
					}
					public function getidpro()
					{
					return $this->idpro;
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


					public function setnproductos($nproductos)
					{
					$this->nproductos =$nproductos;
					}
					public function getnproductos()
					{
					return $this->nproductos;
					}
					

					public function setprecio($precio)
					{
					$this->precio =$precio;
					}
					public function getprecio()
					{
					return $this->precio;
					}

					public function setidcat($idcat)
					{
					$this->idcat =$idcat;
					}
					public function getidcat()
					{
					return $this->idcat;
					}

					public function setactivo($activo)
					{
					$this->activo =$activo;
					}
					public function getactivo()
					{
					return $this->activo;
					}


					public function setram($ram)
					{
					$this->ram =$ram;
					}
					public function getram()
					{
					return $this->ram;
					}



					public function sethdd($hdd)
					{
					$this->hdd =$hdd;
					}
					public function gethdd()
					{
					return $this->hdd;
					}

					public function setprocesador($procesador)
					{
					$this->procesador =$procesador;
					}
					public function getprocesador()
					{
					return $this->procesador;
					}
					
					
				public function insertaProd()
		{
						$nproductos= $this->nproductos;
						$idcat= $this->idcat;
						$precio= $this->precio;
						$activo= $this->activo;
						$archivo = $this->archivo;
						$ruta =  $this->ruta;
						$idpro =  $this->idpro;
						$descrip =  $this->descrip;
						$idmar =  $this->idmar;
						$ram =  $this->ram;
						$hdd =  $this->hdd;
						$procesador =  $this->procesador;




			
		  
			$sql = "INSERT INTO productos (nproductos,idcat, precio ,
			                            activo,archivo,ruta, idpro, descrip, idmar, ram, hdd, procesador ) 
							      VALUES('$nproductos','$idcat', '$precio','$activo','$archivo','$ruta','$idpro', '$descrip','$idmar','$ram','$hdd','$procesador')";
			//echo $sql;
			$consulta = mysql_query($sql) or die (mysql_error());
			return 1;
			
		}
					
								
						

						public function buscarProdPoridprod()
						{
						$idprod = $this->idprod;
		$sql = "SELECT idprod, nproductos, precio, idcat, activo, ruta, archivo, idpro, descrip, idmar, ram, hdd, procesador
		FROM productos WHERE idprod=$idprod";	
						$consulta = mysql_query($sql) or die ("error de consulta ");
						$this->idprod = mysql_result($consulta,0,'idprod');
						$this->nproductos = mysql_result($consulta,0,'nproductos');
						$this->precio = mysql_result($consulta,0,'precio');
						$this->idcat = mysql_result($consulta,0,'idcat');
						$this->activo = mysql_result($consulta,0,'activo');
						$this->archivo = mysql_result($consulta,0,'archivo');
						$this->ruta = mysql_result($consulta,0,'ruta');
						$this->idpro = mysql_result($consulta,0,'idpro');
						$this->descrip = mysql_result($consulta,0,'descrip');
						$this->idmar = mysql_result($consulta,0,'idmar');
						$this->ram = mysql_result($consulta,0,'ram');
						$this->hdd = mysql_result($consulta,0,'hdd');
						$this->procesador = mysql_result($consulta,0,'procesador');


						}

						public function busca()
						{
						$idprod = $this->idprod;
		$sql = "SELECT idprod, nproductos, precio, idcat, activo, ruta, archivo, idpro, descrip, idmar
		FROM productos";	
						$consulta = mysql_query($sql) or die ("error de consulta buscarporidcli");
						$this->idprod = mysql_result($consulta,0,'idprod');
						$this->nproductos = mysql_result($consulta,0,'nproductos');
						$this->precio = mysql_result($consulta,0,'precio');
						$this->idcat = mysql_result($consulta,0,'idcat');
						$this->activo = mysql_result($consulta,0,'activo');
						$this->archivo = mysql_result($consulta,0,'archivo');
						$this->ruta = mysql_result($consulta,0,'ruta');
						$this->idpro = mysql_result($consulta,0,'idpro');
						$this->descrip = mysql_result($consulta,0,'descrip');
						$this->idmar = mysql_result($consulta,0,'idmar');

						}



public function modificaProducto()
					{


						$idprod= $this->idprod;
						$nproductos= $this->nproductos;
						$precio= $this->precio;
						$idpro =  $this->idpro;
						$descrip =  $this->descrip;
						$idmar =  $this->idmar;
						$idcat= $this->idcat;
						$archivo = $this->archivo;
						$ruta =  $this->ruta;
						$activo= $this->activo;
						$ram =  $this->ram;
						$hdd =  $this->hdd;
						$procesador =  $this->procesador;



					if($archivo=="" ){
	$sql="UPDATE productos SET idprod=idprod, nproductos='$nproductos', idcat='$idcat', precio='$precio', activo='$activo',idmar='$idmar' ,descrip='$descrip'
,ram='$ram',hdd='$hdd',procesador='$procesador'


	WHERE idprod=$idprod";

}
else{

$sql="UPDATE productos set nproductos='$nproductos'
	,idcat='$idcat', precio='$precio',activo='$activo', idmar='$idmar', archivo='$archivo', ruta= '$ruta', descrip='$descrip',ram='$ram',hdd='$hdd',procesador='$procesador'
					 
					 where idprod=$idprod";

}

	$consulta = mysql_query($sql) or die ("Khe?".mysql_error());
					}

						

public function eliminaProducto(){
				$idprod = $this->idprod;



	$sql         = "DELETE FROM productos WHERE idprod=$idprod";
				$eliminacion = mysql_query($sql) or die (mysql_error());
				echo "<center><h1>Producto eliminado</h1></center>";


			}
		
	}		







				
						
						
					


?>
	