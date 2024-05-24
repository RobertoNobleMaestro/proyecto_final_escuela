<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') { 
    header("Location: ../formularios/login.php");
    exit();
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Profesores</title>
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
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=asc">A-Z</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=desc">Z-A</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Sexo</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=Masculino">Masculino</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=Femenino">Femenino</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=Otro">Otro</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Curso</a>
                <ul class="dropdown-menu">
                </li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=1">1º Bachilletato Social</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=2">1º Bachilletato Científico</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=3">2º Bachilletato Social</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=4">2º Bachilletato Científico</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=5">1º SMX</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=6">2º SMX</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=7">1º ASIX</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=8">2º ASIX</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=9">1º DAW</a></li>
                    <li><a class="dropdown-item" href="./leerprofes.php?orden=10">2º DAW</a></li>
                </ul>
                </li>
                </ul>
                <form class="d-flex" role="search" method="GET" action="">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search"  name="query">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    <?php
        require_once '../conexion.php';
        $consulta_Prof = $conexion->prepare("
            SELECT COUNT(*)
            FROM tbl_profesores;
        ");
        require_once './consultaprofes.php';
        $consulta_Prof->execute();
        $total_Prof = $consulta_Prof->fetchAll();
        foreach($total_Prof as $total){
            $verTotalProf = $total[0];
        }
        echo '<form action="../formularios/form-crearprofe.php">
            <button class="crear-btn" type="submit">Crear</button>
            <h1>Total Profesores: '.$verTotalProf.'</h1>
        </form>';            
            echo '<table class="datos-tabla">';
            echo '<thead class="titulos">';
                echo '<tr class="thead-dark">';
                    echo "<th>ID</th>";
                    echo "<th>Nombre</th>";
                    echo "<th>Apellido</th>";
                    echo "<th>email</th>";
                    echo "<th>Salario</th>";
                    echo "<th>Sexo</th>";
                    echo "<th>Telefono</th>";
                    echo "<th>DNI</th>";
                    echo '<th>Dirección</th>';
                    echo "<th>Fecha de contratación</th>";
                    echo "<th>Fecha de nacimiento</th>";
                    echo "<th>Acciones</th>";
                echo "</tr>";
            echo '</thead>';
            echo '<tbody>';
            foreach ($resultados as $columna) {
                echo "<tr class='bordes'>";
                echo "<td data-label='ID'>" . htmlspecialchars($columna['id_profe']) . "</td>";
                echo "<td data-label='Nombre'>" . htmlspecialchars($columna['nombre_profe']) . "</td>";
                echo "<td data-label='Apellido'>" . htmlspecialchars($columna['apellido_profe']) . "</td>";
                echo "<td data-label='Email'>" . htmlspecialchars($columna['email_profe']) . "</td>";
                echo "<td data-label='Salario'>" . htmlspecialchars($columna['salario_profe']) . "</td>";
                echo "<td data-label='Sexo'>" . htmlspecialchars($columna['sexo_profe']) . "</td>";
                echo "<td data-label='Telefono'>" . htmlspecialchars($columna['telefono_profe']) . "</td>";
                echo "<td data-label='Dirección'>" . htmlspecialchars($columna['DNI_profe']) . "</td>";
                echo "<td data-label='Dirección'>" . htmlspecialchars($columna['direccion_profe']) . "</td>";
                echo "<td data-label='Fecha de contratación'>" . htmlspecialchars($columna['fecha_contrato_profe']) . "</td>"; 
                echo "<td data-label='Fecha de nacimiento'>" . htmlspecialchars($columna['fecha_nacimi_profe']) . "</td>";                 
                echo "<td data-label='Acciones' class='botones-leer'>
                        <a class='editar' href='../formularios/form-editar-profe.php?Profes=" . $columna['id_profe'] . "'>Editar</a>
                        <a class='eliminar' href='eliminar.php?Profes=" . $columna['id_profe'] . "'>Eliminar</a>
                    </td>";
                echo "</tr>";
            }
            echo '</tbody>';
            echo '</table>';    
        ?>  
<form action="../acciones/leer.php"><button type="submit" class="btn-session">Ver alumnos</button></form>
<form method="POST" action="../acciones/cerrarSesionProfe.php"><button type="submit" class="btn-session">Cerrar Sesion</button></form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>