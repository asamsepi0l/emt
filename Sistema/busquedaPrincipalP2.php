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
			<a class="navbar-brand" href="/Claptone Projects/elmundodelastic.com/index.php">
			<img src="/Claptone Projects/elmundodelastic.com/img/logo.png" alt="El Mundo de las TIC"></a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="/Claptone Projects/elmundodelastic.com/index.php">Buscador principal</a></li>
				<li><a href="/Claptone Projects/elmundodelastic.com/acerca.html">¿Quiénes Sómos?</a></li>
				
					<?php
					echo"
				<li class='dropdown'>
					<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Ingresa <i class='icon-angle-down'></i></a>
					<ul class='dropdown-menu'>
						<li><a href='Sistema/index.php'>Mi Perfil</a></li>
													<li class='divider'></li>
						<li><a href='/Claptone Projects/elmundodelastic.com/registro.php'>Iniciar Sesión</a></li>

						<li><a href='/Claptone Projects/elmundodelastic.com/registro.php'>Registrarme</a></li>
					</ul>
				</li>"
				?>


			</ul>
		</div>
	</div>

</header>

<div class="section section-breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>
					<?php
						$mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
						//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
						if(mysqli_connect_errno()){
							echo 'Conexion Fallida : ', mysqli_connect_error();
							exit();
						}
						//Variables de combo
						$idEst = $_POST['cbx_estado'];
						$idCat = $_POST['cbx_cat'];

						$queryEst = "SELECT estado FROM  estado WHERE (idest  = $idEst) ";
						$resEst = $mysqli->query($queryEst);

						while($row = $resEst->fetch_assoc()) {$estado = $row['estado'];}

						$queryCat = "SELECT nctat FROM categorias WHERE (idcat  = $idCat) ";
						$resCat = $mysqli->query($queryCat);

						while($row = $resCat->fetch_assoc()) {$categoria = $row['nctat'];}

						$queryProv = "SELECT idpro FROM  provedores where idpro=idpro";
						$resProv = $mysqli->query($queryCat);
						while($row = $resCat->fetch_assoc()) {echo $row['idpro'];}

						echo "<h1>$categoria en: $estado</h1>";
					?>
			</div>
		</div>
	</div>
</div>
<!-- Page Title -->

