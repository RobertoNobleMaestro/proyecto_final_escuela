<?php
try {
    if (isset($_GET['orden']) && ($_GET['orden'] === 'asc' || $_GET['orden'] === 'desc')) {
        $orden = $_GET['orden'];
        $consulta = $conexion->prepare("
            SELECT  
                *
            FROM 
                tbl_profesores
            ORDER BY nombre_profe $orden, apellido_profe $orden;
            ");
    } elseif (isset($_GET['orden']) && ($_GET['orden'] === 'Masculino' || $_GET['orden'] === 'Femenino' || $_GET['orden'] == 'Otro')) {
        $orden = $_GET['orden'];
        $consulta_Prof = $conexion->prepare("
            SELECT COUNT(sexo_profe)
            FROM tbl_profesores
            WHERE sexo_profe = '$orden';
        ");
        $consulta = $conexion->prepare("
            SELECT  
                *
            FROM 
                tbl_profesores 
            where sexo_profe = '$orden';
        "); 
    } elseif (isset($_GET['orden']) && ($_GET['orden'] == '1' || $_GET['orden'] == '2' || $_GET['orden'] == '3' || $_GET['orden'] == '4' || $_GET['orden'] == '5' || $_GET['orden'] == '6' || $_GET['orden'] == '7' || $_GET['orden'] == '8' || $_GET['orden'] == '9' || $_GET['orden'] == '10')) {
            $orden = $_GET['orden'];
            $consulta_Prof = $conexion->prepare("
                SELECT COUNT(id_profe)
                FROM tbl_profesores
                INNER JOIN 
                tbl_asignaturas_profesores 
                ON 
                tbl_profesores.id_profe = tbl_asignaturas_profesores.fk_id_profe
                INNER JOIN 
                tbl_asignaturas 
                ON 
                tbl_asignaturas_profesores.fk_id_asigna = tbl_asignaturas.id_asigna
                INNER JOIN 
                tbl_cursos 
                ON 
                   tbl_asignaturas.fk_id_curso = tbl_cursos.id_curso
                where id_curso = '$orden';
            ");
            $consulta = $conexion->prepare("
            SELECT * 
            FROM tbl_profesores 
            INNER JOIN 
            tbl_asignaturas_profesores 
            ON 
            tbl_profesores.id_profe = tbl_asignaturas_profesores.fk_id_profe
            INNER JOIN 
            tbl_asignaturas 
            ON 
            tbl_asignaturas_profesores.fk_id_asigna = tbl_asignaturas.id_asigna
            INNER JOIN 
            tbl_cursos 
            ON 
            tbl_asignaturas.fk_id_curso = tbl_cursos.id_curso
            where id_curso = '$orden';
            ");
     } else {
        $consulta = $conexion->prepare("
            SELECT  
                *
            FROM 
                tbl_profesores;
        ");
    }
    if (isset($_GET['query'])) {
        $buscar = $_GET['query'];
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
            WHERE nombre_alumno LIKE :buscar
            OR apellido_alumno LIKE :buscar
            OR email_alumno LIKE :buscar
            OR telefono_alumno LIKE :buscar
            OR DNI_alumno LIKE :buscar
            OR direccion_alumno LIKE :buscar
            OR nombre_curso LIKE :buscar
        ");
        $searchTerm = "%" . $buscar . "%";
        $consulta->bindParam(':buscar', $searchTerm, PDO::PARAM_STR);
    }
    $consulta_Prof->execute();
    $total_Prof = $consulta_Prof->fetchAll();
    $consulta->execute();
    $resultados = $consulta->fetchAll();    
} catch (PDOException $e){
    echo "error es:".$e->getMessage();
}
