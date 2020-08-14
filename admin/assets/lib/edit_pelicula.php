<?php 

	require_once '../../../assets/lib/config.php';

	if (isset($_POST['titulo']) && isset($_POST['fecha_estreno']) && isset($_POST['sinopsis']) && isset($_POST['duracion']) && isset($_POST['actorprincipalid'])) {

		//Recibimos la data de la peliucla
		
			$titulo = $_POST['titulo'];

			$fecha_estreno = $_POST['fecha_estreno'];

			$sinopsis = $_POST['sinopsis'];

			$duracion = $_POST['duracion'];

			$actorprincipalid = $_POST['actorprincipalid'];

			$id_pelicula = $_POST['id_pelicula'];

			$imagen = $_POST['imagen'];

		//Eliminamos la pelicula

			$dlc_pelicula = $mbd->prepare("DELETE FROM peliculas WHERE id = :id_pelicula");

			$dlc_pelicula->bindParam(':id_pelicula', $id_pelicula);
	                            
	        $dlc_pelicula->execute();

	    //Insertamos la pelicula

	        $ins_pelicula = $mbd->prepare("INSERT INTO peliculas (fecha_estreno, titulo, duracion, sinopsis, imagen, actorprincipalid) VALUES (:fecha_estreno, :titulo, :duracion, :sinopsis, :imagen, :actorprincipalid)");

			$ins_pelicula->bindParam(':fecha_estreno', $fecha_estreno);

			$ins_pelicula->bindParam(':titulo', $titulo);

			$ins_pelicula->bindParam(':duracion', $duracion);

			$ins_pelicula->bindParam(':sinopsis', $sinopsis);

			$ins_pelicula->bindParam(':imagen', $imagen);

			$ins_pelicula->bindParam(':actorprincipalid', $actorprincipalid);
	                            
	        $ins_pelicula->execute();

	    //Redireccionamos a la pagina correspondiente

	        header("Location: ../../peliculas");

	        exit();

	}

?>