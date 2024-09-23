<?php
// insertar.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('conexion.php');
    $con = conectaDB();

    $idproducto = $_POST['idproducto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $existencia = $_POST['existencia'];

    $sql = "INSERT INTO producto (idproducto, nombre, precio, existencia) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'ssdi', $idproducto, $nombre, $precio, $existencia); // 's' para string, 'd' para double/integer

    if (mysqli_stmt_execute($stmt)) {
        echo "Producto agregado correctamente.";
    } else {
        echo "Error al agregar el producto: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    // Redirigir al index después de insertar
    header('Location: /practica3/index.php');
    exit();
}
?>
