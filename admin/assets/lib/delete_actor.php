<?php 

	require_once '../../../assets/lib/config.php';

	if (isset($_GET['id_actor'])) {

		//Recibimos la data del actor
		
			$id_actor = $_GET['id_actor'];

		//Eliminamos al actor

			$dlt_actor = $mbd->prepare("DELETE FROM actores WHERE id_actor = :id_actor");

			$dlt_actor->bindParam(':id_actor', $id_actor);
	                            
	        $dlt_actor->execute();

	    //Redireccionamos a la pagina correspondiente

	        header("Location: ../../actores");

	        exit();

	}

?>