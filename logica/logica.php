<?php
require_once("../model/usuario.php");
require_once("../model/pelicula.php");
require_once("../model/reserva.php");

$data = json_decode(file_get_contents("php://input"));

switch ($data->operacion) {
    case "guardar":
        if (empty($data->id)) {
            $pelicula = new Pelicula();
            $pelicula->setId($data->id);
            $pelicula->setTitulo($data->titulo);
            $pelicula->setPortada($data->portada);
            $pelicula->setGenero($data->genero);
            $pelicula->setSinopsis($data->sinopsis);
            $pelicula->setDuracion($data->duracion);
            echo $pelicula->nuevaPelicula();
            break;
        } elseif ($data->id != null) {
            $pelicula = new Pelicula();
            $pelicula->setTitulo($data->titulo);
            $pelicula->setPortada($data->portada);
            $pelicula->setGenero($data->genero);
            $pelicula->setSinopsis($data->sinopsis);
            $pelicula->setDuracion($data->duracion);
            $pelicula->setId($data->id);
            echo $pelicula->actualizarPelicula();
            break;
        }

    case "buscarTodos":
        $pelicula = new Pelicula();
        $resultado = $pelicula->buscarTodos();
        foreach ($resultado as $fila) {
            echo "
                <tr id='nombre'>
                    <td>$fila[0]</td>
                    <td>$fila[1]</td>
                    <td><img src='$fila[2]' width='150px' height='200px'></td>
                    <td>$fila[3]</td>
                    <td>$fila[4]</td>
                    <td>$fila[5]</td>
                    <td class='text-center'> 
                        <button class='btn btn-danger mt-5' onclick='eliminarPelicula($fila[0]);'>Eliminar</button>
                        <button class='btn btn-primary mt-2' onclick='editarPelicula($fila[0]);' data-bs-toggle='modal' data-bs-target='#exampleModal'>Editar</button> 
                    </td>
                </tr>";
        }
        break;

    case "buscarReservas":
        $reserva = new Reserva();
        $resultado = $reserva->buscarReservas();
        foreach ($resultado as $fila) {
            echo "
                <tr id='nombre'>
                    <td>$fila[0]</td>
                    <td>$fila[1]</td>
                    <td>$fila[2]</td>
                    <td>$fila[3]</td>
                    <td>$fila[4]</td>
                    <td class='text-center'> 
                        <button class='btn btn-danger' onclick='eliminarReserva(this);'>Eliminar</button>
                        <button class='btn btn-primary' onclick='editarReserva(this);' data-bs-toggle='modal' data-bs-target='#modalUpdateReservas'>Editar</button> 
                    </td>
                </tr>";
        }
        break;

    case "clientesReservas":
        $reserva = new Reserva();
        $resultado = $reserva->buscarReservas();
        foreach ($resultado as $fila) {
            echo "
                    <tr id='nombre'>
                        <td>$fila[0]</td>
                        <td>$fila[1]</td>
                        <td>$fila[2]</td>
                        <td>$fila[3]</td>
                        <td class='text-center'> 
                        </td>
                    </tr>";
        }
        break;

    case "comprobarReserva":
        $reserva = new Reserva();
        $pelicula = new Pelicula();
        $usuario = new Usuario();
        $reserva->setIdReserva($data->id);
        $datos = json_decode($reserva->buscarReservaId());
        $reserva->eliminarReserva();

        foreach ($datos as $fila) {
            $usuario->setId($fila->persona);
            $datosUser = json_decode($usuario->buscarUsuarioPorId());
            $pelicula->setId($fila->pelicula);
            $datosPelicula = json_decode($pelicula->buscarPelicula());

            foreach ($datosUser as $filasUser) {
                foreach ($datosPelicula as $filasPelicula) {
                    echo "
                        <tr id='nombre'>
                            <td>$filasUser->user</td>
                            <td>$fila->persona</td>
                            <td>$filasPelicula->titulo</td>
                            <td>$filasPelicula->duracion</td>
                            <td class='text-center'> 
                            </td>
                        </tr>";
                }
            }
        }

        break;

    case "buscarReservaEditar":
        $reserva = new Reserva();
        $reserva->setIdReserva($data->idUsuario);
        echo $resultado = $reserva->buscarReservaId();
        break;

    case "peliculasClientes":
        $pelicula = new Pelicula();
        $resultado = $pelicula->buscarTodos();
        foreach ($resultado as $fila) {

            echo "
                <div class='flip-card'>
                    <div class='flip-card-inner' >
                        <div class='flip-card-front'>
                            <img src='$fila[2]' alt='portada' style='width: 300px; height: 400px'/>
                        </div>
                        <div class='flip-card-back'>
                            <br>
                            <h4 class='text-success'>$fila[1]</h4>
                            <h6 class='text-start text-dark'><strong class='text-dark'>&nbsp;&nbsp;Genero: </strong> $fila[3]</h6>
                            <h6 class='text-start text-dark'><strong>&nbsp;&nbsp;Duracion: </strong> $fila[5]</h6>
                            <br>
                            <p class='text-xl'>Descripcion: $fila[4]</p>
                            <form onsubmit='return false;' class='text-end'>
                                <button type='submit' class='btn btn-warning button-add me-2' onclick='reservar($fila[0]);' data-bs-toggle='modal' data-bs-target='#exampleModal'>Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>
                ";
        }
        break;

    case "eliminarPelicula":
        $pelicula = new Pelicula();
        $pelicula->setId($data->id);
        echo $resultado = $pelicula->eliminarPelicula();
        break;

    case "reservar":
        $pelicula = new Pelicula();
        $pelicula->setId($data->id);
        echo $resultado = $pelicula->buscarPelicula();
        break;

    case "eliminarReserva":
        $reserva = new Reserva();
        $reserva->setIdReserva($data->id);
        echo $reserva->eliminarReserva();
        break;

    case "comprar":
        if ($data->id == null) {
            $reserva = new Reserva();
            $d = mt_rand(1, 10000);
            $reserva->setIdReserva("CIN" . $d);
            $reserva->setPelicula($data->peliculaId);
            $reserva->setCantidadBoletos($data->boleto);
            $reserva->setPersona($data->user);
            $reserva->setDate($data->date);
            echo $resultado = $reserva->reservaPelicula();
            break;
        } elseif ($data->id != null) {
            $reserva = new Reserva();
            $reserva->setIdReserva($data->id);
            $reserva->setPelicula($data->idPelicula);
            $reserva->setCantidadBoletos($data->boletos);
            $reserva->setPersona($data->user);
            echo $reserva->editarReserva();
            break;
        }

    case "reservasClientes":
        $reserva = new Reserva();
        $pelicula = new Pelicula();
        $reserva->setPersona($data->user);
        $resultado = $reserva->clientesReservas();
        foreach ($resultado as $fila) {

            $pelicula->setId($fila[1]);
            $result = json_decode($pelicula->buscarPelicula());

            foreach ($result as $dato) {
                echo "   <tr id='nombre' class='text-center'>
                                <td>$fila[0]</td>
                                <td>$dato->titulo</td>
                                <td><img src='$dato->portada' width='30%'></td>
                                <td>$fila[1]</td>

                                <td><button type='submit' class='btn btn-primary' onclick='generarCodigo(this);'>QR</button></td>
                            </tr>";
            }
        }
        break;

    case "buscarUsuarios":
        $usuario = new Usuario();
        $resultado = $usuario->buscarUsuarios();
        foreach ($resultado as $fila) {
            echo "
                    <tr id='nombre'>
                        <td>$fila[0]</td>
                        <td>$fila[1]</td>
                        <td>$fila[2]</td>
                        <td>$fila[4]</td>
                        <td class='text-center'> 
                            <button class='btn btn-danger' onclick='eliminarUsuario(this);'>Eliminar</button>
                            <button class='btn btn-primary' onclick='editarUsuario(this);' data-bs-toggle='modal' data-bs-target='#modalUpdateReservas'>Editar</button> 
                        </td>
                    </tr>";
        }
        break;

    case "eliminarUsuario":
        $usuario = new Usuario();
        $usuario->setId($data->id);
        echo $usuario->eliminarUsuario();
        break;

    case "editarUsuario":
        $usuario = new Usuario();
        $usuario->setId($data->id);
        echo $usuario->buscarUsuarioPorId();
        break;

    case "login":
        session_start();
        $usuario = new Usuario();
        $usuario->setUser($data->user);
        $usuario->setPwd(hash('sha256', md5($data->pwd)));
        $_SESSION["USUARIO"] = $data->user;
        $_SESSION["ID"] = $usuario->obtenerIdUsuario();
        $_SESSION['PERMISO'] = true;
        echo $usuario->loginUsuario();
        break;

    case "registro":
        $usuario = new Usuario();
        $usuario->setId($data->idNuevo);
        $usuario->setEmail($data->emailNuevo);
        $usuario->setUser($data->userNuevo);
        $usuario->setPwd(hash('sha256', md5($data->pwdNueva)));
        echo $usuario->registroUsuario();
        break;
    case "actualizarUsuario":
        $usuario = new Usuario();
        $usuario->setId($data->idUser);
        $usuario->setEmail($data->emailUser);
        $usuario->setUser($data->nameUser);
        $usuario->setPwd(hash('sha256', md5($data->pwdUser)));
        $usuario->setRol($data->rolUser);
        echo $usuario->actualizarUsuario();
        break;
}
