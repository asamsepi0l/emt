<!DOCTYPE html>
<html class="no-js">
<html lang="en">

<head>

    <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""><meta name="author" content="">
	<link rel="shortcut icon" href="img\icons\icoUAMEX.ico" />
    <title>El mundo de las TIC</title>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
	<link rel="stylesheet" href="css/main.css">
    <link href="css/custom.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Custom Fonts & Icons -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/icomoon-social.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

</head>

<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="El Mundo de las TIC"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Buscador principal</a></li>
                    <li><a href="acerca.html">¿Quiénes Sómos?</a></li>

                    <li  class="active" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingresa <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php">Mi Perfil</a></li>
                                                      <li class="divider"></li>
							<li><a href="#">Iniciar Sesión</a></li>

  							<li><a href="registro.php">Registrarme</a></li>
                        </ul>
                    </li>
                   
                </ul>
            </div>
        </div>

</header>

		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Inicia Sesión</h1>
					</div>
				</div>
			</div>
		</div>

	    <div class="container">
			<div class="row">
				<!-- Blog Post -->
				<div class="col-sm-4">
				<section>
<h2>Iniciar Sesión</h2>
<hr>
<p><h3>Ingresa tus datos</h3></p>
<form action = 'Sistema/validarLogin.php' method = 'POST'>
	<?php
	echo "<div class='input-group '>";
	echo "Correo<input class='form-control input-xl' required type='text' name='correo'/>
	</div>";
	echo "<div class='input-group '>";
	echo "<br><br>Contraseña<input   class='form-control input-xl' required type='password' name='pswd'/>
	</div>";
	?>
	<br><button type="submit" class="btn btn-orange">Iniciar Sesión</button>
</form>

<?php
if (isset($_GET['mensaje'])) {
$mensaje = $_GET['mensaje'];
} else {
$mensaje = "";
}
echo " <a class=''><h2>$mensaje</h2></a>";
?>
</section>
</div>

<?php
	$nombreempresa= $_POST['nombreempresa'];
    /*/$direccion= $_POST['direccion'];/*/
    $correo= $_POST['correo'];
    $telefono= $_POST['telefono'];
	/*/ $web= $_POST['web'];/*/
	$idest = $_POST['cbx_estado'];
    $pswd= $_POST['pswd'];
    $activo= $_POST['activo'];
    /*/$giro= $_POST['giro'];/*/


include 'Sistema/validacionesprovedor.php';


$validaciones=new validaciones();
$valida = "OK";

echo "<div class='col-sm-8'>";

if($validaciones->validacadenas($nombreempresa)=="error")
{

	echo"<H2>-El nombre es incorrecto</H2>";
	$valida="error sistema";

}

/*/if($validaciones->validacadenas($direccion)=="error")
{

	echo"<H4>La direccion es incorrecta</H4>";
	$valida="error sistema";

}/*/

if($pswd=="")
{
	echo"<H2>Fatla contraseña</H2>";
	$valida="error sistema";
}


if($validaciones->validaEmail($correo)=="error")
{
	echo"<H2>-El correo no es válido</H2>";
	$valida="error sistema";
}

if($validaciones->validanumero($telefono)=="error")
{
	echo"<H2>-El numero telefónico no es válido</H2>";
	$valida="error sistema";
}

/*/if($validaciones->validaweb($web)=="error")
{
	echo"<H4>El URL es incorrecto</H4>";
	$valida="error sistema";
}/*/


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
	and $extension<>'JPEG')
    {
    echo "ERROR!! El archivo no es imagen";
    $valida = "Error SISTEMA";
    }
}


