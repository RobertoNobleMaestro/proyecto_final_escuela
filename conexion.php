<?php
$host = 'localhost';

$bdname = 'Escuelas';
$usuari = 'root';
$contrasenya = '';
try{
    $conexion = new PDO("mysql:host=$host; dbname=$bdname" , $usuari, $contrasenya);
    echo "Conexión correcta";
} catch(PDOException $e){
    echo "El error es:".$e->getMessage();
}
?>