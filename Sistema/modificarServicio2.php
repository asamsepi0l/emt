<?php
session_start();
$idpro = $_SESSION['idpro'];
$nombreempresa = $_SESSION['nombreempresa'];
$ruta = $_SESSION['ruta'];




if($idpro=='' or $nombreempresa == '' or $ruta == '')
{
$mensaje = "Es necesario loguearse";
print "<meta http-equiv='refresh' content='0;url=login.php?mensaje=$mensaje'>";
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


  
  <div class="header">
       <div class="container">
          <div class="row">
             <div class="col-md-5">
                <!-- Logo -->
                 <div class="logo">
                   <h1><a href="index.php">Bienvenido <?php echo "$nombreempresa"; ?></a></h1> 
                </div>
             </div>
             <div class="col-md-5">
                <div class="row">
                
                </div>
             </div>
             <div class="col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                      <ul class="nav navbar-nav">
                        <li class="current"><a href="productos.php"><i class="glyphicon glyphicon-star"></i></a></li>
             
                  
                          </ul>
                        </li>
                      </ul>
                    </nav>
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
include ('conexion.php');
$conexion = new conexion();
$conexion->conecta();
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
  echo "<center><h4><b>$nombreempresa</b></h4></center><br>";

echo "<tr><td><img class='img-responsive' src ='$ruta'></td></tr>";
    }

echo "</table>";

}
?>            
</div> 


        <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li ><a href="index.php"><i class="glyphicon glyphicon-home"></i>Mi perfil</a></li>
                
                    <li><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>
                    
                    
                    <li><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>

                                          <li><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>

     <li class="current"><a href="serviciosExtras.php"><i class="glyphicon glyphicon-star"></i> Servicios Extras</a></li>



             
                   
                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>



      <div class="col-md-10">






        


    <!-- Tablas (SELECT * CLIENTES) -->

        <div class="content-box-large">
          <div class="panel-heading">
           <div class="panel-body">
            <div class="table-responsive">


<?php

$idcat=$_POST['idcat'];
$nctat=$_POST['nctat'];
$activo=$_POST['activo'];
$idpro=$_POST['idpro'];
$descripciones=$_POST['descripciones'];





include ('validacionesproducto.php');
$validaciones=new validaciones();
$valida = "OK";

if($validaciones->validacadenas($nctat)=="error")
{
	
	echo"<H2>La categoría es incorrecta</H2>";
$valida="Error de registro";	
}

if($validaciones->validacadenas($descripciones)=="error")
{
  
  echo"<H2>La descripcion es incorrecta</H2>";
$valida="Error de registro";  
}





if($valida=="OK")
{

  

include('classServicios.php');
$servicios = new servicios();
$servicios->setnctat($nctat);
$servicios->setidcat($idcat);
$servicios->setidcat($idcat);
$servicios->setactivo($activo);
$servicios->setidpro($idpro);
$servicios->setdescripciones($descripciones);
$servicios->setidpro($idpro);
$servicios->modificaServicio();





}

if ($valida =="OK"){

 echo"<center><H1>Servicio de venta modificado</H1></center>";

  echo "<tr><td><center><img class='img-responsive' src ='imagenes/ok.gif'></center></td></tr>";
   }







?>



</div>
</div>
</div>
</div>
</div>
</div>


</body>
</html>