if($valida=="OK")
{
$ok=1;
if ($_FILES['archivo']['name']<>"")
{
  $nombrearchivo = time().$_FILES ['archivo']['name'];
  $cortaarchivo=explode('.',$nombrearchivo);
  $extension =$cortaarchivo[1];
  /*/echo "<br>La extension del archivo es: ".$extension;
  echo "<br>$nombrearchivo<br>";/*/
  if($extension<>'jpg' and $extension<>'png' and $extension<>'gif')
    {
    echo " El archivo no es imagen <br>";
    $ok = 0;
    }
}
else
{
 $nombrearchivo = "sombra.png";
}
if($ok==1)
{
  include ('Sistema/conexion.php');
  $conexion = new conexion();
  $conexion->conecta();
  include('Sistema/classprovedor.php');
  $provedores = new provedores();
  $provedores->setnombreempresa($nombreempresa);
  /*/$provedores->setdireccion($direccion);/*/
  $provedores->setcorreo($correo);
  $provedores->settelefono($telefono);
  /*/$provedores->setweb($web);/*/
  $provedores->setidest($idest);
  $provedores->setpswd($pswd);
  $provedores->setarchivo($nombrearchivo);
  $provedores->setactivo($activo);
  /*/$provedores->setgiro($giro);/*/
  $provedores->setruta("ImProv/$nombrearchivo");
  $resultado = $provedores->insertaProv();
  if ($resultado == 1)
  {
  move_uploaded_file($_FILES['archivo']['tmp_name'],"Sistema/ImProv/$nombrearchivo");

echo"<div class=' '>
<div class=''>
<h2>¡Bienvenido <b>$nombreempresa!</b></h2><hr>
</div>";
echo "<h2>¡Ya eres miembro del Mundo de las TIC...!</h2>";
echo "<h2>A continuación puedes personalizar tu perfil y 
dar de alta tus clientes y productos, solo es cuestión de un par de minutos...<br>
Inicia Sesión con tu correo: <b>$correo</b>";
echo " <ul class='actions small'>
<br>";
}
else
{
echo "<div id='main' class='wrapper style1'>";
echo "<div class='container'>";
echo "<br><H2>Error la clave ya existe<H2>";
echo "<a href='registro.php'' class='button small'>Regresar</a><br><br>";
echo "</div>";
echo "</div>";	
echo "</div>";
echo "</div>";
}
}
}
else{
echo "Rectifica tus datos...<br><br>
<a href='registro.php'' class='button small'>Regresar</a><br>";}
//aqui se muestra mensaje si hay caracteres no validos
?>
</div>
</div>
</div>
</div>
						
						
  <!-- Footer -->
	    <div class="footer">
	    	<div class="container">
			
		    	<div class="row">
				
		    		<div class="col-footer col-md-4 col-xs-6">
		    			<h3>Contacto</h3>
		    			<p class="contact-us-details">
	        				<b>Dirección:</b> Calle Niños Héroes, Emiliano Zapata #273<br/>
	        				<b>Teléfomo:</b> +55 722 5855498<br/>
	        				<b>Email:</b> <a href="mailto:info@yourcompanydomain.com">al221411597@gmail.com</a>
	        			</p>
		    		</div>				
		    		<div class="col-footer col-md-4 col-xs-6">
		    			<h3>Redes sociales</h3>
						<p>Para estar enterados de las nuevas tendencias.</p>
		    			<div>
		    				<img src="img/icons/facebook.png" width="32" alt="Facebook">
		    				<img src="img/icons/twitter.png" width="32" alt="Twitter">
						</div>
		    		</div>
		    		<div class="col-footer col-md-4 col-xs-6">
		    			<h3>Acerca de nosotros</h3>
		    				<p>Somos una empresa nueva, fresca e inovadora para marketing en TIC.</p>
		    		</div>

		    	</div>
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">&copy; 2017 <a href="http://www.vactualart.com/portfolio-item/basica-a-free-html5-template/">El Mundo de las TIC</a> Brian Alonso Barbosa<a href="http://www.facebook.com"></a>.</div>
		    		</div>
		    	</div>
		    </div>
	    </div>

        <!-- Galeria -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
		
		<!-- Scrolling Nav JavaScript -->

    </body>
</html>