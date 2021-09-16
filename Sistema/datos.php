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
						<a class="navbar-brand" href="/Claptone Projects/elmundodelastic.com/index.php"><img src="/Claptone Projects/elmundodelastic.com/img/logo.png" alt="El Mundo de las TIC"></a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="/Claptone Projects/elmundodelastic.com/index.php">Buscador principal</a></li>
							<li><a href="/Claptone Projects/elmundodelastic.com/acerca.html">¿Quiénes Sómos?</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingresa <i class="icon-angle-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="index.php">Mi Perfil</a></li>
															<li class="divider"></li>
									<li><a href="/Claptone Projects/elmundodelastic.com/registro.php">Iniciar Sesión</a></li>

									<li><a href="/Claptone Projects/elmundodelastic.com/registro.php">Registrarme</a></li>
								</ul>
							</li>
						</ul>
					</div>	
				</div>
    	</header>    

<?php

	$mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
	//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

	$idpro = $_GET['idpro'];

	$queryPrs = "SELECT p.idpro, p.nombreempresa, p.correo, p.direccion, p.web, 
	e.estado, p.ruta, p.idest, p.giro, p.telefono, p.video
	FROM provedores AS p, estado AS e WHERE (p.idpro  = $idpro) AND p.idest=e.idest";
	$resPrs = $mysqli->query($queryPrs);

	while($rowProv = mysqli_fetch_array($resPrs))
				{

					$idpro = $rowProv['idpro'];
					$nombreempresa = $rowProv['nombreempresa'];
					$giro =  $rowProv['giro'];
					$correo =  $rowProv['correo'];
					$direccion =  $rowProv['direccion'];
					$video =  $rowProv['video'];
					$web =  $rowProv['web'];
					$estado =  $rowProv['estado'];
					$telefono =  $rowProv['telefono'];
					$ruta = $rowProv['ruta'];
					
				}

echo "<div class='section section-breadcrumbs'>
			<div class='container'>
				<div class='row'>
					<div class='col-md-12'>
						<h1>$nombreempresa</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class='section'>
	    	<div class='container'>
					<div class='row'>

	    			<div class='col-sm-6'>
	    				<div class='product'>
	    					<img class='img-responsive' src='$ruta' alt='Item Name'>
					</div>
	    				
	    				<br><div class=' embed-responsive embed-responsive-16by9'>
						<h3>Nos Ubicamos En</h3>
						<p><strong>Municipio: </strong>$estado<br><br>
						<strong>Dirección: </strong>$direccion<br><br>
						<strong>Teléfono: </strong>$telefono<br><br>
						<strong>Correo: </strong>$correo<br><br>
						<strong>Sitio Web: </strong><code>$web</code><br>
						</p>
			
               			 </div>
	    				
	    			</div>
	    			<!-- End Product Image & Available Colors -->
	    			<!-- DATOS COLUMNA DE 6 -->
	    			<div class='col-sm-6 product-details'>
	<div class='section-title'>
				<h1>Datos</h1>
				</div>						
				<h3>Nosotros</h3>
	    				<p>
						$giro 	    				
						</p>	
					

               			 <br><br><br><br>

<div class='video-responsive'>
    <center><center><iframe  src='https://www.youtube.com/embed/$video?rel=0&autoplay=1' frameborder='0' '></iframe></center>;
</center>
</div>		
						
							
	    			</div>
	    			<!-- DATOS COLUMNA DE 6 -->
	    			
	    		</div>
			</div>
		</div>

		<div class='section section-dark'>
				<div class='row'>
					<div class='col-md-12'>
						<div class='calltoaction-wrapper'>
							<h3>Contactanos, <span style='color:#aec62c; text-transform:uppercase;font-size:24px;'>$nombreempresa!</span> Envíanos un correo y nosotros nos pondremos en contacto contigo para mayor información<br><br>Correo: <a href='http://www.vactualart.com/portfolio-item/basica-a-free-html5-template/' class='btn btn-orange'>$correo </a> Telefono: <a href='http://www.vactualart.com/portfolio-item/basica-a-free-html5-template/' class='btn btn-orange'>$telefono</a><br><br>
						</div>
					</div>
				</div>
		</div>";
                

   ?>

   <hr>
	    	<div class="container">
				<div class="row">			
