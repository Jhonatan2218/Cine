<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CINESTATION</title>
    <!-- Favicon-->
    <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="view/css/carrusel.css">
    <link rel="stylesheet" href="view/css/slider.css">
    <link rel="shortcut icon" href="./view/img/logos/logo.png">


</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <img src="view/img/logos/logo.png" alt="" width="10%">
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
                            <a class="nav-link active" href="" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModalLogin">Ingresar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrarse</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-secondary py-2">
        <!-- <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white pt-4">
                <h1 class="display-4 fw-bolder">Shop in style</h1>            
        </div>
        </div> -->
        <br>
        <br>

        <div class="container-fluid">
            <div class="row">
                <div class="col-5 d-flex align-items-center">
                    <div class="row">
                        <h1 class="text-end text-white" style="font-size: 3vw;">Estrenos<br>
                            <h6 class="text-end">Tu cine con las mejores peliculas de estreno</h6><br>

                            <div class="rate bg-dark py-3 text-white mt-2 text-end">
                                <h6 class="mb-0 text-light">Puntuación</h6>

                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="rating">
                                            <input type="radio" name="rating" value="5" id="5">
                                            <label for="5" onclick="rating5();">☆</label>
                                            <input type="radio" name="rating" value="4" id="4">
                                            <label for="4" onclick="rating4();">☆</label>
                                            <input type="radio" name="rating" value="3" id="3">
                                            <label for="3" onclick="rating3();">☆</label>
                                            <input type="radio" name="rating" value="2" id="2">
                                            <label for="2" onclick="rating2();">☆</label>
                                            <input type="radio" name="rating" value="1" id="1">
                                            <label for="1" onclick="rating1();">☆</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </h1>
                    </div>
                </div>

                <div class="col-7">
                    <div class="carousel" data-gap="20">
                        <figure style="width: 40%">
                            <img src="view/img/peliculas/eternals.png" alt="" class="img-fluid" />
                            <img src="view/img/peliculas/morbius.jpg" alt="" class="img-fluid" />
                            <img src="view/img/peliculas/panteraNegra.jpg" alt="" class="img-fluid" />
                            <img src="view/img/peliculas/llorona.png" alt="" class="img-fluid" />
                            <img src="view/img/peliculas/avatar.jpg" alt="" class="img-fluid" />
                            <img src="view/img/peliculas/gatoconbotas.jpg" alt="" class="img-fluid" />
                            <img src="view/img/peliculas/godzilla.jpg" alt="" class="img-fluid" />
                        </figure>
                        <nav>
                            <button class="prev btn btn-dark mx-3" id="btnAnt">Anterior</button>
                            <button class="next btn btn-dark" id="btnSig">Siguiente</button>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <!-- Section-->
    <section class="py-5 bg-dark">
        <div class="container px-4 px-lg-5 mt-5">

            <div class="cont s--inactive">
                <!-- cont inner start -->
                <div class="cont__inner">
                    <!-- el start -->
                    <div class="el">
                        <div class="el__overflow">
                            <div class="el__inner">
                                <div class="el__bg"></div>
                                <div class="el__preview-cont">
                                    <h2 class="el__heading">AVATAR</h2>
                                </div>
                                <div class="el__content">
                                    <div class="el__close-btn"></div>
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalLogin">Reservar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- el end -->
                    <!-- el start -->
                    <div class="el">
                        <div class="el__overflow">
                            <div class="el__inner">
                                <div class="el__bg"></div>
                                <div class="el__preview-cont">
                                    <h2 class="el__heading">LOS SIMPSON</h2>
                                </div>
                                <div class="el__content">
                                    <div class="el__close-btn"></div>
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalLogin">Reservar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- el end -->
                    <!-- el start -->
                    <div class="el">
                        <div class="el__overflow">
                            <div class="el__inner">
                                <div class="el__bg"></div>
                                <div class="el__preview-cont">
                                    <h2 class="el__heading">TRANSFORMERS</h2>
                                </div>
                                <div class="el__content">
                                    <div class="el__close-btn"></div>
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalLogin">Reservar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- el end -->
                    <!-- el start -->
                    <div class="el">
                        <div class="el__overflow">
                            <div class="el__inner">
                                <div class="el__bg"></div>
                                <div class="el__preview-cont">
                                    <h2 class="el__heading">IRON MAN</h2>
                                </div>
                                <div class="el__content">
                                    <div class="el__close-btn"></div>
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalLogin">Reservar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- el end -->
                    <!-- el start -->
                    <div class="el">
                        <div class="el__overflow">
                            <div class="el__inner">
                                <div class="el__bg"></div>
                                <div class="el__preview-cont">
                                    <h2 class="el__heading">LA BELLA Y LA BESTIA</h2>
                                </div>
                                <div class="el__content">
                                    <div class="el__close-btn"></div>
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalLogin">Reservar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- el end -->
                </div>
                <!-- cont inner end -->
            </div>

        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-black bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return false;">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cedula</label>
                            <input type="text" class="form-control" id="idNuevo" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Direccion de correo electronico</label>
                            <input type="email" class="form-control" id="emailRegistro" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="userRegistro" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pwdRegistro" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarReg">Cancelar</button>
                    <button type="submit" class="btn btn-primary" onclick="registro();">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-black bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return false;">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="user" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pwd" required>
                        </div>
                </div>
                <div class="modal-footer ">
                    <div class="row">
                        <div class="col-12 text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarLogin">Cancelar</button>
                            <button type="submit" class="btn btn-primary" onclick="login();">Ingresar</button>
                        </div>
                        <br>
                        <div class="col-12 text-end">
                            <br>
                            <a href="#" class="text-left" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="cerrarModal();">No tengo Cuenta</a>
                        </div>

                    </div>

                </div>
                </form>
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
    <script src="view/js/carrusel.js"></script>
    <script src="view/js/slider3d.js"></script>
    <script src="js/script.js"></script>
</body>

</html>