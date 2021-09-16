<?php

class servicios

//private solo se puede revisar desde ahí y los publicos los puedes ver desde fuera
{
	private $idcat;
	private $nctat;
	private $precio;
	private $activo;
	private $idmar;
	private $idpro;
	private $archivo;
	private $ruta;
	private $descripciones;




	public function setidmar($idmar)
					{
					$this->idmar =$idmar;
					}
					public function getidmar()
					{
					return $this->idmar;
					}


					public function setidcat($idcat)
					{
					$this->idcat =$idcat;
					}
					public function getidcat()
					{
					return $this->idcat;
					}

					public function setdescripciones($descripciones)
					{
					$this->descripciones =$descripciones;
					}
					public function getdescripciones()
					{
					return $this->descripciones;
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


					public function setnctat($nctat)
					{
					$this->nctat =$nctat;
					}
					public function getnctat()
					{
					return $this->nctat;
					}
					

					public function setprecio($precio)
					{
					$this->precio =$precio;
					}
					public function getprecio()
					{
					return $this->precio;
					}

				

					public function setactivo($activo)
					{
					$this->activo =$activo;
					}
					public function getactivo()
					{
					return $this->activo;
					}
					
					
				public function insertarServicio()
		{
			$idcat= $this->idcat;
						$nctat= $this->nctat;
						$activo= $this->activo;
						$idpro =  $this->idpro;
						$descripciones =  $this->descripciones;



			
		  
			$sql = "INSERT INTO categorias (nctat, 
			                            activo,descripciones,idpro ) 
							      VALUES('$nctat','$activo', '$descripciones', $idpro)";
			//echo $sql;
			$consulta = mysql_query($sql) or die (mysql_error());
			return 1;
			
		}
					
								
						

						public function buscarporidcat()
						{
						$idcat = $this->idcat;
												

		$sql = "SELECT idcat, nctat, activo, descripciones, idpro
		FROM categorias WHERE idcat=$idcat";	
						
						$consulta = mysql_query($sql) or die ("error ");
						$this->idcat = mysql_result($consulta,0,'idcat');
						$this->nctat = mysql_result($consulta,0,'nctat');
						$this->activo = mysql_result($consulta,0,'activo');
						$this->descripciones = mysql_result($consulta,0,'descripciones');
						$this->idpro = mysql_result($consulta,0,'idpro');

						}

					



public function modificaServicio()
					{


						$idcat= $this->idcat;
						$nctat= $this->nctat;
						$idpro =  $this->idpro;
						$descripciones =  $this->descripciones;
						$activo= $this->activo;




					if($idcat=="$idcat" ){
	$sql="UPDATE categorias SET idcat=idcat, nctat='$nctat', activo='$activo' ,descripciones='$descripciones',idpro='$idpro'
	WHERE idcat=$idcat";



	$consulta = mysql_query($sql) or die ("Khe?".mysql_error());
					}
}
						



public function eliminarServicio(){
			$idcat = $this->idcat;
			$sql      = "SELECT COUNT(*) FROM productos WHERE idcat=$idcat";
			$consulta = mysql_query($sql) or die (mysql_errno());
			$cuantos  = mysql_result($consulta, 0);

			if ($cuantos == 0) {

				// ELIMINACIÓN FÍSICA
				$sql         = "DELETE FROM categorias WHERE idcat=$idcat";
				$eliminacion = mysql_query($sql) or die (mysql_error());
				echo "<center><h1>Categoría eliminada</h1></center>";
			
			}
			elseif ($cuantos > 0) {

				// ELIMINACIÓN LÓGICA
				$sql         = "UPDATE nctat SET activo='NO' WHERE idcat=$idcat";
				$eliminacion = mysql_query($sql) or die (mysql_error());
				echo "<center><h1>Categoría deshabilitada, (está activa en Productos)</h1></center>";
			}
		}

}

						
						
					


?>
	