<!--SECCION DE MARCAS-->
				<div class='section-title'>
				<h1>Nuestras Marcas de TIC</h1>
				</div>			
				<div class='clients-logo-wrapper text-center row'>
<?php
	$queryMar = "SELECT m.nmarcas, m.ruta
	FROM marcas AS m, provedores AS p 
	WHERE (m.idpro=p.idpro) and p.idpro = $idpro ORDER BY m.idmar";
	$resMar = $mysqli->query($queryMar);
	$cuantos = mysqli_num_rows($resMar);

	if($cuantos==0)
	{	
		//
	}
	else
	{
		while($rowMar = mysqli_fetch_array($resMar)){
			$nmarcas = $rowMar['nmarcas'];
			$rutam= $rowMar['ruta'];
			echo "<div class='col-lg-2 col-md-1 col-sm-3 col-xs-6'><h2>$nmarcas</h2>
			<a href='#'><img src='$rutam' alt='Client Name'></a></div>";
		}
	}
?>
	

</div>
					</div>
					</div>
					<!-- End Blog Post Excerpt -->

									
						<!--<div class='pagination-wrapper '>
									<ul class='pagination pagination-sm'>
										<li class='disabled'><a href='#'>Anterior</a></li>
										<li class='active'><a href='#'>1</a></li>
										<li><a href='#'>2</a></li>
										<li><a href='#'>3</a></li>
										<li><a href='#'>4</a></li>
										<li><a href='#'>5</a></li>
										<li><a href='#'>Siguiente</a></li>
									</ul>
								</div>	-->			

	    </div>


	    <hr>

					<!-- PRODUCTOS -->

	<div class="container">
			<div class="row">			
				

<div class='section-title'>
				<h1>Nuestros Productos</h1>
				</div>			
		<div class="section">
	    	<div class="container">
	        	<div class="row">
	        		<div class="col-lg-12">

<?php

$queryProd = "SELECT  p.idprod, p.nproductos, c.nctat, p.precio , 
p.activo, m.nmarcas, pr.nombreempresa, p.descrip, p.ruta, p.ram, p.hdd, p.procesador
FROM productos AS p, categorias AS c, marcas AS m, provedores AS pr
WHERE p.idcat=c.idcat AND p.idmar=m.idmar AND p.idpro=pr.idpro
AND  p.idpro = $idpro ORDER BY p.idprod";

$resProd = $mysqli->query($queryProd);
$cuantos = mysqli_num_rows($resProd);

