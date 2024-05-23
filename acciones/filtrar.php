<?php

require_once '../conexion.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    if ($stmt = $conn->prepare("SELECT * FROM tbl_alumnos WHERE nombre_alumnos LIKE ?")) {
        $param = "%" . $query . "%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result();
        exit();
    }
}