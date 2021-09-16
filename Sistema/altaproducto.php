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
                    <li ><a href="index.php"><i class="glyphicon glyphicon-home"></i>Mi perfil</a></li>
                
                    <li><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>
                    
                    
                    <li class="current"><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>

                       <li ><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>
             

             
                  

             
                      
                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>



      <div class="col-md-10">

       <!-- Tablas (SELECT * CLIENTES) -->

        <div class="content-box-header">
                  <b>Registrar Nuevo Producto</b>

            </div>
  <div class="content-box-large box-with-header">          


  <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">




<form action ='altaproducto2.php' method = 'POST' enctype='multipart/form-data'>


<tr><td>Nombre</td><td><input required class='form-control' type = 'text' name = 'nproductos'>

<tr><td>Precio </td><td><input required class='form-control' type = 'text' name = 'precio'>


<tr><td>Descripcion </td><td><input required class='form-control' type = 'text' name = 'descrip'>

<tr><td>Activo </td><td><input required  type = 'radio' name = 'activo' value = 'SI' >SI    <input type = 'radio' name = 'activo' value = 'NO'>NO</td>


<?php

echo "<input class='form-control' type='hidden' readonly='hidden' name='idpro' value='$idpro'></td></tr>";




include ('classproducto.php');
$productosc = new productosc();
$idcat = $productosc->getidcat();
$idmar= $productosc->getidmar();




  


$sql5= "SELECT idmar,nmarcas 
  FROM marcas WHERE idpro = '$idpro' ";
  $consulta5 = mysql_query($sql5) or die ("error de consulta 5");
  $idmar2 = mysql_result($consulta5,0,'idmar');
  $nmarcas2 = mysql_result($consulta5,0,'nmarcas');
  
  $sql8= "SELECT idmar,nmarcas 
  FROM marcas WHERE idpro=$idpro";
  $consulta6 = mysql_query($sql8) or die ("error de consulta 3");
  $filas = mysql_num_rows($consulta6);



  echo "<tr><td>Marcas</td><td><select  class='form-control' name='idmar'>";
  echo "<option value = '$idmar2'>$nmarcas2</option>";
  
  for($y=1;$y<$filas;$y++)
  {
  
  $idmar7= mysql_result($consulta6,$y,'idmar');
  $nmarcas7= mysql_result($consulta6,$y,'nmarcas');
  echo "<option value = '$idmar7'>$nmarcas7</option>";
  
  }

$sql2= "SELECT idcat,nctat 
  FROM categorias WHERE idcat=idcat ";
  $consulta2 = mysql_query($sql2) or die ("error de consulta 2");
  $idcat2 = mysql_result($consulta2,0,'idcat');
  $categorias2 = mysql_result($consulta2,0,'nctat');
  
  $sql3= "SELECT idcat,nctat  FROM categorias ";
  $consulta3 = mysql_query($sql3) or die ("error de consulta 3");
  $filas = mysql_num_rows($consulta3);


  echo "<tr><td>Tipo</td><td><select class='form-control' name='idcat'>";
  echo "<option value = '$idcat2'>$categorias2</option>";
  
  for($y=1;$y<$filas;$y++)
  {
  
  $idcat3= mysql_result($consulta3,$y,'idcat');
  $categorias3= mysql_result($consulta3,$y,'nctat');
  echo "<option value = '$idcat3'>$categorias3</option>";
  
  }


?>


<br>
<tr><td>Foto </td><td><input class='form-control' type = 'file' name = 'archivo'>

<tr><td>Memoria RAM <br><b>(8 GB)</b> </td><td><input class='form-control' type = 'text' name = 'ram'>
<tr><td>Tamaño de Disco Duro <br><b>(520 GB, 1 TB)</b></td><td><input class='form-control' type = 'text' name = 'hdd'>
<tr><td>Procesador <br><b>(INTEL CORE i5)</b></td><td><input class='form-control' type = 'text' name = 'procesador'>



<br>
</tr>



</tr>
</td>
</tr>
</td>
</tr>



</table>
<center><button class="btn btn-success btn-lg" type = 'submit'>Insertar nuevo</button></center>

</form>
</div>
</div>
</div>
</div>
</div>
</div>


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
               El Mundo de las TIC <a href='#'>2017</a>
            </div>
            
         </div>
      </footer>

  </body>
</html>