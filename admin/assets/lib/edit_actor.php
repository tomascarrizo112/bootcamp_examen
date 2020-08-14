<?php 

	require_once '../../../assets/lib/config.php';

	if (isset($_POST['nombre_actor']) && isset($_POST['fecha_nacimiento'])) {

		//Recibimos la data del actor
		
			$nombre_actor = $_POST['nombre_actor'];

			$fecha_nacimiento = $_POST['fecha_nacimiento'];

			$actor_name = $_POST['actor_name'];

			$id_actor = $_POST['id_actor'];

		//Eliminamos al actor

			$dlt_actor = $mbd->prepare("DELETE FROM actores WHERE nombre = :nombre_actor");

			$dlt_actor->bindParam(':nombre_actor', $actor_name);
	                            
	        $dlt_actor->execute();

	    //Insertamos al actor

	        $ins_actor = $mbd->prepare("INSERT INTO actores (nombre, fecha_nacimiento, id_actor) VALUES (:nombre, :fecha_nacimiento, :id_actor)");

			$ins_actor->bindParam(':nombre', $nombre_actor);

			$ins_actor->bindParam(':fecha_nacimiento', $fecha_nacimiento);

			$ins_actor->bindParam(':id_actor', $id_actor);
	                            
	        $ins_actor->execute();

	    //Redireccionamos a la pagina correspondiente

	        header("Location: ../../actores");

	        exit();

	}

?>