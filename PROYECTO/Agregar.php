<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Proveedor</title>
    <link rel="stylesheet" href="Agregar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Agregar proveedor</h1>

    <div class="container">
        <br>
        <form action="./Agregar.php" method="post">

            <?php
            $host = "localhost";
            $user = "root";
            $password = "Cataluna1207";
            $datebase = "papeleria";
            $conn = new mysqli($host, $user, $password, $datebase);

            // Verificar si hay errores de conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }
            if (isset($_POST['idProveedores']) && isset($_POST['NomEmpresa']) && isset($_POST['Direccion']) && isset($_POST['Telefono']) && isset($_POST['TotalMercancia'])) {
                $idProveedores = $_POST['idProveedores'];
                $NomEmpresa = $_POST['NomEmpresa'];
                $Direccion = $_POST['Direccion'];
                $Telefono = $_POST['Telefono'];
                $TotalMercancia = $_POST['TotalMercancia'];
                $sql = "INSERT INTO proveedores VALUES ('$idProveedores', '$NomEmpresa', '$Direccion','$Telefono', '$TotalMercancia');";
                $result = $conn->query($sql);
                header("Location: ./inicio.php");
                die();
            }
            ?>
            <div class="mb-3">
                <label class="form-label">idProveedores</label>
                <input type="text" name="idProveedores" class="form-control">

            </div>
            <div class="mb-3">
                <label class="form-label">NomEmpresa</label>
                <input type="text" name="NomEmpresa" class="form-control">

            </div>
            <div class="mb-3">
                <label class="form-label">Direccion</label>
                <input type="text" name="Direccion" class="form-control">

            </div>
            <div class="mb-3">
                <label class="form-label">Telefono</label>
                <input type="text" name="Telefono" class="form-control">

            </div>
            <div class="mb-3">
                <label class="form-label">TotalMercancia</label>
                <input type="text" name="TotalMercancia" class="form-control">

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger">Enviar</button>
                <a href="./inicio.php" class="btn btn-dark">Regresar</a>

            </div>


        </form>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>