<?php
$host ="localhost";
$user ="root";
$pass ="";
$dbname = "topersdesign";
$port =3306;

try {
    $conn = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);
    //echo"Conexão Realizada com sucesso";
}catch (PDOException $err){
    echo "Erro: Conexão não realizada" .$err->getMessage();

}