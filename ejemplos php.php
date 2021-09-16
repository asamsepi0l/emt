<?php
<link rel="shortcut icon" href="img\icons\icoUAMEX.ico" />
$query_ = "SELECT m.nmarcas, m.ruta
FROM marcas AS m, provedores AS p 
WHERE (m.idpro=p.idpro) and p.idpro = $idpro ORDER BY m.idmar";
$res_ = $mysqli->query($query_);
$cuantos = mysqli_num_rows($res_);

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
