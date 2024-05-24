<?php
session_start();
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
    <title>Inicio de sesion</title>
</head>
<body>
    <header>
        <img src="../img/logo.png" alt="">
    </header>
    <div id="login_form">
        <form method="POST" action="../acciones/validarLogin.php" class="login_estr">
            <h4>Iniciar sesión</h4>
            <div id="columnas-form">
                <img src="../img/usuario-icono.svg" alt="" id="img-icons">
                <input type="text" name="usuario" id="usuario" onmouseleave="usuari()">
            </div>
            <p class="error" id="error_user"></p>
            <br>
            <div id="columnas-form">
                <img src="../img/candado-icono.svg" alt="" id="img-icons">
                <input type="password" id="password" name="password" onmouseleave="validapasswd()">
            </div>
            <p class="error" id="error_psswd"></p>
            </div>
            <div id="login_forma">
                <button type="submit" value="ENTRAR">Iniciar sesión</button>
            </div>
        </form>        
    <script src="../scripts/validacionEntrada.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

?>
</body>
</html>