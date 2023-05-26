<?php
include("inicio.php");
$idProveedores = $_GET["idProveedores"];


$host = "localhost";
$user = "root";
$password = "Cataluna1207";
$datebase = "papeleria";
$conn = new mysqli($host, $user, $password, $datebase);

$query = "DELETE  from proveedores where idProveedores = '$idProveedores'";
$registros = mysqli_query($conn, $query) or die("problemas en la consulta");
header("Location: inicio.php");
die();


?>