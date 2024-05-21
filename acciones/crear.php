<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../formularios/login.php");
    exit();
}
require_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $dni = isset($_POST['dni']) ? $_POST['dni'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '' ;

    $sexo_permitidos = ['masculino', 'femenino', 'otro'];
    if (!in_array($sexo, $sexo_permitidos)) {
        exit();
        header('location:../formularios/form-crear.php');
    }

    $sql = "INSERT INTO tbl_alumnos (nombre_alumno, apellido_alumno, email_alumno, sexo_alumno, telefono_alumno, DNI_alumno, direccion_alumno) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $apellidos);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $sexo);
    $stmt->bindParam(5, $telefono);
    $stmt->bindParam(6, $dni);
    $stmt->bindParam(7, $direccion);
    $stmt->execute();
    header('location:./leer.php');
    if ($stmt->execute()) {
        echo "<script>
            Swal.fire({
            title: 'Se ha creado correctamente',
            icon: 'success'
          });
          </script>";
    } else {
        echo "Error";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
