<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once('../conexion.php');
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
        $salario = isset($_POST['salario']) ? $_POST['salario'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $dni = isset($_POST['dni']) ? $_POST['dni'] : '';
        $fechaCont = isset($_POST['contrato']) ? $_POST['contrato'] : '';
        $fechaNac = isset($_POST['nacimiento']) ? $_POST['nacimiento'] : '';
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
        $sexo_permitidos = ['masculino', 'femenino', 'otro'];
      
         $sql = "INSERT INTO tbl_profesores (nombre_profe, apellido_profe, email_profe, salario_profe, sexo_profe, telefono_profe, DNI_profe, direccion_profe, fecha_contrato_profe, fecha_nacimi_profe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
         $stmt = $conexion->prepare($sql);
         $stmt->bindParam(1, $nombre);
         $stmt->bindParam(2, $apellidos);
         $stmt->bindParam(3, $email);
         $stmt->bindParam(4, $salario);
         $stmt->bindParam(5, $sexo);
         $stmt->bindParam(6, $telefono);
         $stmt->bindParam(7, $dni);
         $stmt->bindParam(8, $direccion);
         $stmt->bindParam(9, $fechaCont);
         $stmt->bindParam(10, $fechaNac);
        //  $stmt->bindParam(11, $curso);       
        $stmt->execute();
        header('location:./leerprofes.php');
    } else {
        header('location:../formularios/form-crearprofe.php');
    }    

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>