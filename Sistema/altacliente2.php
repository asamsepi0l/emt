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
                
                    <li class="current"><a href="buscarcliente.php"><i class="glyphicon glyphicon-user"></i>Clientes</a></li>
                    
                    
                    <li ><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>

                       <li ><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>
             
                <!-- <li><a href="serviciosExtras.php"><i class="glyphicon glyphicon-exclamation-sign"></i> Pedidos</a></li>/*/
-->
             
                  

             
                      
                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>

      <div class="col-md-10">

    <!-- Tablas (SELECT * CLIENTES) -->

        <div class="content-box-large">
        
          <div class="panel-body">

          <br>
   
<?php

    $nombrecli= $_POST['nombrecli'];
    $appcliente= $_POST['appcliente'];
    $sexo= $_POST['sexo'];
    $emailcli= $_POST['emailcli'];
    $ntelcli= $_POST['ntelcli'];
    $activo= $_POST['activo'];
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

if($validaciones->validacadenas($nombrecli)=="error")
{
  
  echo"<H2>El nombre es incorrecto</H2>";
  $valida="Error";
  
}

if($validaciones->validacadenas($appcliente)=="error")
{
  
  echo"<H2>El Apellido es incorrecto</H2>";
  $valida="Error";
  
}


if($validaciones->validanumero($ntelcli)=="error")
{
  
  echo"<H2>El Numero de teléfono es incorrecto</H2>";
  $valida="Error";
  
}

if($validaciones->validaEmail($emailcli)=="error")
{
  
  echo"<H2>El E-mail es incorrecto</H2>";
  $valida="Error";
  
}

if ($_FILES['archivo']['name']<>"")
{
  $nombrearchivo = time().$_FILES ['archivo']['name'];
  $cortaarchivo=explode('.',$nombrearchivo);
  $extension =$cortaarchivo[1];
  //echo "<br><center>La extension del archivo es:".$extension;
 // echo "<br><center> $nombrearchivo";

  if($extension<>'jpg' and $extension<>'png' and $extension<>'gif' and $extension<>'jpeg' and $extension<>'JPG' and $extension<>'PNG' and $extension<>'JPEG')
    { 
    echo "<h1>El archivo no es imagen<h1>";
  $valida="Error";
    }
}
else
{
 $nombrearchivo = "sombra.png";
}

if($valida=="OK")
{

  include('classclientes.php');
  $clientes = new clientes();
  $clientes->setnombrecli($nombrecli);
  $clientes->setappcliente($appcliente);
  $clientes->setntelcli($ntelcli);
  $clientes->setemailcli($emailcli);
  $clientes->setsexo($sexo);
  $clientes->setactivo($activo);
  $clientes->setidpro($idpro);
  $clientes->setarchivo($nombrearchivo);
  $clientes->setruta("ImCli/$nombrearchivo");
  $resultado = $clientes->insertaCliente();
  
  if ($resultado == 1)
  {
  move_uploaded_file($_FILES['archivo']['tmp_name'],"ImCli/$nombrearchivo");
    echo"<br><center><H1>Cliente registrado</H1></center><br>

                  

                  </center>";


  }
  else
  {
 echo"<center><H1>La clave ya existe, Ingresa otra</H1></center>";

  }

 
}

else
{

  echo "<H1>NO HUBO ALTA<H1>";
   
}







?>  



     

 
              </div>
            </div>
          </div>
        </div>




<br><br><br><br>
       

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
  
 <footer>
         <div class="container">
         
         <div class="copy text-center">
               El Mundo de las TIC <a href='#'>2017</a>
            </div>
            
         </div>
      </footer>

  </body>
</html>