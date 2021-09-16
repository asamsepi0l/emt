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
                    
                    
                    <li ><a href="productos.php"><i class="glyphicon glyphicon-shopping-cart"></i>Productos</a></li>

                       <li class="current"><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>
             

             
                  

             
                      
                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>


      <div class="col-md-10">






        


    <!-- Tablas (SELECT * CLIENTES) -->

            <div class="content-box-header">
                  <b>Busqueda de Marca</b>

            </div>
  <div class="content-box-large box-with-header">          
  <div class="panel-heading">




            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">


      
<?php
// se recibe la variable criterio del formulario anteior, como se manda con GET se recive con GET
// el GET debe ir en Mayusculas
$criterio = $_POST['criterio'];
//se manda llamar a el archivo "conexion.php" en el cual nos conectamos a la Base de datos



$sql = "SELECT idmar, nmarcas, detalle, activo, ruta
  FROM marcas 
WHERE (idmar  LIKE '%$criterio%' OR nmarcas  LIKE '%$criterio%' 
OR detalle  LIKE '%$criterio%' OR activo  LIKE '%$criterio%' 
) AND  idpro = $idpro ORDER BY idmar";





//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta = mysql_query($sql) or die ("Error de consulta");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$cuantos = mysql_num_rows($consulta);

//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)
{
echo "<center><h2>No existe ningúna marca con el dato <b>''$criterio''</b> por el momento</h2><center><br>";
}
//
else
{


//Crea una tabla con borde 1, y crea los encabezados de mi tabla

echo "<tr><th>Foto</th><th>Marcas</th><th>Reseña</th><th>Activo</th><th>Opciones</th></tr>";




for($y=0;$y<$cuantos;$y++)
  
  {
$idmar = mysql_result ($consulta,$y,'idmar');
$nmarcas = mysql_result ($consulta,$y,'nmarcas');
$detalle = mysql_result ($consulta,$y,'detalle');
$activo = mysql_result ($consulta,$y,'activo');
$ruta = mysql_result ($consulta,$y,'ruta');




echo "<tr><td><center><img src ='$ruta' height = 100><center></td><td>$nmarcas</td><td>$detalle</td><td>$activo</td><td><a href='modificarmarca.php?idmar=$idmar'</a>
      <a href='modificarmarca.php?idmar=$idmar'</a> <button class='btn btn-default btn-xs'><i class='glyphicon glyphicon-pencil'></i></button> </a></li><a href='elimina_marca.php?idmar=$idmar'</a> <button class='btn btn-default btn-xs'><i class='glyphicon glyphicon-remove'></i></button> </a></li></td></tr>";


  }

echo "</table>";

echo "<form action = 'marcas.php'>
                <center><button type='submit' value='Buscar cliente' class='btn btn-primary'>Otra Búsqueda</button></center>
                </form>";

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
</div>
</div>
</div>


<br><br>
<br><br>
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