//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)
{
echo "<br><h2>No hay registro de productos <h2><br>
</div></table>";

}
//
else
{

	while($rowProd = mysqli_fetch_array($resProd)){
        $idprod = $rowProd['idprod'];
		$nproductos = $rowProd['nproductos'];
		$nctat = $rowProd['nctat'];
		$precio = $rowProd['precio'];
		$activo = $rowProd['activo'];
		$descrip = $rowProd['descrip'];
		$ruta = $rowProd['ruta'];
		$nombreempresa = $rowProd['nombreempresa'];
		$nmarcas = $rowProd['nmarcas'];
		$ram = $rowProd['ram'];
		$hdd = $rowProd['hdd'];
		$procesador = $rowProd['procesador'];
       

if ($nctat=="Laptop" or $nctat=="PC Escritorio")
{
	echo"<div class='section'>
	    	<div class='container'>
				<div class='row'>
					<!-- Blog Post Excerpt -->
						<div class='col-sm-3'>
						<div class='blog-post blog-single-post'>
							<div class='single-post-title'>
							</div>

							<div class='single-post-image'>
								<img src='$ruta' alt='Post Title'>
							</div>";
					echo "<br><left><a class='btn' href='datos.php?idpro=$idpro'</a>Ver más</a><br><br></left>";

						echo"</div>
					</div>
<div class='col-sm-9'>
						<div class='blog-post blog-single-post'>
							<div class='single-post-title'>
								<h2>$nproductos<h3></h2> 
 
							</div>

							
							<div class='single-post-content'>
								
									
									  PRECIO: $$precio.00<br><br>";
								echo "<bold>TIPO:</bold> </b>$nctat<br><br>";
								echo "DESCRIPCIÓN: </b>$descrip<br><br>";
								echo "CAPACIDAD: </b>$hdd<br><br>";
								echo "MEMORIA RAM: </b>$ram<br><br>";
								echo "PROCESADOR: </b>$procesador<br><br>



							</div>
						</div>
					</div>
					</div></div></div>";								echo "<hr>";

				}

				else
				{

					echo"<div class='section'>
	    	<div class='container'>
				<div class='row'>
					<!-- Blog Post Excerpt -->
						<div class='col-sm-3'>
						<div class='blog-post blog-single-post'>
							<div class='single-post-title'>
							</div>

							<div class='single-post-image'>
								<img src='$ruta' alt='Post Title'>
							</div>
							<br><left><a class='btn' href='datos.php?idpro=$idpro'</a>Ver más</a><br><br></left>

						</div>
					</div>
<div class='col-sm-9'>
						<div class='blog-post blog-single-post'>
							<div class='single-post-title'>
								<h2>$nproductos<h3>$nombreempresa</h3></h2> 
 
							</div>

							
							<div class='single-post-content'>
								
									
									  PRECIO: $$precio.00<br><br>";
								echo "TIPO: </b>$nctat<br><br>";
								echo "DESCRIPCIÓN: </b>$descrip<br><br>

							</div>
						</div>
					</div>
					</div></div></div>";								echo "<hr>";
				}

					}
				}

				?>



					<div class="container">
			<div class="row">			


<div class='col-sm-12'><h2>COMENTARIOS</h2><br>


     
<div class='panel'><div class='panel-body'>
<div class='col-md-8 col-lg-8 container'>

 <hr>

<form action = 'datos1.php' method = 'POST'>
<?php

echo "<div class='input-group '>";
			echo "Correo<input class='form-control input-xl' required type='text' name='email'/>
</div>";

echo "<div class='input-group '>";
			echo "Nombre<input class='form-control input-xl' required type='text' name='nombre'/>
</div>";

echo "<div class='input-group '>";
			echo "<br><br>Comentario<input   class='form-control input' required type='text' name='comentario'/>
</div>";

echo "<input class='form-control' type='hidden' readonly='readonly' name='idpro' value='$idpro'></td></tr>";

?>

<br><button type="submit" class="btn btn-orange">Comentar</button>

</form>


<?php


$queryComs = "SELECT  c.nombre, c.email, c.comentario, c.idpro
FROM comentarios AS c
WHERE c.idpro = $idpro";

$resComs = $mysqli->query($queryComs);
$cuantos = mysqli_num_rows($resComs);

//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)
{
echo "<br><h2>No existen Comentarios <h2><br>
</div></table>";

}
//
else
{

	while($rowCom = mysqli_fetch_array($resComs))
	{  
	
	$nombre = $rowCom['nombre'];
	$email = $rowCom['email'];
	$comentario = $rowCom['comentario'];
	echo "<br><br><b>Nombre: </b>$nombre<br><br>";
	echo "<b>Email: </b></b>$email<br><br>";
	echo "<b>Comentario:</b> </b>$comentario<br><br>";

	}
}

?>

</div>
</div>
</div>
</div>
</div>




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
		    				<img src="/img/icons/facebook.png" width="32" alt="Facebook">
		    				<img src="/img/icons/twitter.png" width="32" alt="Twitter">
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
        <script src="/Claptone Projects/elmundodelastic.com/js/bootstrap.min.js"></script>
		
		<!-- Scrolling Nav JavaScript -->

    </body>
</html>