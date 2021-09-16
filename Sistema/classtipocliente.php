<?php

class tipocc

//private solo se puede revisar desde ahí y los publicos los puedes ver desde fuera
{
	private $idtipo;
	private $ctipo;
	private $idcat;
	private $precio;
	private $activo;
	private $idmar;
	private $idpro;
	private $archivo;
	private $ruta;
	private $descripcion;




	public function setidmar($idmar)
					{
					$this->idmar =$idmar;
					}
					public function getidmar()
					{
					return $this->idmar;
					}


					public function setidtipo($idtipo)
					{
					$this->idtipo =$idtipo;
					}
					public function getidtipo()
					{
					return $this->idtipo;
					}

					public function setdescripcion($descripcion)
					{
					$this->descripcion =$descripcion;
					}
					public function getdescripcion()
					{
					return $this->descripcion;
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


					public function setctipo($ctipo)
					{
					$this->ctipo =$ctipo;
					}
					public function getctipo()
					{
					return $this->ctipo;
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
					
					
				public function insertaTipoc()
		{
			$idtipo= $this->idtipo;
						$ctipo= $this->ctipo;
						$activo= $this->activo;
						$idpro =  $this->idpro;
						$descripcion =  $this->descripcion;



			
		    $sql2 = "SELECT * FROM tipocliente WHERE idtipo = $idtipo";
			$consulta2 = mysql_query($sql2) or die ("Error de consulta");
			$cuantos = mysql_num_rows($consulta2);
			if ($cuantos== 0)
			{
			$sql = "INSERT INTO tipocliente (idtipo,ctipo, 
			                            activo,descripcion,idpro ) 
							      VALUES($idtipo,'$ctipo','$activo', '$descripcion', '$idpro')";
			//echo $sql;
			$consulta = mysql_query($sql) or die (mysql_error());
			return 1;
			}
			else
			{
			return 0;
			}
		}
					
								
						

						public function buscarporidtipo()
						{
						$idtipo = $this->idtipo;
												$idpro = $this->idpro;


		$sql = "SELECT idtipo, ctipo, activo, descripcion, idpro
		FROM tipocliente WHERE idtipo=$idtipo";	
						
						$consulta = mysql_query($sql) or die ("error ");
						$this->idtipo = mysql_result($consulta,0,'idtipo');
						$this->ctipo = mysql_result($consulta,0,'ctipo');
						$this->activo = mysql_result($consulta,0,'activo');
						$this->descripcion = mysql_result($consulta,0,'descripcion');
						$this->idpro = mysql_result($consulta,0,'idpro');

						}

					



public function modificaProducto()
					{


						$idtipo= $this->idtipo;
						$ctipo= $this->ctipo;
						$precio= $this->precio;
						$idpro =  $this->idpro;
						$descripcion =  $this->descripcion;
						$idmar =  $this->idmar;
						$idcat= $this->idcat;
						$archivo = $this->archivo;
						$ruta =  $this->ruta;
						$activo= $this->activo;




					if($archivo=="" ){
	$sql="UPDATE productos SET idtipo=idtipo, ctipo='$ctipo', idcat='$idcat', precio='$precio', activo='$activo',idmar='$idmar' ,descripcion='$descripcion'
	WHERE idtipo=$idtipo";

}
else{

$sql="UPDATE productos set ctipo='$ctipo'
	,idcat='$idcat', precio='$precio',activo='$activo', idmar='$idmar', archivo='$archivo', ruta= '$ruta', descripcion='$idtipo'					 
					 where idtipo=$idtipo";

}

	$consulta = mysql_query($sql) or die ("Khe?".mysql_error());
					}

						

public function eliminaProducto(){
				$idtipo = $this->idtipo;
				$idpro = $this->idpro;


/*/$sql      = "SELECT COUNT(*) FROM productos WHERE activo='NO' and idpro=$idpro";
			$consulta = mysql_query($sql) or die (mysql_errno());
			$cuantos  = mysql_result($consulta, 0);

			if ($cuantos > 0) {/*/

			
			// ELIMINACIÓN FÍSICA
				$sql         = "DELETE FROM productos WHERE idtipo=$idtipo
				";
				$eliminacion = mysql_query($sql) or die (mysql_error());
				echo "<center><h1>Producto eliminado</h1></center>";


			}
		
	}		

			/*/if ($cuantos == 0   ) {

	
				// ELIMINACIÓN LÓGICA
				$sql         = "UPDATE productos SET activo='NO' WHERE idtipo=$idtipo and idpro=$idpro";
				$eliminacion = mysql_query($sql) or die (mysql_error());
				echo "<center><h1>Producto deshabilitado (Estaba Activo)</h1></center>";
			

			}/*/






				
						
						
					


?>
	