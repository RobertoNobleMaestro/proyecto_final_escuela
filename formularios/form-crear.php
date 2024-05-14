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
            <form action="../acciones/crear.php" method="POST" class="form-estr">
            <h2>Formulario de Inscripción de Alumnos</h2>
                <div class="campo">
                    <label for="nombre">Nombre del Alumno:</label><br>
                    <input type="text" id="nombre" name="nombre" onmouseleave="validaNombre()" >
                    <br>
                    <br>
                    <!-- <p  class="error" id="error_nombre"></p> -->
                    <label for="apellidos">Apellidos del Alumno:</label><br>
                    <input type="text" id="apellidos" name="apellidos" onmouseleave="validaApellidos()" >
                    <br>
                    <br>
                    <!-- <p  class="error" id="error_nombre"></p> -->
                    <label for="email">Email del Alumno:</label><br>
                    <input type="email" id="email" name="email" onmouseleave="validaMail()" ><br><br>
                    <!-- <p class="error" id="error_email"></p> -->
                </div>
                <div class="campo">
                <label for="sexo">Sexo del Alumno:</label><br>                
                    <select id="sexo" name="sexo" onclick="validaSexo()" >
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select><br><br>
                    <!-- <p class="error" id="error_sexo"></p> -->
                    <label for="telefono">Teléfono del Alumno:</label><br>
                    <input type="tel" id="telefono" name="telefono" onmouseleave = "validaTelf()"><br>
                    <!-- <p class="error" id="error_telf"></p> -->
                    <br>
                    <label for="dni">DNI del Alumno:</label><br>
                    <input type="text" id="dni" name="dni" onmouseleave = "validaDNI()"><br><br>
                    <!-- <p class="error" id="error_dni"></p> -->
                </div>
                <label for="direccion">Dirección del Alumno:</label><br>
                <input type="text" id="direccion" name="direccion" onmouseleave="validaDireccion()">
                <!-- <p class="error" id="error_direccion"></p> -->
                <p class="error" id="error"></p>   
          
            </form> 
            <div class="login_forma">
                <button type="submit">Crear</button> 
                <a href="../acciones/leer.php"><img src="../img/arrow-left-solid.svg" alt=""></a>
            </div>
            </div>
        </div>  
    <!-- Link a archivo javascript-->
    <script src="../scripts/validarCrear.js"></script>
</body>
</html>

