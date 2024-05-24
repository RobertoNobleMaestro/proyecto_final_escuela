<?php
session_start();
if (isset($_SESSION['role']) || $_SESSION['role'] == 'admin') {
    if (isset($_GET['Profes'])) {
        require_once '../conexion.php';
        try {
            $ID = $_GET['Profes'];
            $conexion->beginTransaction();
            $consultaFK = "DELETE FROM tbl_asignaturas_profesores WHERE fk_id_profe = :ID";
            $stmt = $conexion->prepare($consultaFK);
            $stmt->bindParam(':ID', $ID);
            $stmt->execute();
            $consultaID = "DELETE FROM tbl_profesores WHERE id_profe = :ID";
            $stmt = $conexion->prepare($consultaID);
            $stmt->bindParam(':ID', $ID);
            $stmt->execute();
            $conexion->commit();
            header('location:./leerprofes.php');
            exit();
        } catch (PDOException $e) {
            $conexion->rollBack();
            echo $e->getMessage();
            header('location:./leerprofes.php');
        }
    } else if (isset($_GET['Alumn'])) {
        require_once '../conexion.php';
        try {
            $ID = $_GET['Alumn'];
            $conexion->beginTransaction();
            $consultaID = "DELETE FROM tbl_alumnos WHERE matricula_alumno = :ID";
            $stmt = $conexion->prepare($consultaID);
            $stmt->bindParam(':ID', $ID);
            $stmt->execute();
            $conexion->commit();
            header('location: leer.php');
            exit();
        } catch (PDOException $e) {
            $conexion->rollBack();
            echo $e->getMessage();
            header('location: leer.php');
        }
    }
} else{
    header("Location: ../formularios/login.php");
    exit();
}


