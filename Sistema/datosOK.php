<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>El mundo de las TIC</title>

    <!-- Bootstrap Core CSS -->
    <link href="/Elmundo/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link rel="stylesheet" href="/Elmundo/css/main.css">
    <link href="/Elmundo/css/custom.css" rel="stylesheet">

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 
    <!-- Custom Fonts & Icons -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/Elmundo/css/icomoon-social.css">
	<link rel="stylesheet" href="/Elmundo/css/font-awesome.min.css">
	
	<script src="/Elmundo/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	

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




    

            						<?php

include ('conexion.php');
$conexion = new conexion();
$conexion->conecta();

$idpro = $_GET['idpro'];

$sql = "SELECT p.idpro, p.nombreempresa, p.correo, p.direccion, p.web, e.estado, p.ruta, p.idest, p.giro, p.telefono
FROM provedores AS p, estado AS e WHERE (p.idpro  = $idpro) AND p.idest=e.idest";
$consulta = mysql_query($sql) or die ("<br>Error de consulta");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS

$y=0;
$idpro = mysql_result ($consulta,$y,'idpro');
$nombreempresa = mysql_result ($consulta,$y,'nombreempresa');

$giro = mysql_result($consulta,$y,'giro');
$correo = mysql_result($consulta,$y,'correo');
$direccion = mysql_result ($consulta,$y,'direccion');

$web = mysql_result ($consulta,$y,'web');

$estado = mysql_result($consulta,$y,'estado');
$telefono = mysql_result($consulta,$y,'telefono');

$ruta = mysql_result($consulta,$y,'ruta');
$giro = mysql_result($consulta,$y,'giro');






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
					

               			 <br><br><br><br><div class=' embed-responsive text-center'>
    <center><iframe class='embed-responsive' width='450' height='235' src='https://www.youtube.com/embed/cLrI_uyyORQ?rel=0&autoplay=0' frameborder='0' allowfullscreen></iframe></center>
</div>		
						
							
	    			</div>
	    			<!-- DATOS COLUMNA DE 6 -->
	    			
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

$sql = "SELECT m.nmarcas, m.ruta
 FROM marcas AS m, provedores AS p WHERE (m.idpro=p.idpro) and p.idpro = $idpro ORDER BY m.idmar";
//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta = mysql_query($sql) or die ("Error de consulta");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$cuantos = mysql_num_rows($consulta);
//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)
{
}
//
else
{

for($y=0;$y<$cuantos;$y++)
  
  {
$nmarcas = mysql_result ($consulta,$y,'nmarcas');
$rutam = mysql_result ($consulta,$y,'ruta');

echo "	<div class='col-lg-2 col-md-1 col-sm-3 col-xs-6'><h2>$nmarcas</h2><a href='#'><img src='$rutam' alt='Client Name'></a></div>
					
		";

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

$sql = "SELECT  p.idprod, p.nproductos, c.nctat, p.precio ,  p.activo, m.nmarcas, pr.nombreempresa, p.descrip, p.ruta, p.ram, p.hdd, p.procesador
FROM productos AS p, categorias AS c, marcas AS m, provedores AS pr
WHERE p.idcat=c.idcat AND p.idmar=m.idmar AND p.idpro=pr.idpro   AND  p.idpro = $idpro ORDER BY p.idprod";

//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta = mysql_query($sql) or die ("Error de consulta");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$cuantos = mysql_num_rows($consulta);

//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)
{
echo "<br><h2>No hay registro de productos <h2><br>
</div></table>";

}
//
else
{




for($y=0;$y<$cuantos;$y++)
  
  {
$idprod = mysql_result ($consulta,$y,'idprod');
$nproductos = mysql_result ($consulta,$y,'nproductos');
$nctat = mysql_result ($consulta,$y,'nctat');
$precio = mysql_result ($consulta,$y,'precio');
$activo = mysql_result ($consulta,$y,'activo');
$descrip = mysql_result ($consulta,$y,'descrip');
$ruta = mysql_result($consulta,$y,'ruta');
$nombreempresa = mysql_result($consulta,$y,'nombreempresa');
$nmarcas = mysql_result($consulta,$y,'m.nmarcas');
$descrip = mysql_result($consulta,$y,'descrip');
$ram = mysql_result($consulta,$y,'ram');
$hdd = mysql_result($consulta,$y,'hdd');
$procesador = mysql_result($consulta,$y,'procesador');
$precio = mysql_result($consulta,$y,'precio');



if ($nctat=="Laptop" or $nctat=="PC Escritorio")
{
echo"<div class='section'>
	    	<div class='container'>
				<div class='row'>

					<div class='col-sm-9'>
						<div class='blog-post blog-single-post'>
							<div class='single-post-title'>
								<h2>$nproductos<h3>$nombreempresa</h3></h2> 
							</div>

							<div class='single-post-content'>

									  PRECIO: $$precio.00<br><br>";
								echo "TIPO: </b>$nctat<br><br>";
								echo "DESCRIPCIÓN: </b>$descrip<br><br>";
								

								echo "RAM: </b>$ram<br><br>";
								echo "CAPACIDAD: </b>$hdd<br><br>
									  PROCESADOR: </b>$procesador<br>				
								
							</div>
						</div>
					</div>

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
							
							<div class='single-post-content'>
								
		
							</div>
							<a class='btn' href='datos.php?idpro=$idpro'</a>Ver más</a><br><br>

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



<hr>

	<div class="container">
			<div class="row">			

				<div class="col-sm-12"><h2>COMENTARIOS</h2><br>


     
<div class="panel"><div class="panel-body">
<div class="col-md-8 col-lg-8 container">

 <form action="http://www.remodelaclic.com/Welcome/alta2" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="form-group"><label>Nombre </label><input class="form-control border-input" type="text" name="nombre"></div>
<div class="form-group"><label>Correo electronico</label> <input class="form-control border-input" type="text" name="correo"></div>
<div class="form-group">
              <label for="exampleInputEmail1">Comentario</label>
              <textarea class="form-control  border-input" name="comentario" id="comentario" rows="5"> </textarea>
            </div>

<div class="form-group"><label></label></div>
<div class="form-group"><input type="submit" class="btn btn-info" name="userSubmit" value="Añadir">
</div>
 </form>
</div>
</div>
</div>
</div>
</div>
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