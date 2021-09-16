<?php
session_start();
$idpro = $_SESSION['idpro'];
$nombreempresa = $_SESSION['nombreempresa'];
$ruta = $_SESSION['ruta'];


if($idpro=='' or $nombreempresa == '' or $ruta == '')
{
$mensaje = "Es necesario loguearse";
print "<meta http-equiv='refresh' content='0;url=/registro.php?mensaje=$mensaje'>";
$todook= 0;
}


?>



<!DOCTYPE html>
<html>
  <head>
    <title>El mundo de las TIC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />


    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">


</script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style>

.video-responsive {
position: relative;
padding-bottom: 56.25%; /* 16/9 ratio */
padding-top: 30px; /* IE6 workaround*/
height: 0;
overflow: hidden;
}
 
.video-responsive iframe,
.video-responsive object,
.video-responsive embed {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}
</style>
    
  </head>
  <body background="bgimage.jpg">


  <div class="header">
       <div class="container">
          <div class="row">
             <div class="col-sm-10, col-md-10">
                <!-- Logo -->
               <div class="logo">
                   <h1><a href="index.php"> <?php
include ('conexion.php');
$conexion = new conexion();
$conexion->conecta();
$sql1 = "SELECT  nombreempresa
FROM provedores
WHERE idpro = $idpro
ORDER BY idpro";
$consulta1 = mysql_query($sql1) or die ("Error de consulta");
$cuantos1 = mysql_num_rows($consulta1);

//aqui se muestra mensaje si hay caracteres no validos

//

for($y=0;$y<$cuantos1;$y++)
  {
$nombreempresa = mysql_result ($consulta1,$y,'nombreempresa');
  echo "Bienvenido $nombreempresa";

    }




                    ?></a></h1>
                </div>
             </div>
        
     <br> 
             <div class="col-sm-2, col-md-2">

     <div style="" class="btn-group">
                  <a  type="button" class="btn btn-primary btn-sm" href="/index.php"  >Inicio</a></li>
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="logout.php">Salir</a></li>


                    </ul><br><br>
                  </div>
                  </div>

    </div>
    </div>
    </div>


    <div class="page-content">
      <div class="row">
      <div class="col-md-2">

<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
<?php

$sql1 = "SELECT ruta, nombreempresa 
FROM provedores
WHERE idpro = $idpro
ORDER BY idpro";
$consulta1 = mysql_query($sql1) or die ("Error de consulta");
$cuantos1 = mysql_num_rows($consulta1);

//aqui se muestra mensaje si hay caracteres no validos
if($cuantos1==0)
{
echo "<br>Foto";
}
//
else
{
for($y=0;$y<$cuantos1;$y++)
  {
$nombreempresa = mysql_result ($consulta1,$y,'nombreempresa');
$ruta = mysql_result($consulta1,$y,'ruta');

echo "<tr><td><img class='img-responsive' src ='$ruta'></td></tr>";
    }

echo "</table>";

}
?>            
</div>
  

        <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i>Mi perfil</a></li>
                
                    <li  class="current" ><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>
                    
                    
                    <li><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>

                <li class=><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>

             
                  
                   

                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>






      <div class="col-md-10">






        


    <!-- Tablas (SELECT * CLIENTES) -->

        <div class="content-box-large">
       
<?php

$idcli=$_POST['idcli'];
$nombrecli=$_POST['nombrecli'];
$appcliente=$_POST['appcliente'];
$sexo=$_POST['sexo'];
$emailcli=$_POST['emailcli'];
$ntelcli=$_POST['ntelcli'];
//$idtipo=$_POST['idtipo'];
$activo=$_POST['activo'];
$idpro=$_POST['idpro'];


include ('validaciones.php');
$validaciones=new validaciones();
$valida = "OK";

if($validaciones->validacadenas($nombrecli)=="error")
{
	
	echo"<H2>El nombre es incorrecto</H2>";
	$valida="error sistema";
	
}



if($validaciones->validacadenas($appcliente)=="error")
{
	
	echo"<H2>El apellido es incorrecto</H2>";
	$valida="error sistema";
	
}


if($validaciones->validanumero($ntelcli)=="error")
{
	
		echo"<H2>El numero de celular es incorrecto</H2>";
	$valida="error sistema";
	
}



if($validaciones->validaEmail($emailcli)=="error")
{
	
	echo"<H2>El correo es incorrecto</H2>";
	$valida="error sistema";
	
}

if ($_FILES['archivo']['name']<>"")
{
  $nombrearchivo = time().$_FILES ['archivo']['name'];
  $cortaarchivo=explode('.',$nombrearchivo);
  $extension =$cortaarchivo[1];
  //echo "<br><center>la extension del archivo es:".$extension;
  //echo "<br><center> $nombrearchivo";

  if($extension<>'jpg' and $extension<>'png' and $extension<>'gif' and $extension<>'jpeg' and $extension<>'JPG' and $extension<>'PNG' and $extension<>'JPEG')
    { 
    echo "ERROR El archivo no es imagen";
    $valida = "Error SISTEMA";
    }
}

if ($valida =="OK")
{

include('classclientes.php');
$clientes = new clientes();
$clientes->setidcli($idcli);
$clientes->setnombrecli($nombrecli);
$clientes->setappcliente($appcliente);
$clientes->setsexo($sexo);
$clientes->setemailcli($emailcli);
$clientes->setntelcli($ntelcli);
//$clientes->setidtipo($idtipo);
$clientes->setactivo($activo);
$clientes->setidpro($idpro);

if ($_FILES['archivo']['name'] =="")
{
$clientes->setarchivo("");
$clientes->setruta("");
$clientes->modificarCliente();
}
else
{
$nombrearc =  time().$_FILES ['archivo']['name'];
$clientes->setarchivo($nombrearc);
$clientes->setruta("ImMar/$nombrearc");
$clientes->modificarCliente();
move_uploaded_file($_FILES['archivo']['tmp_name'],"ImMar/$nombrearc");
}

}


if ($valida =="OK"){
echo"<br><br>


 <center><H1>¡Datos Actualizados!</H1></center>
<br>
<br>


 ";

   }

?>

</div>
</div>

</div>

</body>

<br>
<br>
<br>
<br>
<br><br>

<footer>
         <div class="container">
         
            <div class="copy text-center">
               El Mundo de las TIC <a href='#'>2017</a>
            </div>
            
         </div>
      </footer>


</html>
