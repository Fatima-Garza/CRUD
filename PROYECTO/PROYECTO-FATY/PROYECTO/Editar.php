<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Editar.css">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    $host = "localhost";
    $user = "root";
    $password = "Cataluna1207";
    $datebase = "papeleria";
    $conn = new mysqli($host, $user, $password, $datebase);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $idProveedores = $_POST["idProveedores"];
        $NomEmpresa = $_POST["NomEmpresa"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $TotalMercancia = $_POST["TotalMercancia"];

        $sql = "UPDATE proveedores SET NomEmpresa = '$NomEmpresa', Direccion = '$Direccion', Telefono = '$Telefono', TotalMercancia = '$TotalMercancia' WHERE idProveedores = $idProveedores";
        if ($conn->query($sql) === TRUE) {
            echo "Registro actualizado exitosamente";
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
        header("Location: inicio.php");
        die();

    }


    // Verificar si hay errores de conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }


    $idProveedores = $_GET["idProveedores"];
    $sql = "SELECT * from proveedores where idProveedores = $idProveedores";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    ?>
    <h1 class="text-center">Editar Informacion</h1>
    <br>
    <form class="container" method="POST">


        <div class="mb-3">
            <label class="form-label">idProveedores</label>
            <input type="text" class="form-control" name="idProveedores" value="<?php echo $row['idProveedores']; ?>">

        </div>
        <div class="mb-3">
            <label class="form-label">NomEmpresa</label>
            <input type="text" class="form-control" name="NomEmpresa" value="<?php echo $row['NomEmpresa']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Direccion</label>
            <input type="text" class="form-control" name="Direccion" value="<?php echo $row['Direccion']; ?>">

        </div>
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="text" class="form-control" name="Telefono" value="<?php echo $row['Telefono']; ?>">

        </div>
        <div class="mb-3">
            <label class="form-label">TotalMercancia</label>
            <input type="text" class="form-control" name="TotalMercancia" value="<?php echo $row['TotalMercancia']; ?>">

        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>