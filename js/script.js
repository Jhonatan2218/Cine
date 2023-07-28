// --------------------------------------------------------------------------------------- PELICULAS USUARIO  ADMINISTRADOR
function guardar() {
    let id = document.querySelector("#id").value;
    let titulo = document.querySelector("#titulo").value;
    let portada = document.querySelector("#portada").files[0].name;
    let genero = document.querySelector("#genero").value;
    let sinopsis = document.querySelector("#sinopsis").value;
    let duracion = document.querySelector("#duracion").value;
    let modal = document.querySelector("#exampleModal");

    console.log(titulo, portada, genero, sinopsis, duracion, modal);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            buscarTodos();
            console.log(this.responseText);
            $("#cerrar").click();
        }
    }
    let data = JSON.stringify({ "id": id, "titulo": titulo, "portada": portada, "genero": genero, "sinopsis": sinopsis, "duracion": duracion, "operacion": "guardar" });
    xhr.send(data);
}

function editarPelicula(id) {
    let titulo = document.querySelector("#titulo");
    let portada = document.querySelector("#portada");
    let genero = document.querySelector("#genero");
    let duracion = document.querySelector("#duracion");
    let sinopsis = document.querySelector("#sinopsis");
    let inputId = document.querySelector("#id");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(this.responseText);
            inputId.value = data[0].idPelicula;
            titulo.value = data[0].titulo;
            genero.value = data[0].genero;
            duracion.value = data[0].duracion;
            sinopsis.value = data[0].sinopsis;
        }
    }
    let data = JSON.stringify({ "id": id, "operacion": "reservar" });
    xhr.send(data);
}

function eliminarPelicula(id) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (this.responseText) {
                alert('No se puede eliminar, pelicula con reservas activas.');
                console.log('con problemas');
            } else {
                console.log('sin problemas');
                buscarTodos();

            }
        }
    }
    let data = JSON.stringify({ "id": id, "operacion": "eliminarPelicula" });
    xhr.send(data);
}

function buscarTodos() {
    let res = document.querySelector("#datos");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({ "operacion": "buscarTodos" });
    xhr.send(data);
}

// --------------------------------------------------------------------------------------- RESERVAS VENTANA ADMINISTRADOR
function buscarReservas() {
    let res = document.querySelector("#datosReservas");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({ "operacion": "buscarReservas" });
    xhr.send(data);
}

function eliminarReserva(dato) {
    var id = $(dato).closest("tr").find("td:eq(0)").text();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            buscarReservas();
        }
    }
    let data = JSON.stringify({ "id": id, "operacion": "eliminarReserva" });
    xhr.send(data);
}

function comprar() {
    let peliculaId = document.querySelector("#peliculaId").value;
    let date = document.querySelector("#date").value;
    let user = document.querySelector("#user").value;
    let boleto = document.querySelector("#boleto").value;
    let id = null;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(this.responseText);
            $("#cerrarMod").click();
            reservasClientes();
        }
    }
    let data = JSON.stringify({ "id": id, "peliculaId": peliculaId, "user": user, "boleto": boleto, "date": date, "operacion": "comprar" });
    xhr.send(data);
}

function editarReserva(dato) {
    var idUsuario = $(dato).closest("tr").find("td:eq(0)").text();

    let idReserva = document.querySelector("#idReserva");
    let idPelicula = document.querySelector("#idPelicula");
    let boletos = document.querySelector("#boletos");
    let user = document.querySelector("#idUsuario");
    let date = document.querySelector("#date");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(this.responseText);
            idReserva.value = data[0].idReserva;
            idPelicula.value = data[0].pelicula;
            boletos.value = data[0].cantidadBoletos;
            user.value = data[0].persona;
            date.value = data[0].fecha;
        }
    }
    let data = JSON.stringify({ "idUsuario": idUsuario, "operacion": "buscarReservaEditar" });
    xhr.send(data);
}

function editarReservaId() {
    let id = document.querySelector("#idReserva").value;
    let idPelicula = document.querySelector("#idPelicula").value;
    let boletos = document.querySelector("#boletos").value;
    let user = document.querySelector("#idUsuario").value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(this.responseText);
            buscarReservas();
        }
    }
    let data = JSON.stringify({ "id": id, "idPelicula": idPelicula, "boletos": boletos, "user": user, "operacion": "comprar" });
    xhr.send(data);
}

function verificarReserva() {
    let qr = document.querySelector("#result").value;
    let res = document.querySelector("#datosReserva");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({ "id": qr, "operacion": "comprobarReserva" });
    xhr.send(data);
}
// --------------------------------------------------------------------------------------- MODIFICAR USUARIOS ADMINISTRADOR
function buscarUsuarios() {
    let res = document.querySelector("#datosReservas");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({ "operacion": "buscarUsuarios" });
    xhr.send(data);
}

function eliminarUsuario(dato) {
    var id = $(dato).closest("tr").find("td:eq(0)").text();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            buscarUsuarios();
        }
    }
    let data = JSON.stringify({ "id": id, "operacion": "eliminarUsuario" });
    xhr.send(data);
}

function editarUsuario(dato) {
    var id = $(dato).closest("tr").find("td:eq(0)").text();
    let idUser = document.querySelector("#idUser");
    let emailUser = document.querySelector("#emailUser");
    let nameUser = document.querySelector("#nameUser");
    let pwdUser = document.querySelector("#pwdUser");
    let rolUser = document.querySelector("#rolUser");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(this.responseText);

            idUser.value = data[0].idUsuario;
            emailUser.value = data[0].email;
            nameUser.value = data[0].user;
            //pwdUser.value = data[0].pwd;
            rolUser.value = data[0].rol;
        }
    }
    let data = JSON.stringify({ "id": id, "operacion": "editarUsuario" });
    xhr.send(data);
}

