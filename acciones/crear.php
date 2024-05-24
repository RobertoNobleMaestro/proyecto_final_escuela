<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once('../conexion.php');
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $dni = isset($_POST['dni']) ? $_POST['dni'] : '';
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
        $curso = isset($_POST['curso']) ? $_POST['curso'] : '';
        $sexo_permitidos = ['masculino', 'femenino', 'otro'];
         $sql = "INSERT INTO tbl_alumnos (nombre_alumno, apellido_alumno, email_alumno, sexo_alumno, telefono_alumno, DNI_alumno, direccion_alumno, fk_id_curso_alu) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
         $stmt = $conexion->prepare($sql);
         $stmt->bindParam(1, $nombre);
         $stmt->bindParam(2, $apellidos);
         $stmt->bindParam(3, $email);
         $stmt->bindParam(4, $sexo);
         $stmt->bindParam(5, $telefono);
         $stmt->bindParam(6, $dni);
         $stmt->bindParam(7, $direccion);
         $stmt->bindParam(8, $curso);       
        $stmt->execute();
        header('location:./leer.php');
    } else {
        header('location:../formularios/form-crear.php');
    }    

?>
