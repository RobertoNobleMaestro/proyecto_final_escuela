<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
     
    header("Location: ../formularios/login.php");
    exit();
}

    require_once '../conexion.php';

    if(isset($_GET['Alumn'])){
        header('Location: ../index.php');
        exit();
    } else {
    try {
        $ID = $_GET['Alumn'];
        $apellido = $_POST['apellidos'];
        $nombre = $_POST['nombre'];
        $sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $curso = $_POST['curso'];
        $consulta = "UPDATE tbl_alumnos SET sexo_alumno = :sexo, nombre_alumno = :nombre, telefono_alumno = :telefono, DNI_alumno = :dni, direccion_alumno = :direccion, 
        curso_alumno = :nombre, 
        telefono_alumno = :telefono,
        DNI_alumno = :dni,
        direccion_alumno = :direccion 
        WHERE matricula_alumno = :ID";
    } catch (PDOException $e) {
        echo $e;
    } else {
        header('location: ./leer.php');
    }

    }