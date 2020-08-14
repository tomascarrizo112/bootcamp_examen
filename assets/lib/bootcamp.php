<?php 

	require 'assets/lib/config.php';

	//--------------------------------------------------------//

	//Seleccionamos toda la data de las peliculas agregadas HOME

    	$slc_dt_peliculas_limit = $mbd->prepare("SELECT * FROM peliculas LIMIT 3");
                                
        $slc_dt_peliculas_limit->execute();

    //Seleccionamos toda la data de los actores agregados HOME

        $slc_dt_actores_limit = $mbd->prepare("SELECT * FROM actores LIMIT 4");
                                
        $slc_dt_actores_limit->execute();

    //--------------------------------------------------------//

    //Seleccionamos toda la data de las peliculas agregadas

    	$slc_dt_peliculas = $mbd->prepare("SELECT * FROM peliculas");
                                
        $slc_dt_peliculas->execute();

    //Seleccionamos toda la data de los actores agregados

        $slc_dt_actores = $mbd->prepare("SELECT * FROM actores");
                                
        $slc_dt_actores->execute();

    
?>