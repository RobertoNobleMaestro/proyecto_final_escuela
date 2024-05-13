<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuarioIngresado = strtolower($_POST["usuario"]);
        $pwdIngresado = $_POST["password"];
        if($usuarioIngresado != "admin" || $pwdIngresado != "QAZqaz123"){
            $_SESSION['alerta'] = 'error';
            header("Location: ../formularios/login.php");

        } else{
            header('Location: leer.php');
        }
    }
