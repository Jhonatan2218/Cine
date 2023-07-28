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
    <link rel="stylesheet" href="../view/css/peliculas.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body class="bg-dark">
    <!-- Navigation-->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Offcanvas dark navbar</a>
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
                            <a class="nav-link" href="../config/salir.php">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="py-5 bg-dark">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div id="reader"></div>
                </div>

                <div class="col-6 text-light" style="padding:0px;">
                    <br>
                    <h5 text-success>Codigo Pelicula: </h4><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="result">
                        </div>
                        <form onsubmit="return false;">

                            <input type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalVerificacionQR" onclick="verificarReserva();">
                        </form>
                </div>
            </div>
        </div>
    </section>




    <!-- Modal -->
    <div class="modal fade" id="modalVerificacionQR" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body ">
                    <div class="table-responsive mt-4">
                        <table class="table table-secondary text-center" id="tablaDatos">
                            <thead class="table table-secondary">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Pelicula</th>
                                    <th scope="col">Duracion</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="datosReserva"></tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cerrarModalVerificacion();">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Footer-->
    <footer class="py-1 bg-dark">
        <div class="container">
            <<p class="m-0 text-center text-white">Copyright &copy; Bryan Pazmiño - Jhonatan Tituaña 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/qrcode.min.js"></script>
    <script src="../js/script.js"></script>
    <script type="text/javascript">
        function onScanSuccess(qrCodeMessage) {
            document.getElementById('result').value = qrCodeMessage;

        }

        function onScanError(errorMessage) {
            //handle scan error
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>

</body>

</html>