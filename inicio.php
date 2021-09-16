<!DOCTYPE html>
<html class="no-js">
<html lang="en">

<head>

    <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""><meta name="author" content="">
	<link rel="shortcut icon" href="img\icons\icoUAMEX.ico" />
    <title>El mundo de las TIC</title>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

<body>

<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Navegación</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">
				<img src="img/logo.png" alt="El Mundo de las TIC"></a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="index.php">Buscador principal</a></li>
				<li><a href="acerca.html">¿Quiénes Sómos?</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingresa <i class="icon-angle-down"></i></a>
					<ul class="dropdown-menu">
						<li><a href="Sistema/index.php">Mi Perfil</a></li>
													<li class="divider"></li>
						<li><a href="registro.php">Iniciar Sesión</a></li>

						<li><a href="registro.php">Registrarme</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
	</div>

</header><!--/header-->


	   <!-- Page Title -->
		
    <section id="main-slider" class="no-margin">


        <div class="carousel slide">


            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(img/slides/1.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content centered">
                                    <h2 class="animation animated-item-1">!BIENVENIDO!<BR></h2>
                                    <p class="animation animated-item-2"><br> El Mundo de las TIC </p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
                <div class="item" style="background-image: url(img/slides/2.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content center centered">
                                    <h2 class="animation animated-item-1">ERES NUEVO AQUÍ?, ADÉNTRATE</h2>
                                    <p class="animation animated-item-2">¿No sabes donde conseguir unos buenos cables de red para tu Cyber Café?, ¿Te preocupa que tu PC se vuelva obsoleta?... ¿Cambiar HDD por un SSD?, ¿Más memoria RAM?, Encuentra todo aquí mismo.</p>
                                    <br>
                                    <a class="btn btn-md animation animated-item-3" href="registro.php">Registrate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
                <div class="item" style="background-image: url(img/slides/3.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content centered">
                                    <h2 class="animation animated-item-1">PUBLICATE CON NOSOTROS</h2>
                                    <p class="animation animated-item-2">Es fácil, y rápido </p>
                                    <br>
									<a class="btn btn-md animation animated-item-3" href="registro.php">Ingresa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="icon-angle-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="icon-angle-right"></i>
        </a>
    </section>


    <!--/#main-slider-->

	
		<!-- Call to Action Bar -->
	 
		<!-- End Call to Action Bar -->


		<!-- Services -->
        <div class="section section-white">
	        <div class="container">
	        	<div class="row">

				<div class="section-title">
				<h1>Busca algún Producto</h1>
				</div>
	        		<div class="col-md-4 col-sm-6">
	        			<div class="service-wrapper">

		        			<i class="icon-home"></i>
		        			<h3><h1>Municipio </h1> </span><br>

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

?>

	<body>
		<form id="combo" name="combo" action="Sistema/busquedaPrincipalP2.php" method="POST">
			<div>Selecciona Estado : <select name="cbx_estado" id="cbx_estado">
				<option value="0">Seleccionar Estado</option>
				<?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['idest']; ?>"><?php echo $row['estado']; ?></option>
				<?php } ?>
			</select></div>
			<div><select name="cbx_cat" id="cbx_cat">
				<option value="0">Seleccionar Catego</option>
				<?php while($row = $resultado1->fetch_assoc()) { ?>
					<option value="<?php echo $row['idcat']; ?>"><?php echo $row['nctat']; ?></option>
				<?php } ?>
		</select></div>
			<input type="submit" id="enviar" name="enviar" value="Guardar" />
		</form>
	</body>

			</select>

			<?php
			//enctype='multipart/form-data 
				echo "</select>
				</h3>				
				</div>
				</div>
				<div class='col-md-4 col-sm-6'>
				<div class='service-wrapper'>
				<i class='icon'></i>
				<h3> <br><br><button value='Buscar' class='btn btn-xg'>BUSCAR</button>
			</h3>";
		    ?>
		        		</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	    </div>

        <div class="section section-white">
	        <div class="container">
	        	<div class="row">
	
				<div class="section-title">
				<h1>Nuestros productos más recientes</h1>
				</div>
	
			<ul class="grid cs-style-3">
	        	<div class="col-md-4 col-sm-6">
					<figure>
						<img src="img/portfolio/4.jpg" alt="img04">
						<figcaption>
							<h3>Settings</h3>
							<span>Jacob Cummings</span>
							<a href="portfolio-item.html">Take a look</a>
						</figcaption>
					</figure>
	        	</div>	
				<div class="col-md-4 col-sm-6">
					<figure>
						<img src="img/portfolio/1.jpg" alt="img01">
						<figcaption>
							<h3>Camera</h3>
							<span>Jacob Cummings</span>
							<a href="portfolio-item.html">Take a look</a>
						</figcaption>
					</figure>
				</div>
				<div class="col-md-4 col-sm-6">
					<figure>
						<img src="img/portfolio/2.jpg" alt="img02">
						<figcaption>
							<h3>Music</h3>
							<span>Jacob Cummings</span>
							<a href="portfolio-item.html">Take a look</a>
						</figcaption>
					</figure>
				</div>

				<hr>

						<ul class="grid cs-style-3">
				        	<div class="col-md-4 col-sm-6">
								<figure>
									<img src="img/portfolio/8.jpg" alt="img04">
									<figcaption>
										<h3>DELL KiiU82</h3>
										<span>Dell i5 16 GB RAM, 1 TB HDD, 43', Audifonos Beat</span>
										<a href="portfolio-item.html">$ 18.000.00</a>
									</figcaption>
								</figure>
				        	</div>	
							<div class="col-md-4 col-sm-6">
								<figure>
									<img src="img/portfolio/7.jpg" alt="img01">
									<figcaption>
										<h3>Camera</h3>
										<span>Jacob Cummings</span>
										<a href="portfolio-item.html">Take a look</a>
									</figcaption>
								</figure>
							</div>
							<div class="col-md-4 col-sm-6">
								<figure>
									<img src="img/portfolio/6.jpg" alt="img02">
									<figcaption>
										<h3>Music</h3>
										<span>Jacob Cummings</span>
										<a href="portfolio-item.html">Take a look</a>
									</figcaption>
								</figure>
							</div>
		
		
			</ul>
	        	</div>
	        </div>
	    </div>

			
<hr>

		<!-- Our Clients -->
	    <div class="section">
	    	<div class="container">
			
				<div class="section-title">
				<h1>Nuestras marcas de TIC</h1>
				</div>

			<div class="clients-logo-wrapper text-center row">
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-1.jpg" alt="Client Name"></center></a></div>
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-2.jpg" alt="Client Name"></center></a></div>
						
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-3.jpg" alt="Client Name"></center></a></div>
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-5.jpg" alt="Client Name"></center></a></div>
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-6.jpg" alt="Client Name"></center></a></div>
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-7.jpg" alt="Client Name"></center></a></div>
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-8.jpg" alt="Client Name"></center></a></div>
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-9.jpg" alt="Client Name"></center></a></div>
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-10.jpg" alt="Client Name"></center></a></div>
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-11.jpg" alt="Client Name"></center></a></div>
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-12.jpg" alt="Client Name"></center></a></div>
						<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><center><img src="img/logos/logo-4.jpg" alt="Client Name"></center></a></div>

				</div>
			</div>
	    </div>
		
	    <!-- End Our Clients -->

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