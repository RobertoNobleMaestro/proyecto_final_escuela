<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../formularios/login.php");
    exit();
}
if (isset($_GET['Alumn'])) {
    header('Location: ../index.php');
    exit();
} else {    
        $ID = $_POST['matricula'];
        $apellido = $_POST['apellidos'];
        $nombre = $_POST['nombre'];
        $sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $curso = $_POST['curso'];
    try {
        require_once '../conexion.php';
        $consulta = "UPDATE tbl_alumnos 
        SET apellido_alumno = :apellidos, 
            nombre_alumno = :nombre, 
            sexo_alumno = :sexo, 
            telefono_alumno = :telefono, 
            DNI_alumno = :dni, 
            direccion_alumno = :direccion, 
            fk_id_curso_alu = :curso 
        WHERE matricula_alumno = :ID";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':apellidos', $apellido);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':curso', $curso);
        $stmt->bindParam(':ID', $ID);
        $stmt->execute();
        header('Location: ./leer.php');
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    }
}
?>
   
    
