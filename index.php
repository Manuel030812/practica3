<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <h1>PRACTICA 3</h1>
    </header>
    <div class="cuadro">
    <form action="script/insertar.php" method="post">
        <p>id del producto</p>
        <input type="text" name="idproducto" required>
        <p>nombre</p>
        <input type="text" name="nombre" required>
        <p>precio</p>
        <input type="number" name="precio" required>
        <p>existencia</p>
        <input type="number" name="existencia" required>
        <br>
        <br>
        <input type="submit" value="agregar">
      
    </form>
    </div>
   

    <!-- Mostrar productos existentes -->
    <table>
        <tr>
            <th>id producto</th>
            <th>nombre</th>
            <th>precio</th>
            <th>existencia</th>
            <th><p>eliminar</p></th>
        </tr>
        <?php
        include('script/conexion.php');
        $con = conectaDB();
        $sql = "SELECT idproducto, nombre, precio, existencia FROM producto";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['idproducto']}</td>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>{$row['precio']}</td>";
            echo "<td>{$row['existencia']}</td>";
            echo "<td><a href='script/eliminar.php?idp={$row['idproducto']}' class='eliminar'>Eliminar</a></td>";
            echo "</tr>";
        }

        mysqli_close($con);
        ?>
    </table>
</body>
</html>
