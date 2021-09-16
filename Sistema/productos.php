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
//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)
{
echo "<br>Foto";
}
//
else
{


echo "<tr><td><img class='img-responsive' src ='$ruta'></td></tr>";
  

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

                       <li class=><a href="marcas.php"><i class="glyphicon glyphicon-list-alt"></i> Marcas</a></li>
                       <li><a href="serviciosExtras.php"><i class="glyphicon glyphicon-exclamation-sign"></i> Pedidos</a></li>

             
                      
                    
                </ul>
                    </li>
                </ul>
             </div>
      </div>

	

		  <div class="col-md-10">





               <div class="content-box-header">
                  <b>Buscar Productos</b>

            </div>
  <div class="content-box-large box-with-header">          
  <div class="panel-heading">



       

                           <form action = 'buscarproducto2.php' method= "POST">

 <div class="input-group form">
                          <input class="form-control input-xs" placeholder="Criterio" type="text" name = 'criterio'>
                         <span class="input-group-btn">
<button type="submit" value="Buscar producto" class="btn btn-primary">
                    Buscar
                  </button>                         </span>
                    </div>

                                    </form>



          </div>
        </div>


    <!-- Tablas (SELECT * CLIENTES) -->

  			
               <div class="content-box-header">
                    <b>Mis Productos</b>
                  </div>

  <div class="content-box-large box-with-header">          

        
  					<div class="table-responsive">

 

						<?php
// se recibe la variable criterio del formulario anteior, como se manda con GET se recive con GET
// el GET debe ir en Mayusculas





$queryProd = "SELECT  p.idprod, p.nproductos, c.nctat, p.precio ,  p.activo, m.nmarcas, pr.nombreempresa, p.descrip, p.ruta, p.ram, p.hdd, p.procesador
FROM productos AS p, categorias AS c, marcas AS m, provedores AS pr
WHERE p.idcat=c.idcat AND p.idmar=m.idmar AND p.idpro=pr.idpro   AND  p.idpro = $idpro 
ORDER BY p.idprod";
$resProd = $mysqli->query($queryProd);
$cuantos = mysqli_num_rows($resProd);
while($row = $resEmp->fetch_assoc()) {
  
  $idprod = $row['idprod'];
  $nproductos = $row['nproductos'];
  $nctat = $row['nctat'];
  $precio = $row['precio'];
  $activo = $row['activo'];
  $ruta = $row['ruta'];
  $nmarcas = $row['nmarcas'];
  $descrip = $row['descrip'];
  $ram = $row['ram'];
  $hdd = $row['hdd'];
  $procesador = $row['procesador'];


}
echo "Bienvenido $nombreempresa";

//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)
{
echo "<center><h2>Aún no tienes ningun <b>producto</b> registrado </h2>

 <b>Nota:</b> Si registras un <b><a href='productos.php'> Producto</a></b>, no olvides <b>primero</b>
  registrar una <b><a href='marcas.php'> Marca</a></b></b> para el <b> Producto</b><br><br>.

<img src ='ImPro/sombraprod.png' height = 100></center><br>

";
}
//
else
{

echo "<table class='table table' >";

//Crea una tabla con borde 1, y crea los encabezados de mi tabla
echo "<tr><th>Foto</th><th>Producto</th><th>Marca</th><th>Precio</th><th>Activo</th><th>Descripción</th><th>Categoría</th><th>Memroria RAM</th><th>Almacenamiento</th><th>Procesador</th><th>Opciones</th></tr>";

echo "<tr><td><center><img src='$ruta' height = 100><center></td><td>$nproductos</td><td>$nmarcas</td><td>$$precio.00</td>
<td>$activo</td><td>$descrip</td><td>$nctat</td>";




            if($ram=$ram)
            {
            echo"<td>$ram</td>";
            }
            else{
             echo"<td>NA</td>";
            }

            if($hdd=$hdd)
            {
            echo"<td>$hdd</td>";
            }
            else{
             echo"<td>NA</td>";
            }

            if($procesador=$procesador)
            {
            echo"<td>$procesador</td>";
            }
            else{
             echo"<td>NA</td>";
            }



echo"<td><a href='modificarproducto.php?idprod=$idprod'</a><button class='btn btn-default btn-xs'><i class='glyphicon glyphicon-pencil'></i></button> </a></li>

  <a href='eliminar_producto.php?idprod=$idprod'</a> <button class='btn btn-default btn-xs'><i class='glyphicon glyphicon-remove'></i></button> </a></li></td></tr>";
  

echo "</table>";

}





?>

  <form action = 'altaproducto.php'>


                <center><button type="submit" value="Buscar Producto" class="btn btn-primary">Registrar Nuevo Producto</button></center>

             <br>


                </form>
                </table>
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