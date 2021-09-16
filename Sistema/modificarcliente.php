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

             
                  

                   
                    

                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>


      <div class="col-md-10">
      
     


 <div class="content-box-header">
                  <b>Modificar Cliente</b>

            </div>
  <div class="content-box-large box-with-header">          



      

            <?php
// se recibe la variable criterio del formulario anteior, como se manda con GET se recive con GET
// el GET debe ir en Mayusculas


$idcli = $_GET['idcli'];

include ('classclientes.php');
$clientes = new clientes();
$clientes->setidcli($idcli);
$clientes->buscarclienteporidcli();
$nombrecli = $clientes->getnombrecli();
$appcliente = $clientes->getappcliente();
$sexo = $clientes->getsexo();
$ntelcli = $clientes->getntelcli();
$emailcli = $clientes->getemailcli();
$activo = $clientes->getactivo();
$ruta= $clientes->getruta();
$idpro= $clientes->getidpro();
$archivo= $clientes->getarchivo();




echo "<form action='modificarcliente2.php' method = 'POST' enctype='multipart/form-data'>";
echo "<input type='hidden'   class='form-control' name='idcli' value='$idcli'>";
echo "<tr><td>Nombre</td><td><br><input type='text'  class='form-control' name='nombrecli' value='$nombrecli' required></td></tr><br>";
echo "<tr><td>Apellido Paterno</td><td><input type='text' class='form-control' name='appcliente' value='$appcliente' required></td></tr>";

echo "<br><tr><td>E-Mail</td><td><input type='text' class='form-control' name='emailcli' value='$emailcli' required></td></tr>";
echo "<br><tr><td>Telefono (10 dígitos)</td><td><input  class='form-control' type='text' name='ntelcli' value='$ntelcli' required></td></tr>";

echo "<br><input type='hidden' class='form-control'  readonly='readonly' name='idpro' value='$nombreempresa' required></td></tr>";



if ($sexo=="M")
{
echo "<tr><td>Sexo</td>
    <td><br><input type='radio' name='sexo' value='M' checked>M
    <input type='radio' name='sexo' value='F'>F</td>
  </tr>";
  }
else
{ 
  echo "<td>Sexo</td>
    <td><br><input type='radio' name='sexo' value='M'>M
    <input type='radio' name='sexo' value='F' checked>F</td><br>";
  }

  
echo "<br><tr><td>Imagen</td><td><br><img src = '$ruta' height = 100 widht = 100  ></td></tr>";
echo "<br><tr><td>Selecciona nueva imagen</td><br>
          <td><br><input class='form-control' type = 'file' name = 'archivo'></td></tr>";

  if ($activo=="SI")
{
echo "<br>
    <td><input type='radio' name='activo' value='SI' checked> Activo
    <input type='radio' name='activo' value='NO'> No Activo</td>
  </tr>";
  }
else
{ 
  echo "<tr><td>Activo</td>
    <td><input type='radio' name='activo' value='SI'> Activo
    <input type='radio' name='activo' value='NO' checked> No Activo</td>
  </tr>





  ";



  }



  /*/

$sql2= "SELECT idtipo,ctipo 
  FROM tipocliente WHERE activo= 'Si' AND idtipo = $idtipo";
  $consulta2 = mysql_query($sql2) or die ("error de consulta 2");
  $idtipo2 = mysql_result($consulta2,0,'idtipo');
  $ctipo2 = mysql_result($consulta2,0,'ctipo');
  
  $sql3= "SELECT idtipo,ctipo 
  FROM tipocliente WHERE activo= 'Si'AND idtipo<>$idtipo ";
  $consulta3 = mysql_query($sql3) or die ("error de consulta 3");
  $filas = mysql_num_rows($consulta3);

  
  echo "<tr><td>Tipo de cliente</td><td><select class='form-control'  class='control-label col-md-2' name='idtipo'>";
  


  echo "<option  class='control-label col-md-2' value = '$idtipo2'>$ctipo2</option>";
  
  for($y=0;$y<$filas;$y++)
  {
  
  $idtipo3= mysql_result($consulta3,$y,'idtipo');
  $ctipo3= mysql_result($consulta3,$y,'ctipo');
  echo "<option  class='control-label col-md-2' value = '$idtipo3'>$ctipo3</option>";
  
  }

  
  echo "</select></td></tr>";
  
  
  
  /*/
  



echo "</table>

";

?>

        <br><center><button  type='submit' value='Guardar Cambios' class='btn btn-primary'>Actualizar</button></center>
              
          </div>

          </div>
        </div>







</div>
</div>
</div>




    <footer>
         <div class="container">
     
            <div class="copy text-center">
               El Mundo de las TIC <a href='#'>2017</a>
            </div>
            
         </div>
      </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
  <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/forms.js"></script>



  </body>
</html>

