<?php
if(isset($_GET['orden']) && ($_GET['orden'] === 'asc' || $_GET['orden'] === 'desc')){
    $ordenProfe = $_GET['orden'];
    $consulta = $conexion->prepare("
        SELECT
            *
        FROM
            tbl_profesores
        ORDER BY nombre_profe $ordenProfe, apellido_profe $ordenProfe;
    ");
} elseif (isset($_GET['orden']) && ($_GET['orden'] === 'Masculino' || $_GET['orden'] === 'Femenino' || $_GET['orden'] == 'Otro')) {
    $ordenProfe = $_GET['orden'];
    $consulta_total = $conexion->prepare("
        SELECT COUNT(sexo_alumno)
        FROM tbl_alumnos
        WHERE sexo_alumno = '$orden';
    ");
    $consulta = $conexion->prepare("
        SELECT  
            *
        FROM 
            tbl_profesores 
        where sexo_alumno = '$orden';
    "); 
}
// $consulta->execute();
// $resultados = $consulta->fetchAll();
?>