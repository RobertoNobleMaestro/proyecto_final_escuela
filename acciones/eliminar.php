<?php
if (isset($_GET['id'])) {
    require_once '../conexion.php';
    try {
        $ID = $_GET['id'];
        $consulta = "DELETE FROM escuela WHERE ID = :ID";  
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':ID', $ID);
        $stmt->execute();
        header('location:../leer.php');
        exit();    
    } catch (PDOException $e) {
        echo $e;
        header('location:../leer.php');
    }
} else {
    echo "Error: ID no proporcionado.";
    header('location:../leer.php');
}
?>
