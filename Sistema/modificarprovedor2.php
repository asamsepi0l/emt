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
                    <li class="current" ><a href="index.php"><i class="glyphicon glyphicon-home"></i>Mi perfil</a></li>
                
                    <li><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>
                    
                    
                    <li><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>

                       <li class=><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>
             
                <!-- <li><a href="serviciosExtras.php"><i class="glyphicon glyphicon-exclamation-sign"></i> Pedidos</a></li>/*/
-->
             
                  

             
                      
                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>

  




      <div class="col-md-10">




        <div class="content-box-large">
          <div class="panel-heading">
           <div class="panel-body">



<?php

$idpro=$_POST['idpro'];
$nombreempresa=$_POST['nombreempresa'];
$direccion=$_POST['direccion'];
$correo=$_POST['correo'];
$pswd=$_POST['pswd'];
$telefono=$_POST['telefono'];
$web=$_POST['web'];
$idest=$_POST['idest'];
/*/$idmun=$_POST['idmun'];/*/
$giro=$_POST['giro'];
$activo=$_POST['activo'];
$video=$_POST['video'];




include ('validacionesprovedor.php');
$validaciones=new validaciones();
$valida = "OK";

if($validaciones->validacadenas($nombreempresa)=="error")
{

	echo"<H2>El nombre es incorrecto</H2>";
	$valida="error sistema";

}

if($validaciones->validacadenas($direccion)=="error")
{

	echo"<H2>La direccion es incorrecta</H2>";
	$valida="error sistema";

}


if($validaciones->validanumero($telefono)=="error")
{

    echo"<H2>El numero de celular es incorrecto</H2>";
  $valida="error sistema";

}


if($validaciones->validaEmail($correo)=="error")
{

	echo"<H2>El correo es incorrecto</H2>";
	$valida="error sistema";

}



/*/
if($validaciones->validaweb($web)=="error")
{

	echo"<H2>El URL es incorrecto</H2>";
	$valida="error sistema";

}


if($validaciones->validaweb($web)=="")
{

    $valida="OK";

}
/*/


if ($_FILES['archivo']['name']<>"")
{
  $nombrearchivo = time().$_FILES ['archivo']['name'];
  $cortaarchivo=explode('.',$nombrearchivo);
  $extension =$cortaarchivo[1];
  //echo "<br><center>la extension del archivo es:".$extension;
  //echo "<br><center> $nombrearchivo";

  if($extension<>'jpg'
  and $extension<>'JPG'
  and $extension<>'png'
  and $extension<>'PNG'
  and $extension<>'gif'
  and $extension<>'GIF'
  and $extension<>'jpeg'
  and $extension<>'JPEG')

    {
    echo "ERROR!! El archivo no es imagen";
    $valida = "Error SISTEMA";
    }
}

else
{
$nombrearchivo = "sombra.jpg";
}


if($valida=="OK")
{





include ('classprovedor.php');
$provedores = new provedores();
$provedores->setidpro($idpro);
$provedores->setnombreempresa($nombreempresa);
$provedores->setdireccion($direccion);
$provedores->setcorreo($correo);
$provedores->setpswd($pswd);
$provedores->settelefono($telefono);
$provedores->setweb($web);
$provedores->setidest($idest);
/*/$provedores->setidmun($idmun);/*/
$provedores->setactivo($activo);
$provedores->setgiro($giro);
$provedores->setvideo($video);


if ($_FILES['archivo']['name'] =="")
{
$provedores->setarchivo("");
$provedores->setruta("");
$provedores->modificarProv();}
else
{
$nombrearchivo =  time().$_FILES ['archivo']['name'];
$provedores->setarchivo($nombrearchivo);
$provedores->setruta("ImProv/$nombrearchivo");
$provedores->modificarProv();}
move_uploaded_file($_FILES['archivo']['tmp_name'],"ImProv/$nombrearchivo");

    echo"<center><H1>¡Datos Actualizados!</H1></center><br>";







}









?>

</div>
</div>
</div>
</div>
</div>


</div>
</div>

<br>
       

</body>



<br>
         <br>
   <br>

         <br>

  <footer>
         <div class="container">
         
            <div class="copy text-center">
               El Mundo de las TIC <a href='#'>2017</a>
            </div>
            
         </div>
      </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
  <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/forms.js"></script>



  </body>
</html>