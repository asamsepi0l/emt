
<?php

class marcas 

//private solo se puede revisar desde ahí y los publicos los puedes ver desde fuera
{
	private $idmar;
	private $nmarcas;
	private $detalle;
	private $activo;
	private $archivo;
	private $ruta;
	private $idpro;

	
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


					public function setidmar($idmar)
					{
					$this->idmar =$idmar;
					}
					public function getidmar()
					{
					return $this->idmar;
					}

					public function setnmarcas($nmarcas)
					{
					$this->nmarcas =$nmarcas;
					}
					public function getnmarcas()
					{
					return $this->nmarcas;
					}
					
					public function setdetalle($detalle)
					{
					$this->detalle =$detalle;
					}
					public function getdetalle()
					{
					return $this->detalle;
					}
					
					

					public function setactivo($activo)
					{
					$this->activo =$activo;
					}
					public function getactivo()
					{
					return $this->activo;
					}
					
					


				public function insertaMarca()
		{
			$idmar = $this->idmar;
			$nmarcas = $this->nmarcas;
			$detalle = $this->detalle;
			$activo = $this->activo;
			$archivo = $this->archivo;
			$ruta = $this->ruta;
			$idpro = $this->idpro;


			
		   			$sql = "INSERT INTO marcas (nmarcas,detalle,
			                            activo,archivo,ruta, idpro) 
							      VALUES('$nmarcas','$detalle', '$activo','$archivo','$ruta','$idpro')";
			//echo $sql;
			$consulta = mysql_query($sql) or die (mysql_error());
			return 1;
			}
			
			
		

						

						public function buscarmarcaporidmar()
						{
						$idmar = $this->idmar;
		$sql = "SELECT idmar, nmarcas, detalle, activo, ruta
		FROM marcas WHERE idmar=$idmar";	
					$consulta = mysql_query($sql) or die ("error de consulta buscarmarcaporidmar");
						$this->idmar = mysql_result($consulta,0,'idmar');
						$this->nmarcas = mysql_result($consulta,0,'nmarcas');
						$this->detalle = mysql_result($consulta,0,'detalle');
						$this->activo = mysql_result($consulta,0,'activo');
						$this->ruta = mysql_result($consulta,0,'ruta');

				
					}	

						
				

											public function modificarMarca()
					{


						$idmar= $this->idmar;
						$nmarcas= $this->nmarcas;
						$detalle= $this->detalle;
						$activo= $this->activo;
						$archivo = $this->archivo;
						$ruta =  $this->ruta;


if($archivo=="" ){
	$sql="UPDATE marcas set idmar=$idmar, nmarcas='$nmarcas'
						,detalle='$detalle', activo='$activo'
						where idmar=$idmar";

}
else{

$sql="UPDATE marcas set idmar=$idmar, nmarcas='$nmarcas'
						,detalle='$detalle', activo='$activo'
						, idmar=$idmar ,archivo='$archivo', ruta= '$ruta' WHERE idmar=$idmar";

}



	$consulta = mysql_query($sql) or die ("Khe?".mysql_error());
}


		
			public function eliminaMarca(){
			$idmar = $this->idmar;

			$sql      = "SELECT COUNT(*) FROM productos WHERE idmar=$idmar";
			$consulta = mysql_query($sql) or die (mysql_errno());
			$cuantos  = mysql_result($consulta, 0);

			if ($cuantos == 0) {

				// ELIMINACIÓN FÍSICA
				$sql         = "DELETE FROM marcas WHERE idmar=$idmar";
				$eliminacion = mysql_query($sql) or die (mysql_error());
				echo "<center><h1>Marca eliminada</h1></center>";
			
			}
			elseif ($cuantos > 0) {

				// ELIMINACIÓN LÓGICA
				$sql         = "UPDATE marcas SET activo='NO' WHERE idmar=$idmar";
				$eliminacion = mysql_query($sql) or die (mysql_error());
				echo "<center><h1>Marca deshabilitada<br></h1> <h2>(está activa en Productos)</h2></center>";
			}
		}
			


		}




?>
	