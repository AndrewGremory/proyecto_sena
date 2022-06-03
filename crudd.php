<?php
include_once 'conexionn.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// recepcion de datos por metodo post desde includes/footer

$id = (isset($_POST['id'])) ? $_POST ['id'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST ['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST ['apellido'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST ['usuario'] : '';
$pw = (isset($_POST['contraseña'])) ? $_POST ['contraseña'] : '';
$rol = (isset($_POST['rol'])) ? $_POST ['rol'] : '';
$correo = (isset($_POST['correo'])) ? $_POST ['correo'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST ['telefono'] : '';

$consulta = "INSERT INTO usuarios (nombre, apellido, usuario, pw, rol, correo, telefono) VALUES ('$nombre', '$apellido', '$usuario', '$pw', '$rol', '$correo', '$telefono') ";
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 

$consulta = "SELECT id_usuario, nombre, apellido, usuario, pw, rol, correo, telefono FROM usuarios where id='$id' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);  //enviar array final en formato json a Js

$conexion = null; 
?>