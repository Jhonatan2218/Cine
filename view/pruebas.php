<?php

    include("../model/usuario.php");
    include("../model/reserva.php");
    include("../model/pelicula.php");

    $reserva = new Reserva();
    $pelicula = new Pelicula();
    $usuario = new Usuario();

    
    // // $objProducto->setNombre("Pruebas 111");
    // // $objProducto->setPrecio(123.45);
    // // $objProducto->setMarca("Marca 1");
    // // $objProducto->setFoto("Foto 1");
    // $usuario->setUser("bryan");
    // $usuario->setPwd("bryan");    

    // //$objProducto->insertarProducto();
    // //$objProducto->actualizarProducto();
    // $usuario->loginUsuario();

    // $reserva->setPersona(1725698752);
    // $resultado = $reserva->clientesReservas();


    // foreach($resultado as $fila){

    //     $pelicula->setId($fila[1]);
    //     $result = json_decode($pelicula->buscarPelicula());

    //     foreach($result as $dato)
    //     {
    //         echo $dato->titulo;
            

    //     }

        
    // }
    $reserva->setIdReserva('CIN2744');
    $datos = json_decode($reserva->buscarReservaId());
    
    foreach ($datos as $fila){
        $usuario->setId($fila->persona);
        $datosUser = json_decode($usuario->buscarUsuarioPorId());
        $pelicula->setId($fila->pelicula);
        $datosPelicula = json_decode($pelicula->buscarPelicula());

        foreach($datosUser as $filasUser){
            foreach($datosPelicula as $filasPelicula){
                echo $filasUser->user;
                echo $filasPelicula->titulo;
                echo $filasPelicula->duracion;
            }
        }

    }




    
    




?>