<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    
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
    <title>Document</title>
</head>
<body>
    <?php
        require_once '../conexion.php';
        $consulta_total = $conexion->prepare("
            SELECT count(*)
            FROM tbl_alumnos;
        ");
        $consulta_total->execute();
        $total_alu = $consulta_total->fetchall();
        ?>
    <nav class="navbar navbar-expand-lg barra">
         <div class="container-fluid">
         <a class="navbar-brand" href="leer.php"><img src="../img/logo.png" alt=""></a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle enlace-barra" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Órden alfabético</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="leer.php?orden=asc">A-Z</a></li>
                    <li><a class="dropdown-item" href="leer.php?orden=desc">Z-A</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Sexo</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item"  href="leer.php?orden=Masculino">Masculino</a></li>
                    <li><a class="dropdown-item"  href="leer.php?orden=Femenino">Femenino</a></li>
                    <li><a class="dropdown-item"  href="leer.php?orden=Otro">Otro</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Curso</a>
                <ul class="dropdown-menu">
                </li>
                    <li><a class="dropdown-item" href="leer.php?orden=1">1º Bachilletato Social</a></li>
                    <li><a class="dropdown-item" href="leer.php?orden=3">1º Bachilletato Científico</a></li>
                    <li><a class="dropdown-item" href="leer.php?orden=2">2º Bachilletato Social</a></li>
                    <li><a class="dropdown-item" href="leer.php?orden=4">2º Bachilletato Científico</a></li>
                    <li><a class="dropdown-item" href="leer.php?orden=5">1º SMX</a></li>
                    <li><a class="dropdown-item" href="leer.php?orden=6">2º SMX</a></li>
                    <li><a class="dropdown-item" href="leer.php?orden=7">1º ASIX</a></li>
                    <li><a class="dropdown-item" href="leer.php?orden=8">2º ASIX</a></li>
                    <li><a class="dropdown-item" href="leer.php?orden=9">1º DAW</a></li>
                    <li><a class="dropdown-item" href="leer.php?orden=10">2º DAW</a></li>
                </ul>
                </li>
                </ul>
                <form class="d-flex" role="search" method="get" action="filtrar.php">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <div id="resultados">
                    <?php
                    if (isset($_GET['query'])) {
                        require 'filtrar.php';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
<?php
require_once 'consulta.php';
echo '<form action="../formularios/form-crear.php">
        <button class="crear-btn" type="submit">Crear</button>';
echo    '<div>';
            foreach($total_alu as $total_alumnos){
                $verTotal = $total_alumnos[0];
            }
echo        '</div>
        <h1>Total Alumnos: '.$verTotal.'</h1>
    </form>'; 
echo '<table class="datos-tabla">';
echo '<theadclass="titulos">';
echo '<tr class="thead-dark">';
    echo "<th>Matrícula</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>email</th>";
    echo "<th>Teléfono</th>";
    echo "<th>DNI</th>";
    echo "<th>Dirección</th>";
    echo "<th>Curso</th>";
    echo '<th>Acciones</th>';
    echo "</tr>";
echo '</thead>';
echo '<tbody>';
foreach ($resultados as $columna) {
    echo "<tr class='bordes'>";
    for ($i = 0; $i < $consulta->columnCount(); $i++) {
        echo "<td>" . htmlspecialchars($columna[$i]) . "</td>";
    } 
    echo "<td class='botones-leer'>
            <a class='editar' href='../formularios/form-editar.php?Alumn=".$columna['matricula_alumno'] . "'>Editar</a>
            <a class='eliminar'href='eliminar.php?Alumn=".$columna['matricula_alumno'] . "'>Eliminar</a>
          </td>";
    echo "</tr>";
}
echo '</tbody>';
echo '</table>';    
?>


<div class="">
    <form method="POST" action=" leerprofes.php"><button type="submit" class="btn-session" >Ver profesores</button></form>
    <form method="POST" action="../acciones/cerrarSesionProfe.php"><button type="submit" class="btn-session">Cerrar Sesion</button></form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>