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
                   <h1><a href="index.php">Mi Perfil</a></h1>
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
                        <li class="dropdown">
                 <a href="#" class="dropdown" data-toggle="dropdown">Cerrar sesión <b class="caret"></b></a>
                          <ul class="dropdown-menu animated fadeInUp">
               
                            <li><a href="login.html">Salir</a></li>
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
                    <!-- Main menu -->
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i>Mi perfil</a></li>
                
                    <li  class="current" ><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>
                    
                    
                    <li><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>

                       <li><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>
             
                          <li  ><a href="galaria.php"><i class="glyphicon glyphicon-camera"></i> Galeria</a></li>


                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>






      <div class="col-md-10">






        


    <!-- Tablas (SELECT * CLIENTES) -->

        <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">Alta de clientes</div>
        </div>
          <div class="panel-body">
            <div class="table-responsive">



            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

<?php


    $idcli= $_POST['idcli'];
    $nombrecli= $_POST['nombrecli'];
    $appcliente= $_POST['appcliente'];
    $sexo= $_POST['sexo'];
    $emailcli= $_POST['emailcli'];
    $ntelcli= $_POST['ntelcli'];
    $idtipo= $_POST['idtipo'];  
    $activo= $_POST['activo'];
    
$ok=1;



if ($_FILES['archivo']['name']<>"")
{
  $nombrearchivo = time().$_FILES ['archivo']['name'];
  $cortaarchivo=explode('.',$nombrearchivo);
  $extension =$cortaarchivo[1];
  echo "<br>La extension del archivo es:".$extension;
  echo "<br>$nombrearchivo";

  if($extension<>'jpg' and $extension<>'png' and $extension<>'gif')
    { 
    echo "El archivo no es imagen";
    $ok = 0;
    }
}
else
{
 $nombrearchivo = "sombra.png";
}



if($ok==1)
{
  include ('conexion.php');
  $conexion = new conexion();
  $conexion->conecta();
  include('classclientes.php');
  $clientes = new clientes();
  $clientes->setidcli($idcli);
  $clientes->setnombrecli($nombrecli);
  $clientes->setappcliente($appcliente);
  $clientes->setntelcli($ntelcli);
  $clientes->setemailcli($emailcli);
  $clientes->setsexo($sexo);
  $clientes->setidtipo($idtipo);
  $clientes->setactivo($activo);
  $clientes->setarchivo($nombrearchivo);
  $clientes->setruta("imagenes/$nombrearchivo");
  $ruta= $clientes->getruta();//mostrar imagen
  $resultado = $clientes->insertaCliente();
  
  if ($resultado == 1)
  {
  move_uploaded_file($_FILES['archivo']['tmp_name'],"imagenes/$nombrearchivo");

  echo "<br> REGISTRO GUARDADO CORRECTAMENTE";


echo "Los datos son: <br>";
echo "$idcli <br>";
echo "$nombrecli <br>";
echo "$appcliente <br>";
echo "$sexo <br>";
echo "$emailcli <br>";
echo "$ntelcli <br>";
echo "$idtipo <br>";
echo "$activo <br>";
echo "<img src = '$ruta' height = 100 widht = 100>";


  }
  else
  {
  echo "<br>Error la clave ya existe";
  }
}







?>  



</table>

     
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