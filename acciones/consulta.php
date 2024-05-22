<?php
if (isset($_GET['orden']) && ($_GET['orden'] === 'asc' || $_GET['orden'] === 'desc')) {
    $orden = $_GET['orden'];
    $consulta = $conexion->prepare("
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
            id_curso = fk_id_curso_alu
        ORDER BY nombre_alumno $orden, apellido_alumno $orden
    ");
 } elseif (isset($_GET['orden']) && ($_GET['orden'] === 'Masculino' || $_GET['orden'] === 'Femenino' || $_GET['orden'] == 'Otro')) {
    $orden = $_GET['orden'];
    $consulta = $conexion->prepare("
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
            id_curso = fk_id_curso_alu
        where sexo_alumno = '$orden';
        "); 
 } elseif (isset($_GET['orden']) && ($_GET['orden'] === '1' || $_GET['orden'] === '2' || $_GET['orden'] == '3' || $_GET['orden'] == '4' || $_GET['orden'] == '5' || $_GET['orden'] == '6' || $_GET['orden'] == '7' || $_GET['orden'] == '8' || $_GET['orden'] == '9' || $_GET['orden'] == '10')) {
        $orden = $_GET['orden'];
        $consulta = $conexion->prepare("
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
                id_curso = fk_id_curso_alu
            where id_curso = '$orden';
            ");
 } else {
    $consulta = $conexion->prepare("
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
            id_curso = fk_id_curso_alu
        ORDER BY matricula_alumno
    ");
}

if (isset($_GET['orden']) && ($_GET['orden'] === 'masculino' || $_GET['orden'] === 'femenino' || $_GET['orden'] === 'otros')) {

}
$consulta->execute();
$resultados = $consulta->fetchAll();
?>



