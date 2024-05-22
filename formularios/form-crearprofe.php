<!-- <?php 
// session_start();
// if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
     
//     header("Location: ../formularios/login.php");
//     exit();
// }
?>-->
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
            <form action="../acciones/crearprofe.php" method="POST" class="form-estr">
            <h2>Formulario de Inscripción de Profesor</h2>
                <div class="campo">
                    <label for="nombre">Nombre del Profesor:</label><br>
                    <input type="text" id="nombre" name="nombre" onmouseleave="validaNombre()" >
                    <br>
                    <br>
                    <label for="apellidos">Apellidos del Profesor:</label><br>
                    <input type="text" id="apellidos" name="apellidos" onmouseleave="validaApellidos()" >
                    <br>
                    <br>
                    <label for="salario">Salario del profesor:</label><br>
                    <input type="text" id="salario" name="salario" onmouseleave = "validasalario()">
                    <br>
                    <br>
                    <label for="email">Email del Profesor:</label><br>
                    <input type="email" id="email" name="email" onmouseleave="validaMail()" ><br><br>
                    <label for="curso"> Curso del Profesor:</label><br>   
                    <select id="curso" name="curso" onclick="validaCurso()">
                        <option value="1">1º Bachillerato Social</option>
                        <option value="2">2º Bachillerato Social</option>
                        <option value="3">1º Bachillerato Cientifico</option>
                        <option value="4">2º Bachillerato Cientifico</option>
                        <option value="5">SMX1</option>
                        <option value="6">SMX2</option>
                        <option value="7">ASIX1</option>
                        <option value="8">ASIX2</option>
                        <option value="9">DAW1</option>
                        <option value="10">DAW2</option>
                </select>
                </div>
                <div class="campo">
                <label for="sexo">Sexo del Profesor:</label><br>                
                    <select id="sexo" name="sexo" onclick="validaSexo()" >
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select><br><br>
                    <label for="telefono">Teléfono del Profesor:</label><br>
                    <input type="tel" id="telefono" name="telefono" onmouseleave = "validaTelf()"><br>
                    <br>
                    <label for="dni">DNI del Profesor:</label><br>
                    <input type="text" id="dni" name="dni" onmouseleave = "validaDNI()"><br><br>
                    <label for="contrato">Fecha de contratación:</label><br>
                    <input type="contrato" id="contrato" name="contrato" onmouseleave="validaMail()"> <br><br>
                    <label for="nacimiento">Fecha de nacimiento:</label><br>
                    <input type="nacimiento" id="nacimiento" name="nacimiento" onmouseleave="validaMail()">
                </div>
                <label for="direccion" class="direccion">Dirección del Profesor:</label><br>
                    <input type="text" id="direccion" name="direccion" onmouseleave="validaDireccion()">
                <!-- <p class="error" id="error"></p>  
                <p class="error" id="error_curso"></p> -->
                <button type="submit">Crear</button> 
            </form> 
            <div class="login_forma">
                <a href="../acciones/leerprofes.php"><img src="../img/arrow-left-solid.svg" alt=""></a>
            </div>
            </div>
        </div>  
    <!-- Link a archivo javascript-->
    <script src="../scripts/validarCrear.js"></script>
</body>
</html>

