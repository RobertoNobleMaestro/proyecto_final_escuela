<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
     
    header("Location: ../formularios/login.php");
    exit();
}
if (isset($_GET['Profes'])) {
    $ID = $_GET['Profes'];
    require_once('../conexion.php');
    $consulta = $conexion->prepare('SELECT * FROM tbl_profesores WHERE id_profe = :ID');
    $consulta->bindParam(':ID', $ID);
    $consulta->execute();
    $resultados = $consulta->fetch();
    if (!$resultados) {
        echo "Error ID.";
        exit();
    }
} 
?>
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
            <h2>Formulario de Inscripción de Profesores</h2>
                <div class="campo">
                <label for="ID">Id del profesor:</label><br>
                    <input type="text" id="ID" name="ID" value="<?php echo $ID; ?>" onmouseleave="validaNombre()" readonly> <br><br>                   
                    <label for="nombre">Nombre del Profesor:</label><br>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $resultados['nombre_profe']; ?>" onmouseleave="validaNombre()" ><br><br>
                    <p class="error" id="error_nombre"></p>                
                    <label for="apellidos">Apellido del profesor:</label><br>
                    <input type="text" id="apellidos" name="apellidos"  value="<?php echo $resultados['apellido_profe']; ?>" onmouseleave="validaApellidos()" ><br><br>
                    <p class="error" id="error_apellidos"></p>
                    <label for="salario">Salario del profesor:</label><br>
                    <input type="text" id="salario" name="salario" onmouseleave = "validasalario()" value="<?php echo $resultados['salario_profe']; ?>"><br><br>
                    <p class="error" id="error_salario"></p>
                    <label for="email">Email del profesor:</label>
                    <input type="email" id="email" name="email"  value="<?php echo $resultados['email_profe']; ?>"onmouseleave="validaMail()"><br><br>
                    <p class="error" id="error_email"></p>
                </div>
                <div class="campo">
                <label for="sexo">Sexo del profesor:</label><br>                
                <select id="sexo" name="sexo" onclick="validaSexo()">
                    <option value="masculino" <?php echo ($resultados['sexo_profe'] == "Masculino") ? ' selected="selected"' : '';?>>Masculino</option>
                    <option value="femenino" <?php echo ($resultados['sexo_profe'] == "Femenino") ? ' selected="selected"' : '';?>>Femenino</option>
                    <option value="otro" <?php echo ($resultados['sexo_profe'] == "Otro") ? ' selected="selected"' : '';?>>Otro</option>
                </select><br><br>
                <p class="error" id="error_sexo"></p>
                    <label for="telefono">Teléfono del profesor:</label><br>
                    <input type="tel" id="telefono" name="telefono" onmouseleave = "validaTelf()" value="<?php echo $resultados['telefono_profe']; ?>"><br><br>
                    <p class="error" id="error_telf"></p>
                    <label for="dni">DNI del profesor:</label><br>
                    <input type="text" id="dni" name="dni" onmouseleave = "validaDNI()" value="<?php echo $resultados['DNI_profe']; ?>"><br><br>
                    <p class="error" id="error_dni"></p>
                    <label for="contrato">Fecha de contratación:</label><br>
                    <input type="contrato" id="contrato" name="contrato"  value="<?php echo $resultados['fecha_contrato_profe']; ?>"onmouseleave="validacontra()"> <br><br>
                    <p class="error" id="error_contrato"></p>
                    <label for="nacimiento">Fecha de nacimiento:</label><br>
                    <input type="nacimiento" id="nacimiento" name="nacimiento"  value="<?php echo $resultados['fecha_nacimi_profe']; ?>"onmouseleave="validanacimiento()"><br><br>
                    <p class="error" id="error_nacimiento"></p>
                </div><br><br>
                    <label for="direccion" class="direccion">Dirección del profesor:</label><br>
                    <input type="text" id="direccion" name="direccion" onmouseleave="validaDireccion()" value="<?php echo  $resultados['direccion_profe']; ?>"><br><br>
                    <p class="error" id="error_dir"></p><br><br>
                <button type="submit" id="btn-editar-prof">Editar</button> 
            </form> 
            <div class="login_forma">
                <a href="../acciones/leerprofes.php"><img src="../img/arrow-left-solid.svg" alt=""></a>
            </div>
            </div>
        </div>  
    <script src="../scripts/validarEditar.js"></script>
</body>
