$queryEst = "SELECT estado FROM  estado WHERE (idest  = $idEst) ";
	$resEst = $mysqli->query($queryEst);

	while($row = $resEst->fetch_assoc()) {
		$estado = $row['estado'];
	}