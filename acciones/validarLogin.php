<?php
session_start();

$credenciales = [
    'admin' => 'QAZqaz123',
    'profe' => 'QAZqaz123'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if (isset($credenciales[$usuario]) && $credenciales[$usuario] === $password) {
        if ($usuario === 'admin') {
            // Creo la variable de sesión para admin
            $_SESSION['role'] = 'admin';
            header("Location: leer.php");
        } elseif ($usuario === 'profe') {
            // Creo la variable de sesión para profe
            $_SESSION['role'] = 'profe';
            header("Location: profeLeer.php");
        }
        exit();
    } else {
        header("Location: ../formularios/login.php");
    }
}
?>

