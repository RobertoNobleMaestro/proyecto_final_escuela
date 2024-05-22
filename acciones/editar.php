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
        $email = $_POST['email'];
    try {
        require_once '../conexion.php';
        $consulta = "UPDATE tbl_alumnos 
        SET apellido_alumno = :apellidos, 
            nombre_alumno = :nombre, 
            sexo_alumno = :sexo, 
            telefono_alumno = :telefono, 
            DNI_alumno = :dni, 
            direccion_alumno = :direccion, 
            email_alumno = :email,            
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
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        header('Location: ./leer.php');
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    }
}
if (isset($_GET['Profes'])) {
    header('Location: ../index.php');
    exit();
} else {    
        $ID = $_POST['ID'];
        $apellido = $_POST['apellidos'];
        $nombre = $_POST['nombre'];
        $sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $salario = $_POST['salario'];
        $nacimiento = $_POST['nacimiento'];
        $contrato = $_POST['contrato'];
    try {
        require_once '../conexion.php';
        $consulta = "UPDATE tbl_profesores 
        SET apellido_profe = :apellidos, 
            nombre_profe = :nombre, 
            sexo_profe = :sexo, 
            telefono_profe = :telefono, 
            DNI_profe = :dni, 
            direccion_profe = :direccion, 
            email_profe = :email,
            fecha_contrato_profe = :contrato,
            fecha_nacimi_profe = :nacimiento,
            salario_profe = :salario
        WHERE id_profe = :ID";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':apellidos', $apellido);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':ID', $ID);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':nacimiento', $nacimiento);
        $stmt->bindParam(':contrato', $contrato);
        $stmt->execute();
        header('Location: ./leerprofes.php');
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    }
}
?>
   
    
