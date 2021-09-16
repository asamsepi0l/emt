<!DOCTYPE html>
<html class="no-js">
<html lang="en">

<head>

    <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""><meta name="author" content="">

    <title>El mundo de las TIC</title>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="/Claptone Projects/elmundodelastic.com/css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
	<link rel="stylesheet" href="/Claptone Projects/elmundodelastic.com/css/main.css">
    <link href="/Claptone Projects/elmundodelastic.com/css/custom.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Custom Fonts & Icons -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/Claptone Projects/elmundodelastic.com/css/icomoon-social.css">
	<link rel="stylesheet" href="/Claptone Projects/elmundodelastic.com/css/font-awesome.min.css">
	<script src="/Claptone Projects/elmundodelastic.com/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
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
	<body>
		<div id="page-wrapper">

			<!-- Header -->
		<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="/Elmundo/index.php"><img src="/Elmundo/img/logo.png" alt="El Mundo de las TIC"></a>

            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="/Elmundo/index.php">Buscador principal</a></li>
                    <li><a href="/Elmundo/acerca.html">¿Quiénes Sómos?</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingresa <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php">Mi Perfil</a></li>
                                                      <li class="divider"></li>
							<li><a href="/Elmundo/registro.php">Iniciar Sesión</a></li>

  							<li><a href="/Elmundo/registro.php">Registrarme</a></li>
                        </ul>
                    </li>
                   
                </ul>
            </div>
        </div>

    </header>


    <div class='section section-breadcrumbs'>
			<div class='container'>
				<div class='row'>
					<div class='col-md-12'>
<?php
		
	$idpro= $_POST['idpro'];
	$email= $_POST['email'];
	$nombre= $_POST['nombre'];
	$comentario= $_POST['comentario'];
	echo "$email<br>$nombre<br>$comentario";

	include('classcommentario.php');

	$comentariosp = new comment();

	$comentariosp->setidpro($idpro);
	$comentariosp->setemail($email);
	$comentariosp->setnombre($nombre);
	$comentariosp->setcomentario($comentario);
	$resultado = $comentariosp->insertaComment();



	echo"Comentario Agregado, <a href='datos.php?idpro=$idpro'>REGRESAR</a>'"


?>

<?php header("Location:  datos.php?idpro=$idpro"); ?>



</div></div></div></div></div></div></div>

						<!-- End Pricing Plans Wrapper -->
	        		</div>
	        	</div>
	    	</div>
	    </div>
				</div>
			</div>
	 
	   				<!-- FINPRODUCTOS -->
	   				<!-- COMENTARIOS -->
</div>




	   				<!-- FINCOMENTARIOS -->

</body>




					<!-- FIN -->
 

 
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
		    				<img src="/Elmundo/img/icons/facebook.png" width="32" alt="Facebook">
		    				<img src="/Elmundo/img/icons/twitter.png" width="32" alt="Twitter">
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
        <script src="/Elmundo/js/bootstrap.min.js"></script>
		
		<!-- Scrolling Nav JavaScript -->

    </body>
</html>