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
        <h1 class="text-center">LISTADO DE CLIENTES</h1>
    </div>
    <br>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">idCliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">idFactura</th>
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
                $sql = "SELECT * FROM cliente";
                $result = $conn->query($sql);


                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td scope="row">
                            <?php echo $row['idCliente'] ?>
                        </td>
                        <td scope="row">
                            <?php echo $row['Nombre'] ?>
                        </td>
                        <td scope="row">
                            <?php echo $row['Apellido'] ?>
                        </td>
                        <td scope="row">
                            <?php echo $row['Telefono'] ?>
                        </td>
                        <td scope="row">
                            <?php echo $row['idFactura'] ?>
                        </td>


                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>



<?php
$conn->close();
?>