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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <link rel="stylesheet" href="../view/css/peliculas.css">
</head>

<body onload="clientesPeliculas(); reservasClientes();" class="bg-dark">
    <!-- Navigation-->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#"><?php echo "Bienvenido: " . $_SESSION['USUARIO']  ?></a> -->

            <a class="nav-link dropdown-toggle me-3" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                <input type="hidden" id="userId" value="<?php echo $_SESSION['ID'];  ?>">

            </a>
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
                            <a class="nav-link active" aria-current="page" href="cliente.php">Comprar Boleto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="reservasCliente.php">Verificar Reservas</a>
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
            <br>
            <div class="row">
                <div class="col">
                    <table class="table table-light" id="tablaDatos">
                        <thead class="table table-light text-center">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre Pelicula</th>
                                <th scope="col">Portada</th>
                                <th scope="col">Cantidad Boletos</th>
                                <th scope="col">Generar Codigo QR</th>
                            </tr>
                        </thead>
                        <tbody id="reservasCliente"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <!-- Modal -->
    <div class="modal fade" id="modalQR" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body ">
                    <div id="qrcode" class="d-flex justify-content-center"></div>
                    <div class="row">
                        <div class="col text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cerrarModalQR();">Close</button>
                        </div>
                    </div>
                </div>
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
    <!-- Core theme JS-->

    <script src="../js/script.js"></script>


</body>

</html>