<?php
$host = '127.0.0.1';
$bdname = 'bd_escuela';
$usuari = 'root';
$contrasenya = 'Beto.nm2005.';
try{
    $conexion = new PDO("mysql:host=$host; dbname=$bdname" , $usuari, $contrasenya);
}catch(PDOException $e){
    echo "El error es:".$e->getMessage();
}