<div class="container">
	<div class="row">

	<?php

		$estado1 = $idEst;
		$categoria1 = $idCat;
		$queryPrs = "SELECT p.idpro, prod.ruta, cat.nctat, prod.nproductos, 
		prod.descrip, prod.ram, prod.hdd, prod.precio, p.nombreempresa, prod.procesador 
		FROM provedores AS p, estado AS e, categorias as cat, productos as prod
		WHERE (p.idest  = $estado1 and prod.idcat = $categoria1) AND prod.idpro = p.idpro
		AND p.idest = e.idest AND cat.idcat = prod.idcat order by prod.precio desc";

		$resPrs = $mysqli->query($queryPrs);
		$cuantos = mysqli_num_rows($resPrs);

		if($cuantos==0)

		{
			$queryEst = "SELECT estado FROM  estado WHERE (idest  = $estado1) ";
			$resEst = $mysqli->query($queryEst);
			while($rowE = $resEst->fetch_assoc()) {$estado = $rowE['estado'];}

			$queryCat = "SELECT nctat FROM categorias WHERE (idcat  = $categoria1) ";
			$resCat = $mysqli->query($queryCat);
			while($rowC = $resCat->fetch_assoc()) {
				$categoria = $rowC['nctat'];}

			$queryProv = "SELECT idpro, nombreempresa FROM provedores where idpro=idpro";
			$resProv = $mysqli->query($queryProv);
			while($rowP = $resProv->fetch_assoc()){
				$provedor = $rowP['idpro']; $provedor = $rowP['nombreempresa'];}

			echo "<br><center><h2>Lo sentimos, aun no existen provedores con $categoria en: $estado</h2><br>";
			echo "<input class='button' href='index.php'><br><br>";			
			echo"<a x='btn btn-orange' href='/Claptone Projects/xampp/elmundodelastic.com/index.php'>Regresar a la búsqueda</a></center>";
			echo "<hr></div></div><br><br><br>";

		}

		else

		{

			//for($y=0;$y<$cuantos;$y++){
			
				while($rowProv = mysqli_fetch_array($resPrs))
				{
					$idpro = $rowProv['idpro'];
					$nombreempresa = $rowProv['nombreempresa'];
					$idpro = $rowProv['idpro'];
					$nombreempresa = $rowProv['nombreempresa'];
					$ruta = $rowProv['ruta'];
					$nctat = $rowProv['nctat'];
					$nproductos = $rowProv['nproductos'];
					$descrip =  $rowProv['descrip'];
					$ram =  $rowProv['ram'];
					$hdd =  $rowProv['hdd'];
					$procesador =  $rowProv['procesador'];
					$precio =  $rowProv['precio'];

					if ($nctat=="Laptop" or $nctat=="PC Escritorio")
					{
						echo"<div class='section'>
						<div class='container'>
						<div class='row'>
						<div class='col-sm-3'>
							<div class='blog-post blog-single-post'>
								<div class='single-post-title'>
								</div>
								<div class='single-post-image'>
									<img src='$ruta' alt='Post Title'>
								</div>
								<div class='single-post-content'>	
								</div>
								<a class='btn' href='datos.php?idpro=$idpro'</a>Ver más</a><br><br>
							</div>
						</div>
						<div class='col-sm-9'>
							<div class='blog-post blog-single-post'>
								<div class='single-post-title'>
									<h2>$nproductos<h3> Proveedor: $nombreempresa</h3></h2> 
									PRECIO: $$precio.00<br><br>
								</div>
								<div class='single-post-content'>
									PRECIO: $$precio.00<br><br>
									TIPO: </b>$nctat<br><br>
									DESCRIPCIÓN: </b>$descrip<br><br>
									RAM: </b>$ram<br><br>
									CAPACIDAD: </b>$hdd<br><br>
									PROCESADOR: </b>$procesador<br>				
								</div>
							</div>
						</div>
						</div></div></div><hr>";
					}
					else
					{
						echo"<div class='section'>
						<div class='container'>
						<div class='row'>
						<div class='col-sm-3'>
							<div class='blog-post blog-single-post'>
								<div class='single-post-image'>
									<img src='$ruta' alt='Post Title'>
									<b>Proveedor:</b> $nombreempresa<br>
									<b>Precio:</b> $$precio<br>
								</div>
							</div>
						</div>
						<div class='col-sm-9'>
							<div class='blog-post blog-single-post'>
								<div class='single-post-title'>
									<h2>$nproductos<h3>
								</div>
								<div class='single-post-content'>	
									<b>TIPO: </b>$nctat<br>
								</div>
								<b>DESCRIPCIÓN: </b>$descrip<br><br>
								<a class='btn' href='datos.php?idpro=$idpro'</a>Ver más</a>
							</div>
						</div>
						</div></div></div><hr>";
					}
				}
			//}
		}
	?>
					<div class='pagination-wrapper '>
						<ul class='pagination pagination-sm'>
							<li class='disabled'><a href='#'>Anterior</a></li>
							<li class='active'><a href='#'>1</a></li>
							<li><a href='#'>2</a></li>
							<li><a href='#'>3</a></li>
							<li><a href='#'>4</a></li>
							<li><a href='#'>5</a></li>
							<li><a href='#'>Siguiente</a></li>
						</ul>
					</div>				
				</div>
			</div>
	    </div>
</body>
			<!-- Blog Post Excerpt -->
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

        <!-- Galeria -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="/Claptone Projects/elmundodelastic.com/js/bootstrap.min.js"></script>
		<!-- Scrolling Nav JavaScript -->

    </body>
</html>