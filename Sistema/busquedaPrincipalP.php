<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">

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
                <a class="navbar-brand" href="/xampp2/elmundodelastic.com/index.php"><img src="/img/logo.png" alt="El Mundo de las TIC"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="/xampp2/elmundodelastic.com/index.php">Buscador principal</a></li>
                    <li><a href="/xampp2/elmundodelastic.com/acerca.html">¿Quiénes Sómos?</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingresa <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php">Mi Perfil</a></li>
                                                      <li class="divider"></li>
							<li><a href="/xampp2/elmundodelastic.com/registro.php">Iniciar Sesión</a></li>

  							<li><a href="/xampp2/elmundodelastic.com/registro.php">Registrarme</a></li>
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
						<h1>

<?php

$mysqli = new mysqli("localhost", "root", "", "id3664941_elmunticbase");
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos		
if(mysqli_connect_errno()){
	echo 'Conexion Fallida : ', mysqli_connect_error();
	exit();
}

//se manda llamar a el archivo "conexion.php" en el cual nos conectamos a la Base de datos

$estado = $_POST['cbx_estado'];
$categoria = $_POST['cbx_cat'];

echo $estado . "<br>";
echo $categoria;

$estado = "SELECT estado FROM  estado WHERE (idest  = $estado) ";
/*Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$query = "SELECT idest, estado FROM estado WHERE activo= 'si'";
$resultado=$mysqli->query($query);*/

$consulta=$mysqli->query($estado);
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la variable CUANTOS
$y='0';
$estado = mysql_result($consulta,$y,'estado');

$categoria = "SELECT nctat FROM  categorias WHERE (idcat  = $categoria) ";
//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta1 = mysql_query($categoria) or die ("<br>Error de consultac");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$y='0';
$categoria = mysql_result($consulta1,$y,'nctat');

$provedor = "SELECT idpro FROM  provedores where idpro=idpro";
//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta2 = mysql_query($provedor) or die ("<br>Error de consultap");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$y='0';
$provedor = mysql_result($consulta2,$y,'idpro');

echo "<br><h1>$categoria en: $estado</h1>


</h1>";

?>
					</div>
				</div>
			</div>
		</div>
     <!-- Page Title -->
	

        
	    	<div class="container">


				<div class="row">

<?php


$estado1 = $_POST['idest'];
$categoria1 = $_POST['idcat'];

//se manda llamar a el archivo "conexion.php" en el cual nos conectamos a la Base de datos



$sql = "SELECT p.idpro, prod.ruta, cat.nctat, prod.nproductos, prod.descrip, prod.ram, prod.hdd, prod.precio, p.nombreempresa,
prod.procesador


FROM provedores AS p, estado AS e, categorias as cat, productos as prod


WHERE (p.idest  = $estado1 and prod.idcat = $categoria1) AND prod.idpro=p.idpro AND p.idest=e.idest  and cat.idcat=prod.idcat order by prod.precio desc";


//Igualamos para que el id del estado ingresado, sea igual que el id del estado que tiene el provedor
//Igualamos que el id de la categoria ingresada, sea igual que el id de la categoria que tiene el provedor
//igualamos el id del estado, con la tabla estado, con el id del estado en la tabla provedor
//Igualamos que el id del provedor de la tabla provedores, sea igual al id de provedor de la tabla categorias

$consultaG = mysql_query($sql) or die ("<br>Error de consulta");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$cuantos = mysql_num_rows($consultaG);

//aqui se muestra mensaje si hay caracteres no validos
if($cuantos==0)


{

$estado = "SELECT estado
FROM  estado WHERE (idest  = $estado1) ";
//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta = mysql_query($estado) or die ("<br>Error de consulta");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$y='0';
$estado = mysql_result($consulta,$y,'estado');

$categoria = "SELECT nctat
FROM  categorias WHERE (idcat  = $categoria1) ";
//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta1 = mysql_query($categoria) or die ("<br>Error de consulta");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$y='0';
$categoria = mysql_result($consulta1,$y,'nctat');

$provedor = "SELECT idpro, nombreempresa
FROM provedores
WHERE idpro=idpro";
//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta2 = mysql_query($provedor) or die ("<br>Error de consultaaa");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$y='0';
$provedor = mysql_result($consulta2,$y,'idpro');
$provedor = mysql_result($consulta2,$y,'nombreempresa');




echo "<br><center><h2>Lo sentimos, aun no existen provedores con $categoria en: $estado</h2><br>";
//BUTTON PERRON
echo "<input class='button' href='index.php'>Regresar";								
								echo"<a class='btn btn-orange' href='/index.php'>Regresar a la búsqueda</a></center>";


								echo "<hr>";
						echo "</div>";
						echo "</div><br><br><br>";

}
else
{

//Crea una tabla con borde 1, y crea los encabezados de mi tabla

for($y=0;$y<$cuantos;$y++)
  
  {

$idpro = mysql_result($consultaG,$y,'idpro');
$nombreempresa = mysql_result($consultaG,$y,'nombreempresa');
$ruta = mysql_result($consultaG,$y,'ruta');
$nctat = mysql_result($consultaG,$y,'nctat');
$nproductos = mysql_result($consultaG,$y,'nproductos');
$descrip = mysql_result($consultaG,$y,'descrip');
$ram = mysql_result($consultaG,$y,'ram');
$hdd = mysql_result($consultaG,$y,'hdd');
$procesador = mysql_result($consultaG,$y,'procesador');
$precio = mysql_result($consultaG,$y,'precio');

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
								echo "DESCRIPCIÓN: </b>$descrip<br><br>";
								

								echo "RAM: </b>$ram<br><br>";
								echo "CAPACIDAD: </b>$hdd<br><br>
									  PROCESADOR: </b>$procesador<br>				
								
		
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
	    </div>

        <!-- Galeria -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="/Claptone Projects/elmundodelastic.com/js/bootstrap.min.js"></script>
		
		<!-- Scrolling Nav JavaScript -->

    </body>
</html>