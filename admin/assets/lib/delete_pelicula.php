<?php 

	require_once '../../../assets/lib/config.php';

	if (isset($_GET['id_pelicula'])) {

		//Recibimos la data de la pelicila
		
			$id_pelicula = $_GET['id_pelicula'];

		//Eliminamos la pelicula

			$dlt_pelicula = $mbd->prepare("DELETE FROM peliculas WHERE id = :id_pelicula");

			$dlt_pelicula->bindParam(':id_pelicula', $id_pelicula);
	                            
	        $dlt_pelicula->execute();

	    //Redireccionamos a la pagina correspondiente

	        header("Location: ../../peliculas");

	        exit();

	}

?>