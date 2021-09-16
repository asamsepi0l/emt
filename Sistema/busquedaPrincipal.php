<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>EMDLT</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>

	<body>
		<div id="page-wrapper">

			<!-- Header -->
			<header id="header">
					<h1 id="logo"><a c href="/elmundodelastic.com/acerca.html">El mundo de las TIC</a></h1>
					<logo class="icono-imac">
					<nav id="nav">
						<ul>
							<li><a href="/elmundodelastic.com/index.php">Buscador principal</a></li>


						<li>
								<a class="button special" href="#">Ingresa</a>
								<ul>

									<li><a href="/elmundodelastic.com/registro.php">Inicia sesión</a></li>
									<li><a href="/elmundodelastic.com/registro.php">Registrate</a></li>
									<li><a href="com//index.php">Mi perfil</a></li>


								</ul>

								
							</li>
								</ul>


					</nav>
				</header>

			<!-- Main -->
	<div id="main" class="wrapper style1">
				
					<div class="container">



<?php

include ('conexion.php');
$conexion = new conexion();
$conexion->conecta();

$estadoM = $_POST['idest'];

//se manda llamar a el archivo "conexion.php" en el cual nos conectamos a la Base de datos


$estado = $_POST['idest'];
$categoria = $_POST['idcat'];

echo $estado;
echo $categoria;
/*

$estado = "SELECT estado
FROM  estado WHERE (idest  = $estado) ";
//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta = mysql_query($estado) or die ("<br>Error de consultae");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$y='0';
$estado = mysql_result($consulta,$y,'estado');

$categoria = "SELECT nctat
FROM  categorias WHERE (idcat  = $categoria) ";
//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta1 = mysql_query($categoria) or die ("<br>Error de consultac");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$y='0';
$categoria = mysql_result($consulta1,$y,'nctat');

$provedor = "SELECT idpro
FROM  provedores where idpro=idpro";
//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta2 = mysql_query($provedor) or die ("<br>Error de consultap");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$y='0';
$provedor = mysql_result($consulta2,$y,'idpro');




echo "<br><center><h2>$categoria en: $estado</h2>

<hr>";



//se manda llamar a el archivo "conexion.php" en el cual nos conectamos a la Base de datos




$estado1 = $_POST['idest'];
$categoria1 = $_POST['idcat'];

//se manda llamar a el archivo "conexion.php" en el cual nos conectamos a la Base de datos



$sql = "SELECT p.idpro, p.nombreempresa, p.correo, p.direccion, p.web, e.estado, p.ruta, p.idest, p.giro, cat.nctat


FROM provedores AS p, estado AS e, categorias as cat


WHERE (p.idest  = $estado1 and cat.idcat = $categoria1) AND p.idest=e.idest and p.idpro=cat.idpro";


//Igualamos para que el id del estado ingresado, sea igual que el id del estado que tiene el provedor
//Igualamos que el id de la categoria ingresada, sea igual que el id de la categoria que tiene el provedor
//igualamos el id del estado, con la tabla estado, con el id del estado en la tabla provedor
//Igualamos que el id del provedor de la tabla provedores, sea igual al id de provedor de la tabla categorias

$consulta = mysql_query($sql) or die ("<br>Error de consulta");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$cuantos = mysql_num_rows($consulta);

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

$provedor = "SELECT idpro
FROM  provedores where idpro=idpro";
//Se ejecuta la consulta y el resultado de la consulta se guarda en una variable llamada $consulta
$consulta2 = mysql_query($provedor) or die ("<br>Error de consultaaa");
//quiero que cuentes cuantos registros hay en la variable CONSULTA, y el resultado mandalo a la}
// variable CUANTOS
$y='0';
$provedor = mysql_result($consulta2,$y,'idpro');




echo "<br><center><h2>Lo sentimos, aun no existen provedores con $categoria en: $estado</h2>";
/*///BUTTON PERRON
echo "<input class='button' href='index.php'>Regresar";/*/								
								echo"<a class='button special' href='/elmundodelastic.com/index.php'>Regresar a la búsqueda</a></center>";


								echo "<hr>";
						echo "</div>";
						echo "</div><br><br><br>";

}
//
else
{

//Crea una tabla con borde 1, y crea los encabezados de mi tabla

for($y=0;$y<$cuantos;$y++)
  
  {
$idpro = mysql_result ($consulta,$y,'idpro');
$nombreempresa = mysql_result ($consulta,$y,'nombreempresa');
$giro = mysql_result($consulta,$y,'giro');
$correo = mysql_result($consulta,$y,'correo');
$direccion = mysql_result ($consulta,$y,'direccion');
$web = mysql_result ($consulta,$y,'web');
$estado = mysql_result($consulta,$y,'estado');
$ruta = mysql_result($consulta,$y,'ruta');
$giro = mysql_result($consulta,$y,'giro');
$nctat = mysql_result($consulta,$y,'nctat');







echo "

					<div class='content'>
							

<span class='image left'><img src='$ruta' /></span>







							<h2>$nombreempresa</h2>";
							
								echo "<h4>Nos ubicamos en...</h4>";
								echo "</b>$direccion<br><br>";
								echo "</b>$correo<br><br>";
								echo "<h4>Sitio web</h4>";

								echo "<code> $web</code><br>";



								

								echo"<br> <a href='datos.php?idpro=$idpro'</a>Ver más</a></p></p>
							
											</div>

											<br>
											<br>
				</section>";



							



								echo "<hr>";




			//listo


  }








			}
										echo "</div>";
*/
?>




								</div>
								</div>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
						<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li> Todos los derechos reservados</li><li>Diseñado por: <a href="https://www.facebook.com/Joya816"> Brian Barbosa "La Joya"</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
		<script src="/elmundodelastic.com/Estilos/assets/js/jquery.min.js"></script>
			<script src="/Estilos/assets/js/jquery.scrolly.min.js"></script>
			<script src="/Estilos/assets/js/jquery.dropotron.min.js"></script>
			<script src="/Estilos/assets/js/jquery.scrollex.min.js"></script>
			<script src="/Estilos/assets/js/skel.min.js"></script>
			<script src="/Estilos/assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="/Estilos/assets/js/main.js"></script>

	</body>
</html>
