<?php 

	//Incluimos el config

		require_once 'assets/lib/config.php';

	//Recibimos el id de la pelila

		$id_pelicula = $_POST['id_peli'];

	//Realizamos la insercion del id

		$ins_id_pelicula = $mbd->prepare("INSERT INTO favoritas (id_pelicula) VALUES (:id_pelicula)");

		$ins_id_pelicula->bindParam(':id_pelicula', $id_pelicula);
	                            
	    $ins_id_pelicula->execute();

?>