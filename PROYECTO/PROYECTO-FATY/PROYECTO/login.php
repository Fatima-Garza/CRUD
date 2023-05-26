<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <section class="form-login">
        <h1>Iniciar Sesion</h1>
        <form method ="POST" action = "login.php"> 
            <input class="controls"  type="text"  name="Usuario" value="" placeholder="Usuario">
            <input class="controls" type="password"  name="Contraseña" value="" placeholder="Contraseña">
            <input class="buttons" type="submit" name="" value="Ingresar">
        </form>
    </section>
     
    <?php
    
    
    $host="localhost";
    $user="root";
    $password ="Cataluna1207";
    $datebase="papeleria";
    $conn = new mysqli($host, $user, $password, $datebase);
    
    // Verificar si hay errores de conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    if (isset($_POST["Usuario"])&& isset( $_POST["Contraseña"])){
        $username = $_POST["Usuario"];
        $contra = $_POST["Contraseña"];
        // Consultar la base de datos para validar al usuario
     $sql = "SELECT * FROM usuarios WHERE Correo='$username' AND Clave='$contra'";
        $result = $conn->query($sql);
     $row = mysqli_fetch_assoc($result);
        echo "Columna1: " . $row["Correo"] . "<br>";
        echo "Columna2: " . $row["Clave"] . "<br>";
        echo "Columna2: " . $row["Tipo"] . "<br>";
        // Imprime más columnas según sea necesario
    
    //Verificar si se encontró un usuario válido
    if ($result->num_rows == 1 && $row["Tipo"] == 1) {
        // Usuario válido, redirigir a la página de inicio
        header("Location: inicio.php");
    } else if($result->num_rows == 1 && $row["Tipo"] == 2) {
        header("Location: cliente.php");
        } else{
            // Usuario inválido, mostrar mensaje de error
        echo "Nombre de usuario o contraseña incorrectos";
        }
        
 } 
    
    // Obtener los valores del formulario de login
   
    
   
    
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
    
    
</body>
</html>