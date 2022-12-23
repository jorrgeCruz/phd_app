<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Lista de Lenguajes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/list.css">
</head>
<body>
    <div class="header">
        <h3>Unisur - Doctorado en Sistemas Computacionales</h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h1>Lista de Lenguajes de Programacion</h1>
        <h2>Has accedido como <?php echo $str = strtoupper($username) ?></h2>
    </div>
    <div class="table-product">
        <table  >
            <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID:Lenguaje</th>
                <th scope="col">Nombre:Lenguaje</th>
                <th scope="col">No Veces <br> registrado </th>
                <th scope="col">Fecha:Registro</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
            <tbody id="datos">
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['proname'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                        <td class="timeregis"><?php echo $row['time'] ?></td>
                        <td class="modify"><a name="edit" id="" class="bfix" href="fix.php?id=<?php echo $row['id'] ?>&message=<?php echo $row['proname'] ?>&amount=<?php echo $row['amount']; ?> " role="button">
                                Editar
                            </a></td>
                        <td class="delete"><a name="id" id="" class="bdelete" href="main/delete.php?id=<?php echo $row['id'] ?>" role="button">
                                Eliminar
                            </a></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <div class="bottom-button">
            <a name="" id="" class="Addlist"  href="addlist.php" role="button">Agregar Producto</a>
            <!-- <button class="Addlist" id="graficar">Graficar</button> -->
            <a class="Addlist" id="graficar" role="button">Graficar</a>
        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
    
        <div class="chart">
            <canvas id="circlechart" width="640" height="480"></canvas>
        </div>
</body>
<script src="index.js" type="module"></script>
</html>