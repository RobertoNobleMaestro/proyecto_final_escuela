<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
     
    header("Location: ../formularios/login.php");
    exit();
}
if (isset($_GET['Alumn'])) {
    $ID = $_GET['Alumn'];
    require_once('../conexion.php');
    $consulta = $conexion->prepare('SELECT * FROM tbl_alumnos WHERE matricula_alumno = :ID');
    $consulta->bindParam(':ID', $ID);
    $consulta->execute();
    $resultados = $consulta->fetch();
    if (!$resultados) {
        echo "Error ID.";
        exit();
    }
} else {
    echo "ID no proporcionado.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form-styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">    
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="column-3">
            <img src="../img/logo.png"  id="logo" alt="">
        </div>
        <div class="column-7">
            <form action="../acciones/editar.php" method="POST" class="form-estr">
            <h2>Formulario de Inscripción de Alumnos</h2>
                <div class="campo">
                <label for="matricula">Matricula del Alumno:</label><br>
                    <input type="text" id="matricula" name="matricula" value="<?php echo $ID; ?>" onmouseleave="validaNombre()" readonly> <br><br>                   
                    <label for="nombre">Nombre del Alumno:</label><br>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $resultados['nombre_alumno']; ?>" onmouseleave="validaNombre()" >
                    <br>
                    <br>
                    <label for="apellidos">Apellidos del Alumno:</label><br>
                    <input type="text" id="apellidos" name="apellidos"  value="<?php echo $resultados['apellido_alumno']; ?>" onmouseleave="validaApellidos()" >
                    <br>
                    <br>
                    <label for="email">Email del Alumno:</label><br>
                    <input type="email" id="email" name="email"  value="<?php echo $resultados['email_alumno']; ?>"onmouseleave="validaMail()" ><br><br>
                </div>
                <div class="campo">
                <label for="sexo">Sexo del Alumno:</label><br>                
                <select id="sexo" name="sexo" onclick="validaSexo()">
                    <option value="masculino" <?php echo ($resultados['sexo_alumno'] == "Masculino") ? ' selected="selected"' : '';?>>Masculino</option>
                    <option value="femenino" <?php echo ($resultados['sexo_alumno'] == "Femenino") ? ' selected="selected"' : '';?>>Femenino</option>
                    <option value="otro" <?php echo ($resultados['sexo_alumno'] == "Otro") ? ' selected="selected"' : '';?>>Otro</option>
                </select><br><br>
                    <label for="telefono">Teléfono del Alumno:</label><br>
                    <input type="tel" id="telefono" name="telefono" onmouseleave = "validaTelf()" value="<?php echo $resultados['telefono_alumno']; ?>"><br>
                    <br>
                    <label for="dni">DNI del Alumno:</label><br>
                    <input type="text" id="dni" name="dni" onmouseleave = "validaDNI()" value="<?php echo $resultados['DNI_alumno']; ?>"><br><br>
                    <label for="curso">Curso del Alumno:</label><br>               
                <select id="curso" name="curso">
                    <option value="1" <?php echo ($resultados['fk_id_curso_alu'] == "1") ? ' selected="selected"' : '';?>>1º Bachillerato Social</option>
                    <option value="2" <?php echo ($resultados['fk_id_curso_alu'] == "2") ? ' selected="selected"' : '';?>>2º Bachillerato Social</option>
                    <option value="3" <?php echo ($resultados['fk_id_curso_alu'] == "3") ? ' selected="selected"' : '';?>>1º Bachillerato Cientifico</option>
                    <option value="4" <?php echo ($resultados['fk_id_curso_alu'] == "4") ? ' selected="selected"' : '';?>>2º Bachillerato Cientifico</option>
                    <option value="5" <?php echo ($resultados['fk_id_curso_alu'] == "5") ? ' selected="selected"' : '';?>>SMX1</option>
                    <option value="6" <?php echo ($resultados['fk_id_curso_alu'] == "6") ? ' selected="selected"' : '';?>>SMX2</option>
                    <option value="7" <?php echo ($resultados['fk_id_curso_alu'] == "7") ? ' selected="selected"' : '';?>>ASIX1</option>
                    <option value="8" <?php echo ($resultados['fk_id_curso_alu'] == "8") ? ' selected="selected"' : '';?>>ASIX2</option>
                    <option value="9" <?php echo ($resultados['fk_id_curso_alu'] == "9") ? ' selected="selected"' : '';?>>DAW1</option>
                    <option value="10" <?php echo ($resultados['fk_id_curso_alu'] == "10") ? ' selected="selected"' : '';?>>DAW2</option>
                </select>
                </div>
                <label for="direccion">Dirección del Alumno:</label>
                <input type="text" id="direccion" name="direccion" onmouseleave="validaDireccion()" value="<?php echo  $resultados['direccion_alumno']; ?>">
                <button type="submit">Editar</button> 
                <p class="error" id="error"></p>   
            </form> 
            <div class="login_forma">
                <a href="../acciones/leer.php"><img src="../img/arrow-left-solid.svg" alt=""></a>
            </div>
            </div>
        </div>  
    <!-- Link a archivo javascript-->
    <script src="../scripts/validarCrear.js"></script>
</body>
</html>

