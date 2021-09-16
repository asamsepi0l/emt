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
               <div class="col-md-7">
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
               <div class="col-md-4">

                  <div class="navbar navbar-inverse" role="banner">
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">

                  <div class="btn-group">
                      <br><button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown">
                        Cerrar Sesión <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="logout.php">Salir</a></li>
                      </ul>
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
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i>Mi perfil</a></li>

                    <li ><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>


                    <li><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>


                  <li class="current" ><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>


                    <li><a href="serviciosExtras.php"><i class="glyphicon glyphicon-star"></i> Servicios Extras</a></li>




                </ul>
                    </li>
                </ul>
             </div>
      </div>






      <div class="col-md-10">









    <!-- Tablas (SELECT * CLIENTES) -->

        <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">Alta de Marcas</div>
        </div>
          <div class="panel-body">
            <div class="table-responsive">



            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">




<form action ='alta_marca2.php' method = 'POST' enctype='multipart/form-data'>

<tr><td>Clave </td><td><input required class='form-control' type = 'text' name = 'idmar' >
</td></tr>
<tr><td>Marca</td><td><input required class='form-control' type = 'text' name = 'nmarcas' >

<tr><td>Descripcion</td><td><input required class='form-control' type = 'text' name = 'detalle' >

<tr><td>Activo </td><td><input required type = 'radio' name = 'activo' value = 'SI' >SI    <input type = 'radio' name = 'activo' value = 'NO'>NO</td>


</td></tr>


<?php


include ('classprovedor.php');
$provedores = new provedores();
$provedores->setidpro($idpro);
$provedores->buscarporidpro();





echo "<input class='form-control' type='hidden' readonly='readonly' name='idpro' value='$idpro'></td></tr>";
































//consulta
  $sqlMunicipio= "SELECT idmun,municipio FROM municipio WHERE activo= 'Si' ";
  $consultaMun = mysql_query($sqlMunicipio) or die ("error de consulta de municipio");
  $idmun2 = mysql_result($consultaMun,0,'idmun');
  $municipio2 = mysql_result($consultaMun,0,'municipio');
  
  $sqlMunicipio1= "SELECT idmun,municipio 
  FROM municipio WHERE activo= 'Si' ";
  $consultaMun1 = mysql_query($sqlMunicipio1) or die ("error de consulta 3");
  $filasMun = mysql_num_rows($consultaMun1);

  
  echo "<tr><td>Municipio</td><td><select class='form-control' name='idmun'>";
  echo "<option value = '$idmun2'>$municipio2</option>";
  //c
  //muestreo de datos
  for($y=0;$y<$filasMun;$y++)
  {
  
  $idmun3= mysql_result($consultaMun1,$y,'idmun');
  $municipio3= mysql_result($consultaMun1,$y,'municipio');
  echo "<option value = '$idmun3'>$municipio3</option>";
  
  }
  
  echo "</select></td></tr>";
//mdd























?>



<br>
<tr><td>Archivo </td><td><input type = 'file' name = 'archivo'>
<br>
</tr>
<tr><td><button class="btn btn-success btn-lg" type = 'submit'>Insertar nuevo</button>
</form>

              </div>
            </div>
          </div>
        </div>


              </div>
            </div>
          </div>
        </div>






      </div>
    </div>
    </div>

</table>
</div>
</div>
</div>
</div>
</div>
</div>
</body>




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
  <br>
  <br>
  <br>
  <br>
   <br>
  <br>
  <br>
  <br>
 <footer>
         <div class="container">

            <div class="copy text-center">
               La Joya <a href='#'>2016</a>
            </div>

         </div>
      </footer>

  </body>
</html>
