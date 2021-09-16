<!DOCTYPE html>
<html class="no-js">
<html lang="en">
<link rel="shortcut icon" href="img\icons\icoUAMEX.ico" />
<head>

    <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""><meta name="author" content="">
	
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
				<h1>Inicia Sesión			                    											
				<?php
				if (isset($_GET['mensaje'])) {
					$mensaje = $_GET['mensaje'];
				} 
				else{
					$mensaje = "";
				}
				echo " <a class=''><center><h4> $mensaje</h4><center></a>";
				?></h1>						
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
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
				echo "<div class='input-group'>";
				echo "<br><br>Contraseña<input class='form-control input-xl' required type='password' name='pswd'/>
				</div>";
				?>
				<br><button type="submit" class="btn btn-orange">Iniciar Sesión</button>
				</form>
			</section>
</div>
<div class="col-sm-8">
<div class=" ">
<div class="">
<h2>Crear Cuenta</h2>
<hr>
</div>

<?php







$mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
if(mysqli_connect_errno()){
	echo 'Conexion Fallida : ', mysqli_connect_error();
	exit();
}

	$query = "SELECT idest, estado FROM estado WHERE activo= 'si'";
	$resultado=$mysqli->query($query);

	$query1 = "SELECT idcat, nctat FROM categorias";
	$resultado1=$mysqli->query($query1);

echo "<h3>Ingresa tus datos</h3>";

echo "<form action ='registro2.php' method = 'POST' enctype='multipart/form-data' >";
	echo "<div class='col-sm-6'>";
	echo "<div class='input-group '>";
	echo "Correo<input class='form-control input-xl' required type='text' name='correo'/></div></div>";
	echo "<div class='col-sm-6'>";
	echo "<div class='input-group '>";
	echo "Contraseña<input   class='form-control input-xl' required type='password' name='pswd'/></div></div>";
	echo "<div class='col-sm-6'>";
	echo "<div class='input-group '>";

	echo "<br><br>Nombre de Usuario (User123)<input  class='form-control input-xl' required type='text' name='nombreempresa'/>
	</div></div>";

	/*/echo "<div class='6u 12u$(xsmall)'>";
	echo "Sitio Web <input required type='text' name='web'/>";
	echo "</div>";/*/
	echo "<div class='col-sm-6'>";
	echo "<div class='input-group'>";
	echo "<br><br>Telefono (10 Dígitos)<input class='form-control input-xl' required type='text' name='telefono'/></div></div>";
	/*/echo "<div class='6u 12u$(xsmall)'>";
	echo "Dirección <input required type='text' name='direccion'/>";
	echo "</div>";/*/
	echo "<div class='col-sm-6'>";
	echo "<br><br>Foto<input  class='form-control input-xl' type = 'file' name = 'archivo'></div><br>";
	echo "<div class='col-sm-6'>";
	echo "<br><br>Seré un usuario Activo<input  class='form-control input-xl' required type='checkbox' id='activo' name='activo' checked value='SI'></div>";
	?>

	<select name="cbx_estado" id="cbx_estado">
	<option value="0">Seleccionar Estado</option>
	<?php while($row = $resultado->fetch_assoc()) { ?>
	<option value="<?php echo $row['idest']; ?>"><?php echo $row['estado']; ?></option>
	<?php } ?>
	</select>

	
	<div class='col-sm-6'>
	<br><br><input class='form-control input-xl' type='reset' value='Borra todo' />
	</div>
	<br><br><input class='btn btn-orange' type='submit' value='Registrate' >
</form>

</div>
</div>
</div>




					<!-- End Sidebar -->
				</div>


							</div>
						
					
					<!-- End Blog Post -->
					<!-- Sidebar -->
				

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