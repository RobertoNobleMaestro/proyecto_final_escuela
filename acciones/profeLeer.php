<?php

session_start();

// compruebo si existe el rol de profe, sino envio a login.php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'profe') {
    header("Location: ../formularios/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Alumnos</title>
</head>
<body>
<nav class="navbar navbar-expand-lg barra">
         <div class="container-fluid">
         <a class="navbar-brand" href="profeLeer.php"><img src="../img/logo.png" alt=""></a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle enlace-barra" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Órden alfabético</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="profeLeer.php?orden=asc">A-Z</a></li>
                    <li><a class="dropdown-item" href="profeLeer.php?orden=desc">Z-A</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Sexo</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item"  href="profeLeer.php?orden=Masculino">Masculino</a></li>
                    <li><a class="dropdown-item"  href="profeLeer.php?orden=Femenino">Femenino</a></li>
                    <li><a class="dropdown-item"  href="profeLeer.php?orden=Otro">Otro</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Curso</a>
                <ul class="dropdown-menu">
                </li>
                    <li><a class="dropdown-item" href="profeLeer.php?orden=1">1º Bachilletato Social</a></li>
                    <li><a class="dropdown-item" href="profeLeer.php?orden=3">1º Bachilletato Científico</a></li>
                    <li><a class="dropdown-item" href="profeLeer.php?orden=2">2º Bachilletato Social</a></li>
                    <li><a class="dropdown-item" href="profeLeer.php?orden=4">2º Bachilletato Científico</a></li>
                    <li><a class="dropdown-item" href="profeLeer.php?orden=5">1º SMX</a></li>
                    <li><a class="dropdown-item" href="profeLeer.php?orden=6">2º SMX</a></li>
                    <li><a class="dropdown-item" href="profeLeer.php?orden=7">1º ASIX</a></li>
                    <li><a class="dropdown-item" href="profeLeer.php?orden=8">2º ASIX</a></li>
                    <li><a class="dropdown-item" href="profeLeer.php?orden=9">1º DAW</a></li>
                    <li><a class="dropdown-item" href="profeLeer.php?orden=10">2º DAW</a></li>
                </ul>
                </li>
                </ul>
                <form class="d-flex" role="search" method="get" action="">
                    <input class="form-control me-2" type="search" name="query" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <div id="resultados">
                </div>
            </div>
        </div>
    </nav>
    <br>
<?php
require_once '../conexion.php';
require_once 'consulta_profe.php';
$consulta_Prof = $conexion->prepare("
SELECT COUNT(*)
FROM tbl_profesores;
");
foreach($total_alu as $aluTotal){
    $total_alus = $aluTotal[0];
}
echo "<h1>Total Alumnos: ".$total_alus."</h1>";
echo '<table class="datos-tabla">';
echo '<thead class="titulos">';
echo '<tr class="thead-dark">';
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>Email</th>";
    echo "<th>Teléfono</th>";
    echo "<th>DNI</th>";
    echo "<th>Dirección</th>";
    echo "<th>Curso</th>";
echo "</tr>";
echo '</thead>';
echo '<tbody>';
foreach ($resultados as $columna) {
    echo "<tr class='bordes'>";
    echo "<td data-label='Nombre'>" . htmlspecialchars($columna['nombre_alumno']) . "</td>";
    echo "<td data-label='Apellido'>" . htmlspecialchars($columna['apellido_alumno']) . "</td>";
    echo "<td data-label='Email'>" . htmlspecialchars($columna['email_alumno']) . "</td>";
    echo "<td data-label='Teléfono'>" . htmlspecialchars($columna['telefono_alumno']) . "</td>";
    echo "<td data-label='DNI'>" . htmlspecialchars($columna['DNI_alumno']) . "</td>";
    echo "<td data-label='Dirección'>" . htmlspecialchars($columna['direccion_alumno']) . "</td>";
    echo "<td data-label='Curso'>" . htmlspecialchars($columna['nombre_curso']) . "</td>";
    echo "</tr>";
}
echo '</tbody>';
echo '</table>';  
?>
<form method="POST" action="../acciones/cerrarSesionProfe.php"><button type="submit" class="btn-session">Cerrar Sesion</button></form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html