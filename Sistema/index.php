<?php
session_start();
$idpro = $_SESSION['idpro'];
$nombreempresa = $_SESSION['nombreempresa'];
$ruta = $_SESSION['ruta'];
$mensaje = $_SESSION['mensaje'];

if($idpro=='' or $nombreempresa == '' or $ruta == '')
{

print "<meta http-equiv='refresh' content='0;url=/Claptone Projects/elmundodelastic.com/registro.php?mensaje=$mensaje'>";
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
            
            /*°°°°°°°°°°°°°°°°°°°PENDIENTE*/
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
                  if($cuantos==0){
                  echo "<br>Foto";
                  }
                  else{
                  echo "<tr><td><img class='img-responsive' src ='$ruta'></td></tr>";
                  if($ruta=='ImProv/sombra.png'){
                  echo"<br><b>¡Por ahora tienes la foto de perfil por defecto, Personaliza tu perfil cambiando tu foto ahora mismo! <br><center><img class='img-responsive' src ='ImProv/sombraadv.png'></center>";
                  }
                  }
              ?>
            </div> 

        <div class="sidebar content-box" style="display: block;">
        <ul class="nav">

        <!-- Main menu -->
        <li class="current" ><a href="index.php"><i class="glyphicon glyphicon-home"></i>Mi perfil</a></li>
        <li><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>
        <li ><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>
        <li class=><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>
        <li><a href="serviciosExtras.php"><i class="glyphicon glyphicon-exclamation-sign"></i> Pedidos</a></li>
        </ul>
        </li>
        </ul>
        </div>
        </div>

        <div class="col-md-10">
        <div class="row">
        <div class="col-md-6">
        <div class="content-box-header">
        <b>Foto</b>

        </div>
        <div class="content-box-large box-with-header">

        <?php
            echo "<center><h4><b>$nombreempresa</b></h4></center><br>";
            echo "<center><img class='img-responsive' src ='$ruta'></center>";
            echo "</table>";
        ?>

        <br />
        <br />

        </div>
        <div class="row">
        <div class="col-md-12">
        <div class="content-box-header">
        <b>Video</b>
        </div>
        
        <div class="content-box-large box-with-header">
            <div class='video-responsive'>
            <?php
            if($cuantos==0)
            {
            echo "<br>Foto";
            }
            //
            else
            {
            echo "<center><iframe  src='https://www.youtube.com/embed/$video?rel=0&autoplay=1' frameborder='0' allowfullscreen='allowfullscreen'></iframe></center>";
            }
            ?>
          </div>
          <br>
        </div>
        
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="row">
        <div class="col-md-12">
        
        
        <div class="content-box-header">
            <b>Ubicación</b>
        </div>

        <div class="content-box-large box-with-header">
            <?php
            
            if($cuantos==0)
            {
            echo "<br>Foto";
            }
            //
            else
            {

            echo "   <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered' id='example'>";

            echo "<tr><td>Direccion</td><td>E-Mail</td><td>Telefono</td> </tr>";

            echo "<tr><td>$direccion</td><td>$correo</td><td>$telefono</td> </tr>";

            echo "</table>";

            }
            ?>                    
      </div>                

        </div></div>

        <div class="row">
        <div class="col-md-12">

        <div class="content-box-header">
            <b>Acerca de nosotros</b>
        </div>


        <div class="content-box-large box-with-header">

        <?php
              //aqui se muestra mensaje si hay caracteres no validos
              if($cuantos==0)
              {
              echo "<br>Foto";
              }
              //
              else
              {
              {
              echo "$giro<br<<br>";
              echo "<br><br>¿Soy un usuario activo?: <b>$activo</b>";
              }
              }
        ?>

        <br /><br />
        </div>
        </div>
        </div>

        <div class="content-box-header">
        <b> Contacto</b>

        </div>
        <div class="content-box-large box-with-header">


        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">


        <?php
              // se recibe la variable criterio del formulario anteior, como se manda con GET se recive con GET
              // el GET debe ir en Mayusculas



              $queryFin = "SELECT p.idpro, p.nombreempresa, p.direccion, p.correo, p.telefono, p.web as pweb, e.estado as pestado , p.activo
              FROM provedores AS p, estado AS e WHERE ( p.idest=e.idest) AND  idpro = $idpro ORDER BY idpro";
						  $resFin = $mysqli->query($queryFin);
              $cuantos = mysqli_num_rows($resFin);
              

              while($row = $resFin->fetch_assoc()) {
                $pweb = $row['pweb'];
                $pestado = $row['pestado'];
                }
              if($cuantos==0)
              {

              }
              //
              else
              {


              //Crea una tabla con borde 1, y crea los encabezados de mi tabla




              echo "<tr>
              <td>Sitio Web</td><td>Estado</td> </tr>";

              echo "<tr>
              <td>$pweb</td><td>$pestado</td> </tr>";


              echo "</table>

              </div>
              <center>  
              <a href='modificarprovedor.php?idpro=$idpro'</a> <button type='button' class='btn btn-success btn-lg'>Actualizar datos</button> </a><center><br><br>";

              }          
              echo"</div>
              </div>

              ";
  
        ?>

        </div>
        </div>
        </div>
        </div>
        </div>
      </body>


      <footer>
      <div class="container">

          <div class="copy text-center">
          El Mundo de las TIC <a href='#'>2021</a>
      </div>

      </div>
      </footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</html>
