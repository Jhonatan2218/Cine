<?php

    class Database{
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbPWD = "";
        private $dbName = "cine1";
    

    public function __construct()
    {
        $this->ms = new mysqli($this->dbhost, $this->dbuser, $this->dbPWD, $this->dbName);
        return $this->ms;
    }

    public function __destruct()
    {
        $this->ms->close();
    }

}

?>