<?php
session_start();
$idpro = $_SESSION['idpro'];
$nombreempresa = $_SESSION['nombreempresa'];
$ruta = $_SESSION['ruta'];

if($idpro=='' or $nombreempresa == '' or $ruta == '')
{
$mensaje = "Es necesario loguearse";
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
        <h1><a href="index.php"> 


        <?php
            $mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
            //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
            if(mysqli_connect_errno()){
            echo 'Conexion Fallida : ', mysqli_connect_error();
            exit();}
            
            /*°°°°°°°°°°°°°°°°°°°PENDIENTE*/ $idpro = 24;
            $queryEmp = "SELECT nombreempresa, ruta, video, direccion, correo, telefono, web, giro, activo FROM provedores WHERE idpro = $idpro ORDER BY idpro";
						$resEmp = $mysqli->query($queryEmp);
            $cuantos = mysqli_num_rows($resEmp);
						while($row = $resEmp->fetch_assoc()) {
              $nombreempresa = $row['nombreempresa'];
              $ruta = $row['ruta'];
              $direccion = $row['direccion'];
              $correo = $row['correo'];
              $telefono = $row['telefono'];
              $giro = $row['giro'];
              $activo = $row['activo'];
              $video = $row['video'];
            }
            echo "Bienvenido $nombreempresa";
        ?>
        
        </a></h1>
        </div>
        </div>

        <br> 
        <div class="col-sm-2, col-md-2">

        <div style="" class="btn-group">
        <!--/*°°°°°°°°°°°°°°°°°°°PENDIENTE*/--><a  type="button" class="btn btn-primary btn-sm" href="Claptone Projects/elmundodelastic.com/Sistema/index.php"  >Inicio</a></li>
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
            $mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
            //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
            if(mysqli_connect_errno()){
            echo 'Conexion Fallida : ', mysqli_connect_error();
            exit();}
            
            /*°°°°°°°°°°°°°°°°°°°PENDIENTE*/ $idpro = 24;
            $queryEmp = "SELECT nombreempresa, ruta, video, direccion, correo, telefono, web, giro, activo FROM provedores WHERE idpro = $idpro ORDER BY idpro";
						$resEmp = $mysqli->query($queryEmp);
            $cuantos = mysqli_num_rows($resEmp);
						while($row = $resEmp->fetch_assoc()) {
              $nombreempresa = $row['nombreempresa'];
              $ruta = $row['ruta'];
              $direccion = $row['direccion'];
              $correo = $row['correo'];
              $telefono = $row['telefono'];
              $giro = $row['giro'];
              $activo = $row['activo'];
              $video = $row['video'];
            }
           
      
//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)
{
echo "<br>Foto";
}
//
else
{
  echo "<center><h4><b>$nombreempresa</b></h4></center><br>";

echo "<tr><td><img class='img-responsive' src ='$ruta'></td></tr>";
    

echo "</table>";

}
?>            
</div> 


        <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i>Mi perfil</a></li>
                
                    <li><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>
                    
                    
                    <li><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>
  
                     <li><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>

                    
                     <li class="current"><a href="serviciosExtras.php"><i class="glyphicon glyphicon-exclamation-sign"></i> Pedidos</a></li>

                </ul>
                    </li>
                </ul>
             </div>
		  </div>

		  
		 
    

      <div class="col-md-10">






   <div class="row">
              <div class="col-md-12">
                <div class="content-box-header panel-heading">
                  <div class="panel-title">  <b>Servicio de Ventas</b></div>
                
              
                </div>


                <div class="content-box-large box-with-header">


                   <?php


$querySE = "SELECT  c.idcat, c.nctat, c.descripciones, p.nombreempresa, c.activo
FROM categorias AS c, provedores AS p 
WHERE p.idpro=p.idpro AND  p.idpro = $idpro ORDER BY c.idcat ";
$resSE = $mysqli->query($querySE);
$cuantos = mysqli_num_rows($resSE);


while($row = $resSE->fetch_assoc()) {
  $idcat = $row['idcat'];
  $nctat = $row['nctat'];
  $descripciones = $row['descripciones'];
  $activo = $row['activo'];
  $nombreempresa = $row['nombreempresa'];
  }

//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)
{
echo "<br><h2>No hay registro de productos <h2><br>";
}
//
else
{


//Crea una tabla con borde 1, y crea los encabezados de mi tabla
echo "<table class='table table-striped table-bordered' <tr><th>Categoría</th><th>Descripción</th><th>Activo</th><th>Provedor</th><th>Modificar</th><th>Eliminar</th></tr>";





echo "<tr><td>$nctat</td>
<td>$descripciones</td>
<td>$activo</td>
<td>$nombreempresa</td>
<td><center><a href='modificarServicio.php?idcat=$idcat'</a><button class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-pencil'></i></button></center>

</td><td><center><a href='elimina_servicio.php?idcat=$idcat'</a><button class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-remove'></i></button></center>
</td></tr>";
  

echo "</table>";
}



?>
                    
   <form action = 'alta_servicio.php'>
                <button type="submit" value="Buscar cliente" class="btn btn-primary">Registrar Nueva Área de Ventas</button>
                </form> 

              </div>
              </div>
            </div>


              

    <!-- Tablas (SELECT * CLIENTES) -->



              </div>
            </div>
    </div>
    </div>





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