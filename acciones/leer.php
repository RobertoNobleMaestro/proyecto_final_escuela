<?php
session_start();
// session_start();
// if (!isset($_SESSION['loginOK']) || $_SESSION['loginOK'] !== true) {
//     header("Location: login.php");
//     exit();
// } 
$usuario = $_SESSION['usuario'];
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
    <nav class="navbar navbar-expand-lg barra">
         <div class="container-fluid">
         <a class="navbar-brand" href="#"><img src="../img/logo.png" alt=""></a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle enlace-barra" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Órden alfabético</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">A-Z</a></li>
                    <li><a class="dropdown-item" href="#">Z-A</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Sexo</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Masculino</a></li>
                    <li><a class="dropdown-item" href="#">Femenino</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Curso</a>
                <ul class="dropdown-menu">
                </li>
                    <li><a class="dropdown-item" href="#">1º Bachilletato Social</a></li>
                    <li><a class="dropdown-item" href="#">1º Bachilletato Tecnológico</a></li>
                    <li><a class="dropdown-item" href="#">1º Bachilletato Científico</a></li>
                    <li><a class="dropdown-item" href="#">2º Bachilletato Social</a></li>
                    <li><a class="dropdown-item" href="#">2º Bachilletato Tecnológico</a></li>
                    <li><a class="dropdown-item" href="#">2º Bachilletato Científico</a></li>
                    <li><a class="dropdown-item" href="#">1º SMX</a></li>
                    <li><a class="dropdown-item" href="#">2º SMX</a></li>
                    <li><a class="dropdown-item" href="#">1º ASIX</a></li>
                    <li><a class="dropdown-item" href="#">2º ASIX</a></li>
                    <li><a class="dropdown-item" href="#">2º DAW</a></li>
                </ul>
                </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
<?php
require_once '../conexion.php';

$consulta = $conexion->prepare('
    SELECT 
        matricula_alumno, 
        nombre_alumno, 
        apellido_alumno, 
        email_alumno, 
        telefono_alumno, 
        DNI_alumno, 
        direccion_alumno, 
        nombre_curso 
    FROM 
        tbl_alumnos 
    INNER JOIN 
        tbl_cursos 
    ON 
        fk_id_curso = fk_id_curso_alu
    ORDER BY 
        matricula_alumno;
');

$consulta->execute();
$resultados = $consulta->fetchAll();
    if($usuario = 'admin'){
        echo '<form action="../formularios/form-crear.php">
                <button class="crear-btn" type="submit">Crear</button>
                <h1>Alumnos</h1>
            </form>';
    }
echo '<table class="data-table">';
echo '<thead class="titulos">';
echo '<tr>';

for ($i = 0; $i < $consulta->columnCount(); $i++) {
    $columna = $consulta->getColumnMeta($i);
    echo "<th>" . $columna["name"] . "</th>";
}

echo '<th>Acciones</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($resultados as $columna) {
    echo "<tr>";
    for ($i = 0; $i < $consulta->columnCount(); $i++) {
        echo "<td>" . htmlspecialchars($columna[$i]) . "</td>";
    }
    if()
    echo "<td class='botones-leer'>
            <a class='editar' href='../formularios/form-editar.php?ID=".$columna['matricula_alumno'] . "'>Editar</a>
            <a class='eliminar'  href='./acciones/eliminar.php?ID=".$columna['matricula_alumno'] . "'>Eliminar</a>
          </td>";
    echo "</tr>";
}

echo '</tbody>';
echo '</table>';    
?>
<form action="./leerprofes.php"><button type="submit">Ver profesores</button></form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
</body>
</html>