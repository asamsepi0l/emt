<?php

////Normales
$semana = array("Lun","Mar","Mier","Juev","Vier");
$fsemana = array("Sáb","Dom");
$fsemana[19] = ("COVID-19");
echo "Se trabajará los días $semana[0] y $semana[4], por causa de $fsemana[19] <br/>
y se descansará $fsemana[0].";
echo "<br><br>";    

////Asociativos
$cerebro = array('Tel' => '729-138-9930','AP' => 'Bonifasio');
echo 'Telefono  : ' . $cerebro['Tel'] .' <br>
Apellido: '. $cerebro['AP'];
echo "<br><br>";

////Multidimensionales
$cerebro = array(array('Brian',26),
            array('Alan',18),
            array('Karol',15)
                );
echo $cerebro[0][0], ' ' ,$cerebro[0][1],'<br>';
echo $cerebro[1][0], ' ' ,$cerebro[1][1],'<br>';
echo $cerebro[2][0], ' ' ,$cerebro[2][1],'<br>';
echo "<br><br>";

//Conociendo el numero de elementos de un Arreglo
$semana = array("Lun","Mar","Mier","Juev","Vier");
echo $firstDay = count($semana)-1, '<br />';
//echo $lastDay = '$semana[0]' '<br />';

?>
