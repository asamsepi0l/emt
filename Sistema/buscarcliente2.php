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

                <!-- <li><a href="serviciosExtras.php"><i class="glyphicon glyphicon-exclamation-sign"></i> Pedidos</a></li>/*/
-->                  

                   
                    

                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>

    <div class="page-content">


      <div class="col-md-10">

     
 <div class="content-box-header">

        <b>Búsqueda de Clientes</b>

  </div>
  <div class="content-box-large box-with-header">          




        

      
<?php
// se recibe la variable criterio del formulario anteior, como se manda con GET se recive con GET
// el GET debe ir en Mayusculas
$criterio = $_GET['criterio'];
//se manda llamar a el archivo "conexion.php" en el cual nos conectamos a la Base de datos



$sql = "SELECT c.idcli, c.nombrecli, c.appcliente, c.emailcli, c.ruta, c.activo , c.sexo, c.ntelcli,  p.nombreempresa
FROM clientes AS c, provedores AS p 
WHERE (c.idcli  LIKE '%$criterio%' OR c.nombrecli  LIKE '%$criterio%' OR c.appcliente  LIKE '%$criterio%' OR c.sexo  LIKE '%$criterio%' 
 OR c.emailcli  LIKE '%$criterio%' OR c.ntelcli LIKE '%$criterio%'
  OR c.activo LIKE '%$criterio%' OR c.ntelcli LIKE '%$criterio%' OR c.ruta LIKE '%$criterio%' OR c.archivo LIKE '%$criterio%' OR c.idpro LIKE '%$criterio%') AND  c.idpro=p.idpro AND c.idpro = $idpro ORDER BY c.idcli";



//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta = mysql_query($sql) or die ("Error de consulta");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$cuantos = mysql_num_rows($consulta);

//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)
{
echo "<center><h2>No existe ningún cliente con el dato <b>''$criterio''</b> por el momento</h2><center><br>";
}
//
else
{


//Crea una tabla con borde 1, y crea los encabezados de mi tabla
echo " <table class='table table' ><tr><th>Foto</th><th>Nombre</th><th>Apellido Paterno</th><th>Sexo</th><th>E-mail</th><th>No. Celular</th><th>Activo</th><th>Opciones</th></tr>";





for($y=0;$y<$cuantos;$y++)
  
  {
$idcli = mysql_result ($consulta,$y,'idcli');
$nombrecli = mysql_result ($consulta,$y,'nombrecli');
$appcliente = mysql_result ($consulta,$y,'appcliente');
$sexo = mysql_result ($consulta,$y,'sexo');
$emailcli = mysql_result ($consulta,$y,'emailcli');
$ntelcli = mysql_result ($consulta,$y,'ntelcli');
$activo = mysql_result ($consulta,$y,'activo');
$ruta = mysql_result($consulta,$y,'ruta');
$nombreempresa = mysql_result($consulta,$y,'nombreempresa');

echo "<tr><td><center><img src ='$ruta' height = 100><center></td><td>$nombrecli</td><td>$appcliente</td><td>$sexo</td><td>$emailcli</td><td>$ntelcli</td><td>$activo</td> <td><a href='modificarcliente.php?idcli=$idcli'</a> <button class='btn btn-default btn-xs'><i class='glyphicon glyphicon-pencil'></i></button> </a></li><a href='eliminacliente.php?idcli=$idcli'</a> <button class='btn btn-default btn-xs'><i class='glyphicon glyphicon-remove'></i></button> </a></li></td></tr>";


  }

echo "</table>";

}


echo "<form action = 'buscarcliente.php'>
                <center><button type='submit' value='Buscar cliente' class='btn btn-primary'>Otra Búsqueda</button></center>
                </form>";



?>

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
  <br><br><br><br><br>
 <footer>
         <div class="container">
         
            <div class="copy text-center">
               El Mundo de las TIC  <a>2017</a>
            </div>
            
         </div>
      </footer>

  </body>
</html>