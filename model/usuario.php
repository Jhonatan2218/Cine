<?php

require_once('../config/database.php');

class Usuario
{
    private $id;
    private $email;
    private $user;
    private $pwd;
    private $rol;

    
    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getCedula()
    {
        return $this->cedula;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getPwd()
    {
        return $this->pwd;
    }

    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    public function loginUsuario(){
        $conn = new Database();
        $sql = "SELECT * FROM usuarios where user = ? and pwd = ?;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("ss", $this->user, $this->pwd);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];

        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return json_encode($data);
    }

    public function registroUsuario(){
        $conn = new Database();
        $sql = "INSERT INTO usuarios(idUsuario, email, user, pwd, rol) VALUES (?, ?, ?, ?, 3)";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("ssss", $this->id, $this->email, $this->user, $this->pwd);
        $stmt->execute();
        return(true);
    }

    public function obtenerIdUsuario(){
        $conn = new Database();
        $sql = "SELECT idUsuario FROM usuarios WHERE user = ?;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("s", $this->user);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc['idUsuario'];
    }

    public function buscarUsuarioPorId(){
        $conn = new Database();
        $sql = "SELECT * FROM usuarios where idUsuario = ?;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("s", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];

        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return json_encode($data);
    }

    public function buscarUsuarios(){
        $conn = new Database();
        $sql = "SELECT * FROM usuarios;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all();
    }

    public function eliminarUsuario(){
        $conn = new Database();
        $sql = "DELETE FROM usuarios where idUsuario = ?";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("s", $this->id);
        $stmt->execute();
    }

    public function actualizarUsuario(){
        $conn = new Database();
        $sql = "UPDATE usuarios set email = ?, user = ?, pwd = ?, rol = ? where idUsuario = ?;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("sssds", $this->email, $this->user, $this->pwd, $this->rol, $this->id);
        $stmt->execute();
    }

}




?>