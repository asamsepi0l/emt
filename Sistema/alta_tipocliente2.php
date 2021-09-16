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
                        <li class="dropdown">
                 <a href="logout.php" class="dropdown" data-toggle="dropdown">Cerrar sesión <b class="caret"></b></a>
                          <ul class="dropdown-menu animated fadeInUp">
               
                            <li><a href="logout.php">Salir</a></li>
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
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i>Mi perfil</a></li>
                
                    <li><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>
                    
                    
                    <li><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>


     <li><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>
             
               
                     <li  class="current"><a href="serviciosExtras.php"><i class="glyphicon glyphicon-star"></i> Servicios Extras</a></li>

             
                  
                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>






      <div class="col-md-10">






        


    <!-- Tablas (SELECT * CLIENTES) -->

        <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">Alta Tipo de Cliente</div>
        </div>
          <div class="panel-body">
            <div class="table-responsive">



            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

<?php



    $idtipo= $_POST['idtipo'];
    $ctipo= $_POST['ctipo'];
    $activo= $_POST['activo'];
    $descripcion= $_POST['descripcion'];
    $idpro=$_POST['idpro'];

//$validaciones = new validaciones;
//include("validaciones.php");

//if($validaciones->validanombre($nombre)=="error")
//{
//echo "<center>El nombre no es correcto</center>";
//$ok=0;
//}



include ('validacionesclientes.php');
$validaciones=new validaciones();
$valida = "OK";

if($validaciones->validaidcli($idtipo)=="error")
{
  
  echo"<H2>El ID es incorrecto</H2>";
  $valida="Error";
  
}


if($validaciones->validacadenas($ctipo)=="error")
{
  
  echo"<H2>La marca es incorrecta</H2>";
  $valida="Error";
  
}

if($validaciones->validacadenas($descripcion)=="error")
{
  
  echo"<H2>La descripcion de la marca es incorrecta</H2>";
  $valida="Error";
  
}





if($valida=="OK")
{

  include('classtipocliente.php');
  $tipocc = new tipocc();
  $tipocc->setidtipo($idtipo);
  $tipocc->setctipo($ctipo);
  $tipocc->setdescripcion($descripcion);
  $tipocc->setactivo($activo);
  $tipocc->setidpro($idpro);
  $resultado = $tipocc->insertaTipoc();

  if ($resultado==1){

echo "<center><h1>Alta exitosa</h1>";


  }

else{
 echo"<center><H1>La clave ya existe, Ingresa otra</H1></center>";

}

 
}

else
{

  echo "<H1>NO HUBO ALTA<H1>";
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