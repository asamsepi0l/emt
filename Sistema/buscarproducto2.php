<?php
session_start();
$idpro = $_SESSION['idpro'];
$nombreempresa = $_SESSION['nombreempresa'];
$ruta = $_SESSION['ruta'];
echo $idpro;
echo $nombreempresa;
echo $ruta;
if($idpro=='' or $nombreempresa == '' or $ruta == '')
{
$mensaje = "Es necesario loguearse";
echo $idpro;
echo $nombreempresa;
echo $ruta;
//print "<meta http-equiv='refresh' content='0;url=/Claptone Projects/elmundodelastic.com/registro.php?mensaje=$mensaje'>";
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
                    <li ><a href="index.php"><i class="glyphicon glyphicon-home"></i>Mi perfil</a></li>
                
                    <li><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>
                    
                    
                    <li class="current"><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>

                       <li class=><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>
             
                  

             
                      
                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>



      <div class="col-md-10">
    <!-- Tablas (SELECT * CLIENTES) -->

  
               <div class="content-box-header">
                  <b>Búsqueda de Productos</b>

            </div>
  <div class="content-box-large box-with-header">          



            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">


      
<?php
// se recibe la variable criterio del formulario anteior, como se manda con GET se recive con GET
// el GET debe ir en Mayusculas
$criterio = $_POST['criterio'];
//se manda llamar a el archivo "conexion.php" en el cual nos 
 
$sql = "SELECT  p.idprod, p.nproductos, c.nctat, p.precio ,  p.activo, m.nmarcas, pr.nombreempresa, p.descrip, p.ruta, p.ram, p.hdd, p.procesador
  FROM productos AS p, categorias  AS c, marcas AS m, provedores AS pr
WHERE (p.idprod  LIKE '%$criterio%' OR p.nproductos  LIKE '%$criterio%' 
OR c.nctat  LIKE '%$criterio%' OR p.precio  LIKE '%$criterio%' 
OR p.activo  LIKE '%$criterio%' OR m.nmarcas  LIKE '%$criterio%' OR pr.nombreempresa LIKE '%$criterio%' OR p.idpro LIKE '%$criterio%' OR p.descrip LIKE '%$criterio%'
OR p.ram LIKE '%$criterio%' OR p.hdd LIKE '%$criterio%' OR p.procesador LIKE '%$criterio%'


) AND p.idcat=c.idcat AND p.idmar=m.idmar AND p.idpro=pr.idpro   AND  p.idpro = $idpro ORDER BY p.idprod";




//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta = mysql_query($sql) or die ("Error");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$cuantos = mysql_num_rows($consulta);

//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)
{
echo "<center><h2>No existe ningún producto con el dato <b>''$criterio''</b> por el momento</h2><center><br>";
}
//
else
{

echo "<table class='table table' >";

//Crea una tabla con borde 1, y crea los encabezados de mi tabla
echo "<tr><th>Foto</th><th>Producto</th><th>Marca</th><th>Precio</th><th>Activo</th><th>Descripción</th><th>Categoría</th><th>Memroria RAM</th><th>Almacenamiento</th><th>Procesador</th><th>Opciones</th></tr>";

for($y=0;$y<$cuantos;$y++)
  
  {
$idprod = mysql_result ($consulta,$y,'idprod');
$nproductos = mysql_result ($consulta,$y,'nproductos');
$nctat = mysql_result ($consulta,$y,'nctat');
$precio = mysql_result ($consulta,$y,'precio');
$activo = mysql_result ($consulta,$y,'activo');
$ruta = mysql_result($consulta,$y,'ruta');
$nmarcas = mysql_result($consulta,$y,'m.nmarcas');
$descrip = mysql_result($consulta,$y,'descrip');
$ram = mysql_result($consulta,$y,'ram');
$hdd = mysql_result($consulta,$y,'hdd');
$procesador = mysql_result($consulta,$y,'procesador');

echo "<tr><td><center><img src ='$ruta' height = 100><center></td><td>$nproductos</td><td>$nmarcas</td><td>$$precio.00</td>
<td>$activo</td><td>$descrip</td><td>$nctat</td>";




            if($ram=$ram)
            {
            echo"<td>$ram</td>";
            }
            else{
             echo"<td>NA</td>";
            }

            if($hdd=$hdd)
            {
            echo"<td>$hdd</td>";
            }
            else{
             echo"<td>NA</td>";
            }

            if($procesador=$procesador)
            {
            echo"<td>$procesador</td>";
            }
            else{
             echo"<td>NA</td>";
            }



echo"<td><a href='modificarproducto.php?idprod=$idprod'</a><button class='btn btn-default btn-xs'><i class='glyphicon glyphicon-pencil'></i></button> </a></li>

  <a href='eliminar_producto.php?idprod=$idprod'</a> <button class='btn btn-default btn-xs'><i class='glyphicon glyphicon-remove'></i></button> </a></li></td></tr>";
  }

echo "</table>";

}





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
<br><br><br><br><br><br>

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
  
 <footer>
         <div class="container">
         
            <div class="copy text-center">
               El Mundo de las TIC  <a>2017</a>
            </div>
            
         </div>
      </footer>

  </body>
</html>