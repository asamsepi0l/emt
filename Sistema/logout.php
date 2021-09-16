
<?php
session_start();
session_unset();
session_destroy();
$mensaje = "Tu sesion ha terminado";
print "<meta http-equiv='refresh' content='0;url=/Claptone Projects/elmundodelastic.com/registro.php?mensaje=$mensaje'>";

?>