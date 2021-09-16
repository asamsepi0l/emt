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
                 <li class="current"><a href="marcas.php"><i class="glyphicon glyphicon-star"></i></a></li>

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

           <div class="content-box-large">
       <h1>Deshabilitar Servicio</h1>
          <div class="panel-body">
            <div class="table-responsive">



<!--
<h5>Si la marca se encuentra Activa, al momento de eliminar, quedará como No Activa.<h5>
<h5>Si la marca se encuentra No Activa, la eliminación podrá completarse.<h5>
-->

<?php

$idcat = $_GET['idcat'];
include ('classServicios.php');
$servicios = new servicios();
$servicios->setidcat($idcat);
$servicios->buscarporidcat();
$nctat = $servicios->getnctat();
$activo = $servicios->getactivo();





echo "<h2>El servicio a Deshabilitar es:  $nctat <h2> ";
echo "<h2>Activo: $activo  <h2> ";
echo "Regresar<a href='serviciosExtras.php'</a>  <button class='glyphicon glyphicon-arrow-left'><i></i></button> </a></li>
    Eliminar <a href='elimina_servicio1.php?idcat=$idcat'</a> <button class='btn btn-default btn-xs'><i class='glyphicon glyphicon-pencil'></i></button> </a></li>";





?>

</div>
</div>
</div>
</div>
</div>
</div>

</body>



    <footer>
         <div class="container">
         
            <div class="copy text-center">
               La Joya <a href='#'>2016</a>
            </div>
            
         </div>
      </footer>

      <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>
  </body>
</html>

</html>
