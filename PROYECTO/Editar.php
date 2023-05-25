<?php
$NombreEmpleado=$_POST['NombreEmpleado'];
$ApellidoPa=$_POST['ApellidoPa'];
$ApellidoMa=$_POST['ApellidoMa'];
$FechaDeNac=$_POST['FechaDeNac'];
$Edad=$_POST['Edad'];
$Direccion=$_POST['Direccion'];
$Colonia=$_POST['Colonia'];
$Postal=$_POST['Postal'];
$Correo=$_POST['Correo'];
$NumeroCel=$_POST['NumeroCel'];
$Curp=$_POST['Curp'];
$Rfc=$_POST['Rfc'];
$FechaDeIng=$_POST['FechaDeIng'];
$Puesto=$_POST['Puesto'];
$Area=$_POST['Area'];
$Salario=$_POST['Salario'];



$servidor = "localhost";
$basededatos = "formulario";
$usuario = "root";
$password = "1234";
$port = "3308";

$con = mysqli_connect($servidor,$usuario,$password,$basededatos,$port) or die ("No se conecto");
$consulta = "update formulario_empleado SET ApellidoPa='$ApellidoPa',ApellidoMa='$ApellidoMa',FechaDeNac='$FechaDeNac',Edad='$Edad',Direccion='$Direccion',Colonia='$Colonia',CodigoP='$Postal',Correo='$Correo',NumeroCel='$NumeroCel',Curp='$Curp',Rfc='$Rfc',FechaDeIng='$FechaDeIng',Puesto='$Puesto',Area='$Area',Salario='$Salario' where nombre='$NombreEmpleado'";  

$registros = mysqli_query($con,$consulta) or die ("Problema en el select");

$result = mysqli_fetch_array($registros,MYSQLI_ASSOC);
mysqli_close($con);
echo json_encode($result);
?>