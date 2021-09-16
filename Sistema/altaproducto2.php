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
                    
                    
                    <li class="current" ><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>

                       <li><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>
             
             
                  

             
                      
                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>




      <div class="col-md-10">






        


    <!-- Tablas (SELECT * CLIENTES) -->

        <div class="content-box-large">
          <div class="panel-heading">
        </div>
          <div class="panel-body">
            <div class="table-responsive">



            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

<?php



$nproductos=$_POST['nproductos'];
$idcat=$_POST['idcat'];
$precio=$_POST['precio'];
$activo=$_POST['activo'];
$idmar=$_POST['idmar'];
$idpro=$_POST['idpro'];
$descrip=$_POST['descrip'];
$ram=$_POST['ram'];
$hdd=$_POST['hdd'];
$procesador=$_POST['procesador'];






include ('validacionesproducto.php');
$validaciones=new validaciones();
$valida = "OK";

if($validaciones->validacadenas($nproductos)=="error")
{
  
  echo"<H2>El producto es incorrecto</H2>";
$valida="Error de registro";  
}


if($validaciones->validanumero($precio)=="error")
{
  
    echo"<H2>El precio es incorrecto</H2>";
  $valida="Error de registro";
  
}


if ($_FILES['archivo']['name']<>"")
{
  $nombrearchivo = time().$_FILES ['archivo']['name'];
  $cortaarchivo=explode('.',$nombrearchivo);
  $extension =$cortaarchivo[1];
  //echo "<br><center>la extension del archivo es:".$extension;
  //echo "<br><center> $nombrearchivo";

  if($extension<>'jpg'
  and $extension<>'JPG'
  and $extension<>'png'
  and $extension<>'PNG'
  and $extension<>'gif'
  and $extension<>'GIF'
  and $extension<>'jpeg'
  and $extension<>'jfif'
  and $extension<>'JPEG')
    { 
    echo "ERROR El archivo no es imagen";
    $valida = "ERROR";
    }
}
else
{
 $nombrearchivo = "sombraprod.png";
}






if($valida=="OK")
{

  
include('classproducto.php');
$productosc = new productosc();
$productosc->setnproductos($nproductos);
$productosc->setidcat($idcat);
$productosc->setprecio($precio);
$productosc->setactivo($activo);
$productosc->setidmar($idmar);
$productosc->setidpro($idpro);
$productosc->setdescrip($descrip);
$productosc->setram($ram);
$productosc->sethdd($hdd);
$productosc->setprocesador($procesador);



$productosc->setidpro($idpro);
 $productosc->setarchivo($nombrearchivo);
  $productosc->setruta("ImPro/$nombrearchivo");
  $resultado = $productosc->insertaProd();
 if ($resultado == 1)
  {
  move_uploaded_file($_FILES['archivo']['tmp_name'],"ImPro/$nombrearchivo");
    echo"<center><H1>Producto registrado</H1></center>";


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

  
    <footer>
         <div class="container">
         
         <div class="copy text-center">
               El Mundo de las TIC <a href='#'>2017</a>
            </div>
            
         </div>
      </footer>

  </body>
</html>