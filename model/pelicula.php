<?php

require_once('../config/database.php');

class Pelicula
{
    private $id;
    private $titulo;
    private $portada;
    private $genero;
    private $sinopsis;
    private $duracion;

        
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

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getPortada()
    {
        return $this->portada;
    }

    public function setPortada($portada)
    {
        $this->portada = "img/peliculas/".$portada;

        return $this;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    public function setSinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    public function nuevaPelicula(){
        $conn = new Database();
        $sql = "INSERT INTO pelicula(idPelicula, titulo, portada, genero, sinopsis, duracion) VALUES (null, ?, ?, ?, ?, ?)";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("sssss", $this->titulo, $this->portada, $this->genero, $this->sinopsis, $this->duracion);
        $stmt->execute();
        return(true);
    }

    public function buscarTodos(){
        $conn = new Database();
        $sql = "SELECT * FROM pelicula;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all();

        // $data = [];
        // while($row = $result->fetch_assoc()){
        //     $data[] = $row;
        // }
        // return json_encode($data);
    }

    public function buscarPelicula(){
        $conn = new Database();
        $sql = "SELECT * FROM pelicula where idPelicula = ?;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];

        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return json_encode($data);
    }

    public function actualizarPelicula(){
        $conn = new Database();
        $sql = "UPDATE pelicula set titulo = ?, portada = ?, genero = ?, sinopsis = ?, duracion = ? where idPelicula = ?;";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("ssssss", $this->titulo, $this->portada, $this->genero, $this->sinopsis, $this->duracion, $this->id);
        $stmt->execute();
    }

    public function eliminarPelicula(){
        $conn = new Database();
        $sql = "DELETE FROM pelicula where idPelicula = ?";
        $stmt = $conn->ms->prepare($sql);
        $stmt->bind_param("s", $this->id);
        $stmt->execute();
    }










}




?>