<?php
    session_start();
    $pwd = $_POST['password'];
    $usuario = $_POST['usuario'];
    if ($_SERVER['REQUEST_METHOD'] != 'POST' || $pwd != 'QAZqaz123' || $usuario != 'admin') {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['alerta'] = 'error';
        header("Location: ../formularios/login.php");
        sweetA();
        exit();
    } elseif ($_SERVER['REQUEST_METHOD'] != 'POST' || $pwd != 'QAZqaz123' || $usuario != 'profe') {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['alerta'] = 'error';
        header("Location: ../formularios/login.php");
        sweetA();
        exit();
    }else{
        header("./leer.php");
    }
    
    
