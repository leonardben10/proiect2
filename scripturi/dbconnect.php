<?php

$sname = "localhost";
$uname = "root";
$password = "";

$dbname = "varu";
$connection = mysqli_connect($sname,$uname,$password,$dbname);

if(!$connection){
    echo "Conexiunea a esuat!";
    $db = new CreareDb("varu","utilizatori");

}

class CreareDb
    {
        public $connection;
        public $dbname;
        public $tablename;

        public function __construct(
            $dbname="nouabazadedate",
            $tablename="noultabel",

            $sname="localhost",
            $uname="root",
            $password = ""
        )
        {
            
            $this->connection = mysqli_connect($sname,$uname,$password,$dbname);
            $sql="CREATE DATABASE IF NOT EXISTS $dbname";
            if(mysqli_query($this->connection,$sql)){
                echo "Nu s-a putut crea baza de date!";
                exit();
            }

            $sql2="CREATE TABLE IF NOT EXISTS $tablename
            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255),
            parola VARCHAR(255),
            nume VARCHAR (255),
            prenume VARCHAR(255));";
            if(!mysqli_query($this->connection,$sql)){
                echo "Nu se poate crea tabelul pentru produse!";
                exit();
            }
        }
    }
?>