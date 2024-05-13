<?php
$host = '127.0.0.1';
$bdname = 'bd_escuela';
$usuari = 'root';
$contrasenya = '';
try{
    $conexion = new PDO("mysql:host=$host; dbname=$bdname" , $usuari, $contrasenya);
    echo "Conexión correcta";
}catch(PDOException $e){
    echo "El error es:".$e->getMessage();
}