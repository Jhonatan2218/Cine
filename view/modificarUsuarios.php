<?php
session_start();
if (empty($_SESSION['PERMISO']) and !$_SESSION['PERMISO']) {
    header('Location: ../index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../view/css/peliculas.css">
</head>

<body onload="buscarUsuarios();" class="bg-dark">
    <!-- Navigation-->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="btn btn-outline-success me-2" type="button">Main button</button>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Opciones</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="peliculas.php">Peliculas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="reservas.php">Reservas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="modificarUsuarios.php">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../config/salir.php">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="table-responsive mt-4">
                    <table class="table table-secondary text-center" id="tablaDatos">
                        <thead class="table table-secondary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">USUARIO</th>
                                <th scope="col">ROL</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="datosReservas"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <!-- Modal -->
    <div class="modal fade" id="modalUpdateReservas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-black bg-info">
                    <h5 class="modal-title" id="staticBackdropLabel">Modificar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form onsubmit="return false;" class="row g-3">
                        <input type="hidden" id="id">

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Id</label>
                            <input type="text" class="form-control" id="idUser" disabled>
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailUser">
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="nameUser">
                        </div>

                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="pwdUser" step="any">
                        </div>

                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Rol</label>
                            <input type="text" class="form-control" id="rolUser" step="any">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="actualizarUsuario();">Guardar</button>
                </div>
            </div>
        </div>



        <!-- Footer-->
        <footer class="py-1 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Bryan Pazmiño - Jhonatan Tituaña 2022</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/script.js"></script>

</body>

</html>