function actualizarUsuario() {
    let idUser = document.querySelector("#idUser").value;
    let emailUser = document.querySelector("#emailUser").value;
    let nameUser = document.querySelector("#nameUser").value;
    let pwdUser = document.querySelector("#pwdUser").value;
    let rolUser = document.querySelector("#rolUser").value;


    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 || this.status === 200) {
            var response = this.responseText;
            console.log(response);

            window.location.href = 'modificarUsuarios.php';
        }
    };
    let data = JSON.stringify({ "idUser": idUser, "emailUser": emailUser, "nameUser": nameUser, "pwdUser": pwdUser, "rolUser": rolUser, "operacion": "actualizarUsuario" });
    xhr.send(data);
}

// --------------------------------------------------------------------------------------- FUNCIONES USUARIOS
function registro() {
    let idNuevo = document.querySelector("#idNuevo").value;
    let emailNuevo = document.querySelector("#emailRegistro").value;
    let userNuevo = document.querySelector("#userRegistro").value;
    let pwdNueva = document.querySelector("#pwdRegistro").value;

    console.log(emailNuevo, userNuevo, pwdNueva);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "logica/logica.php", true);
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 || this.status === 200) {
            var response = this.responseText;
            console.log(response);
            $("#cerrarReg").click();
            //window.location.href='index.php';
        }
    };
    let data = JSON.stringify({ "idNuevo": idNuevo, "emailNuevo": emailNuevo, "userNuevo": userNuevo, "pwdNueva": pwdNueva, "operacion": "registro" });
    xmlhttp.send(data);
}

function login() {
    let user = document.querySelector("#user").value;
    let pwd = document.querySelector("#pwd").value;
    //let res = document.querySelector("#res");

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "logica/logica.php", true);
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 || this.status === 200) {

            let data = JSON.parse(this.responseText);

            let rol = data[0].rol;
            if (rol == 1) {
                //res.style.display = 'none';
                window.location.href = 'view/peliculas.php';
            } else if (rol == 2) {
                //res.style.display = 'block';
                //res.innerHTML = "Usuario o Password incorrecto";
                window.location.href = 'view/trabajador.php';
            } else if (rol == 3) {
                //res.style.display = 'block';
                //res.innerHTML = "Usuario o Password incorrecto";
                window.location.href = 'view/cliente.php';
            }
        }

    };
    let data = JSON.stringify({ "user": user, "pwd": pwd, "operacion": "login" });
    xmlhttp.send(data);
}

// --------------------------------------------------------------------------------------- FUNCIONES CLIENTES
function clientesPeliculas() {
    let res = document.querySelector("#cartas");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({ "operacion": "peliculasClientes" });
    xhr.send(data);
}

function reservasClientes() {
    let res = document.querySelector("#reservasCliente");
    let user = document.querySelector("#userId").value;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({ "user": user, "operacion": "reservasClientes" });
    xhr.send(data);
}

function reservar(id) {
    let userId = document.querySelector("#userId").value;
    let inputPeliculaId = document.querySelector("#peliculaId");
    let inputUser = document.querySelector("#user");
    let inputNombrePelicula = document.querySelector("#nombrePelicula");
    let imagen = document.querySelector("#imgCompra");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../logica/logica.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(this.responseText);
            inputPeliculaId.value = data[0].idPelicula;
            inputUser.value = userId;
            inputNombrePelicula.value = data[0].titulo;
            imagen.src = data[0].portada;
        }
    }
    let data = JSON.stringify({ "id": id, "operacion": "reservar" });
    xhr.send(data);

}


// --------------------------------------------------------------------------------------- UTILIDADES
function limpiarCampos() {
    document.querySelector("#titulo").value = "";
    document.querySelector("#genero").value = "";
    document.querySelector("#duracion").value = "";
    document.querySelector("#sinopsis").value = "";
    document.querySelector("#id").value = "";

}

function rating5() {
    $("#btnSig").click();
    $("#btnSig").click();
    $("#btnSig").click();
    $("#btnSig").click();
    $("#btnSig").click();
}

function rating4() {
    $("#btnSig").click();
    $("#btnSig").click();
    $("#btnSig").click();
    $("#btnSig").click();
}

function rating3() {
    $("#btnSig").click();
    $("#btnSig").click();
    $("#btnSig").click();
}

function rating2() {
    $("#btnSig").click();
    $("#btnSig").click();
}

function rating1() {
    $("#btnSig").click();
}

function cerrarModal() {
    $("#cerrarLogin").click();
    $("#exampleModalLogin").modal('hide');
}

function generarCodigo(e) {
    var id = $(e).closest("tr").find("td:eq(0)").text();
    new QRCode(document.getElementById("qrcode"), id);
    $("#modalQR").modal('show');
}

function cerrarModalQR() {
    var div = document.getElementById('qrcode');
    while (div.firstChild) {
        div.removeChild(div.firstChild);
    }
}

function cerrarModalVerificacion() {
    var div = document.getElementById('datosReserva');
    while (div.firstChild) {
        div.removeChild(div.firstChild);
    }
}

$(window).on('load', function () {

    $('#modalQR').modal(
        {
            keyboard: false,
            backdrop: 'static'
        });
});




