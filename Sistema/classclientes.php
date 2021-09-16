	<?php

class clientes 

//private solo se puede revisar desde ahí y los publicos los puedes ver desde fuera
{
	private $idcli;
	private $nombrecli;
	private $appcliente;
	private $sexo;
	private $emailcli;
	private $ntelcli;
	private $idtipo;
	private $activo;
	private  $archivo;
	private  $ruta;
	private  $idpro;


					public function setidpro($idpro)
					{
					$this->idpro =$idpro;
					}
					public function getidpro()
					{
					return $this->idpro;
					}

					public function setidcli($idcli)
					{
					$this->idcli =$idcli;
					}
					public function getidcli()
					{
					return $this->idcli;
					}

					public function setnombrecli($nombrecli)
					{
					$this->nombrecli =$nombrecli;
					}
					public function getnombrecli()
					{
					return $this->nombrecli;
					}
					
					public function setappcliente($appcliente)
					{
					$this->appcliente =$appcliente;
					}
					public function getappcliente()
					{
					return $this->appcliente;
					}
					
					public function setsexo($sexo)
					{
					$this->sexo =$sexo;
					}
					public function getsexo()
					{
					return $this->sexo;
					}
					
					
					public function setemailcli($emailcli)
					{
					$this->emailcli =$emailcli;
					}
					public function getemailcli()
					{
					return $this->emailcli;
					}
					
					
					public function setntelcli($ntelcli)
					{
					$this->ntelcli =$ntelcli;
					}
					public function getntelcli()
					{
					return $this->ntelcli;
					}

				
					
					public function setctipo($ctipo)
					{
					$this->ctipo =$ctipo;
					}
					public function getctipo()
					{
					return $this->ctipo;
					}
					

					public function setactivo($activo)
					{
					$this->activo =$activo;
					}
					public function getactivo()
					{
					return $this->activo;
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

	



public function eliminarCliente(){
			$idcli = $this->idcli;
						$idpro = $this->idpro;


			/*/$sql      = "SELECT COUNT(*) FROM clientes WHERE activo='NO' and idpro=$idpro";
			$consulta = mysql_query($sql) or die (mysql_errno());
			$cuantos  = mysql_result($consulta, 0);


		
			if ($cuantos > 0) {/*/

			
			// ELIMINACIÓN FÍSICA
				$sql         = "DELETE FROM clientes WHERE idcli=$idcli and idpro=$idpro";
				$eliminacion = mysql_query($sql) or die (mysql_error());
				echo "<center><h1>Cliente eliminado</h1><br></center>";


			/*/}

			if ($cuantos == 0   ) {

	
				// ELIMINACIÓN LÓGICA
				$sql         = "UPDATE clientes SET activo='NO' WHERE idcli=$idcli and idpro=$idpro";
				$eliminacion = mysql_query($sql) or die (mysql_error());
				echo "<center><h1>Cliente deshabilitado (Estaba Activo)</h1></center>";
			

			}/*/
		}



					
						public function insertaCliente()
		{
			$nombrecli = $this->nombrecli;
			$appcliente = $this->appcliente;
			$sexo = $this->sexo;
			$ntelcli = $this->ntelcli;
			$emailcli = $this->emailcli;
			$activo = $this->activo;
			$archivo = $this->archivo;
			$ruta = $this->ruta;
			$idpro = $this->idpro;


		
			$sql = "INSERT INTO clientes (nombrecli,appcliente, sexo ,ntelcli,emailcli,
			                            activo,archivo,ruta, idpro) 
							      VALUES('$nombrecli','$appcliente', '$sexo','$ntelcli','$emailcli','$activo','$archivo','$ruta','$idpro')";
			//echo $sql;
			$consulta = mysql_query($sql) or die (mysql_error());
			return 1;
			
		}

						public function buscarclienteporidcli()
						{
						$idcli = $this->idcli;
		$sql = "SELECT idcli, nombrecli, appcliente, sexo, emailcli, ntelcli, activo, ruta, archivo, idpro
		FROM clientes WHERE idcli=$idcli";	
						$consulta = mysql_query($sql) or die ("error de consulta buscarporidcli");
						$this->idcli = mysql_result($consulta,0,'idcli');
						$this->nombrecli = mysql_result($consulta,0,'nombrecli');
						$this->appcliente = mysql_result($consulta,0,'appcliente');
						$this->sexo = mysql_result($consulta,0,'sexo');
						$this->emailcli = mysql_result($consulta,0,'emailcli');
						$this->ntelcli = mysql_result($consulta,0,'ntelcli');
						$this->activo = mysql_result($consulta,0,'activo');
						$this->archivo = mysql_result($consulta,0,'archivo');
						$this->ruta = mysql_result($consulta,0,'ruta');
						$this->idpro = mysql_result($consulta,0,'idpro');

						}
						

						public function modificarCliente()
					{


						$idcli= $this->idcli;
						$nombrecli= $this->nombrecli;
						$appcliente= $this->appcliente;
						$sexo= $this->sexo;
						$ntelcli= $this->ntelcli;
						$activo= $this->activo;
						$emailcli= $this->emailcli;
						$archivo = $this->archivo;
						$ruta =  $this->ruta;


if($archivo=="" ){
	$sql="UPDATE clientes set idcli=$idcli, nombrecli='$nombrecli'
	,appcliente='$appcliente', ntelcli='$ntelcli', emailcli='$emailcli',sexo='$sexo',activo='$activo'
	where idcli=$idcli";

}
else{

$sql="UPDATE clientes set idcli=$idcli, nombrecli='$nombrecli'
	,appcliente='$appcliente', ntelcli='$ntelcli', emailcli='$emailcli',sexo='$sexo', activo='$activo',archivo='$archivo', ruta= '$ruta'		 
					 where idcli=$idcli";

}



	$consulta = mysql_query($sql) or die ("Khe?".mysql_error());
}

	
public function insertComment()
		{
			$nombrecli = $this->nombrecli;
			$appcliente = $this->appcliente;
			$sexo = $this->sexo;
			$ntelcli = $this->ntelcli;
			$emailcli = $this->emailcli;
			$activo = $this->activo;
			$archivo = $this->archivo;
			$ruta = $this->ruta;
			$idpro = $this->idpro;


		
			$sql = "INSERT INTO clientes (nombrecli,appcliente, sexo ,ntelcli,emailcli,
			                            activo,archivo,ruta, idpro) 
							      VALUES('$nombrecli','$appcliente', '$sexo','$ntelcli','$emailcli','$activo','$archivo','$ruta','$idpro')";
			//echo $sql;
			$consulta = mysql_query($sql) or die (mysql_error());
			return 1;
			
		}

						
					

}	
?>
	