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
   $mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
   //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
   if(mysqli_connect_errno()){
   echo 'Conexion Fallida : ', mysqli_connect_error();
   exit();}
   
   /*°°°°°°°°°°°°°°°°°°°PENDIENTE*/ $idpro = 24;
   $queryEmp = "SELECT nombreempresa, ruta, video, direccion, correo, telefono, web, giro, activo, pswd FROM provedores WHERE idpro = $idpro ORDER BY idpro";
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

     $web = $row['web'];
     $pswd = $row['pswd'];
     
   }
   echo "Bienvenido $nombreempresa";




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

if($cuantos==0)
{
echo "<br>Foto";
}
//
else
{
echo "<tr><td><img class='img-responsive' src ='$ruta'></td></tr>";
    }

echo "</table>";

?>            
</div>

        <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i>Mi perfil</a></li>
                
                    <li  class="current" ><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>
                    
                    
                    <li><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>
                       <li class=><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>
                       <li><a href="serviciosExtras.php"><i class="glyphicon glyphicon-exclamation-sign"></i> Pedidos</a></li>

                <!-- <li><a href="serviciosExtras.php"><i class="glyphicon glyphicon-exclamation-sign"></i> Pedidos</a></li>/*/-->                  

                   
                    

                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>




		  <div class="col-md-10">
      
              


  			       <div class="content-box-header">
                  <b>Buscar Clientes</b>

            </div>
  <div class="content-box-large box-with-header">          
  <div class="panel-heading">



       

                           <form action = 'buscarcliente2.php' method= "GET">

 <div class="input-group form">
                          <input class="form-control input-xs" placeholder="Criterio" type="text" name = 'criterio'>
                         <span class="input-group-btn">
<button type="submit" value="Buscar cliente" class="btn btn-primary">
                    Buscar
                  </button>                         </span>
                    </div>

                                    </form>



          </div>
        </div>

 <div class="content-box-header">
                  <b>Mis Clientes</b>

            </div>
  <div class="content-box-large box-with-header">          



                             



      

            <?php
// se recibe la variable criterio del formulario anteior, como se manda con GET se recive con GET
// el GET debe ir en Mayusculas



$queryCli = "SELECT  c.idcli as idcli, c.nombrecli as nombrecli, c.appcliente as appcliente, c.emailcli as emailcli, c.ruta as ruta, 
c.activo as activo , c.sexo as sexo, c.ntelcli as ntelcli, c.idpro as idpro
FROM clientes AS c, provedores AS p
WHERE (c.idpro=p.idpro) and c.idpro = $idpro ORDER BY c.idcli";
$resCli = $mysqli->query($queryCli);
$cuantos = mysqli_num_rows($resCli);
while($row = $resCli->fetch_assoc()) {


  $idcli = $row['idcli'];
  $nombrecli = $row['nombrecli'];
  $appcliente = $row['appcliente'];
  $sexo = $row['sexo'];
  $emailcli = $row['emailcli'];
  $ntelcli = $row['ntelcli'];
  $activo = $row['activo'];
  $ruta = $row['ruta'];

  if($cuantos==0)
  {
  echo "<center><h2>Aún no tienes ningún <b>cliente</b> registrado</h2><br>
  <img src ='ImCli/sombra.png' height = 100><center><br>
  <center>";
  }
  //
  else
  {
  echo "<table class='table table' >";
  echo "<center><tr><th>Foto</th><center><th>Nombre</th><th>Sexo</th><th>E-mail</th><th>No. Celular</th><th>Activo</th><th>Opciones</th></tr><center>";
  echo "<tr><td ><center><img  width = 95 src ='$ruta' class=img-responsive ><center></td><td>$nombrecli $appcliente</td><td>$sexo</td><td>$emailcli</td><td>$ntelcli</td> <td>$activo</td> <td><a href='modificarcliente.php?idcli=$idcli'</a> <button class='btn btn-default btn-xs'><i class='glyphicon glyphicon-pencil'></i></button> </a>   </li><a href='eliminacliente.php?idcli=$idcli'</a> <button class='btn btn-default btn-xs'>  <i class='glyphicon glyphicon-remove'></i></button> </a></li></td></tr>";
  }

}

//aqui se muestra mensaje si hay caracteres no validos

?>

          </table>


                <form action = 'altacliente.php'>
                <center><button type="submit" value="Buscar cliente" class="btn btn-primary">Registrar Nuevo Cliente</button></center>
                </form>
          

          </div>
        </div>


</div>




      </h2>
</h2>
</div>
</div>
</div>
</div>
</ul>


</div>




</ul>
</div>



</div>
</div>

</div>

      </h2>
      </h2>

    
<footer>
         <div class="container">
         <br>
         
            <div class="copy text-center">
               El Mundo de las TIC <a href='#'>2017</a>
            </div>
            
         </div>
      </footer>

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
  

</html>