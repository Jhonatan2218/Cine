<?php

require_once('../config/database.php');

class Reserva
{
    private $idReserva;
    private $pelicula;
    private $cantidadBoletos;
    private $persona;
    private $date;

    public function __construct()
    {
    }

    public function getIdReserva()
    {
        return $this->idReserva;
    }

    public function setIdReserva($idReserva)
    {
        $this->idReserva = $idReserva;

        return $this;
    }

    public function getPelicula()
    {
        return $this->pelicula;
    }

    public function setPelicula($pelicula)
    {
        $this->pelicula = $pelicula;

        return $this;
    }

    public function getCantidadBoletos()
    {
        return $this->cantidadBoletos;
    }

    public function setCantidadBoletos($cantidadBoletos)
    {
        $this->cantidadBoletos = $cantidadBoletos;

        return $this;
    }

    public function getPersona()
    {
        return $this->persona;
    }

    public function setPersona($persona)
    {
        $this->persona = $persona;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function reservaPelicula(){
        $conn = new Database();
        $sql = "INSERT INTO reservas(idReserva, pelicula, cantidadBoletos, persona, fecha) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("sddds",$this->idReserva, $this->pelicula, $this->cantidadBoletos, $this->persona, $this->date);
        $stmt->execute();
        return(true);
    }

    public function buscarReservas(){
        $conn = new Database();
        $sql = "SELECT * FROM reservas;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all();
    }

    public function buscarReservaId(){
        $conn = new Database();
        $sql = "SELECT * FROM reservas where idReserva = ?;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("s", $this->idReserva);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];

        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return json_encode($data);
    }

    
    public function clientesReservas(){
        $conn = new Database();
        $sql = "SELECT * FROM reservas WHERE persona = ?;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("s",$this->persona);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all();
    }

    public function eliminarReserva(){
        $conn = new Database();
        $sql = "DELETE FROM reservas where idReserva = ?";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("s", $this->idReserva);
        $stmt->execute();
    }

    public function editarReserva(){
        $conn = new Database();
        $sql = "UPDATE reservas set pelicula = ?, cantidadBoletos = ?, persona = ? where idReserva = ?;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("sdss", $this->pelicula, $this->cantidadBoletos, $this->persona, $this->idReserva);
        $stmt->execute();
    }














}




?>