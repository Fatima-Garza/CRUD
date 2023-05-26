<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD </title>
    <link rel="stylesheet" href="administrador.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="container">
        <h1 class="text-center">LISTADO DE PROVEEDORES</h1>
    </div>
    <br>
    <div class="container">
        <?php
        $busqueda = $_REQUEST['busqueda'];
        if (empty($busqueda)) {
            header("Location: inicio.php");
            die();
        }
        ?>
        <form action="buscar_proveedores.php" method="get" class="form_search">
            <input type="text" name="busqueda" id="busqueda " placeholder="Buscar" value="<?php echo $busqueda; ?>">
            <input type="submit" value="Buscar" class="btn_search ">
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">idProveedores</th>
                    <th scope="col">NomEmpresa</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">TotalMercancia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $servername = "localhost";
                $username = "root";
                $password = "Cataluna1207";
                $dbname = "papeleria";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Error en la conexión: " . $conn->connect_error);
                }

                // Realiza la consulta para obtener los datos de la tabla deseada
                $sql = "SELECT * FROM proveedores";
                $result = $conn->query($sql);


                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td scope="row">
                            <?php echo $row['idProveedores'] ?>
                        </td>
                        <td scope="row">
                            <?php echo $row['NomEmpresa'] ?>
                        </td>
                        <td scope="row">
                            <?php echo $row['Direccion'] ?>
                        </td>
                        <td scope="row">
                            <?php echo $row['Telefono'] ?>
                        </td>
                        <td scope="row">
                            <?php echo $row['TotalMercancia'] ?>
                        </td>

                        <th><a href="Editar.php?idProveedores=<?php echo $row['idProveedores'] ?>"
                                class="btn btn-warning">Editar</a><a
                                href="Eliminar.php?idProveedores=<?php echo $row['idProveedores'] ?>"
                                class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
        <div class="container">
            <a href="Agregar.php" class="btn btn-success"> Agregar Proveedor</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>



<?php
$conn->close();
?>