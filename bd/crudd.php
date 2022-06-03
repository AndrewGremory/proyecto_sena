<?php
include_once '../bd/conexionn.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$pw = (isset($_POST['pw'])) ? $_POST['pw'] : '';
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_usuario = (isset($_POST['id_usuario'])) ? $_POST['id_usuario'] : '';
$id_ficha = (isset($_POST['id_ficha'])) ? $_POST['id_ficha'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO usuarios (nombre, apellido, usuario, pw, rol, correo, telefono) VALUES('$nombre', '$apellido', '$usuario', '$pw', '$rol', '$correo', '$telefono') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM usuarios ORDER BY id_usuario DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', usuario='$usuario', pw='$pw', rol='$rol', correo='$correo', telefono='$telefono' WHERE id_usuario='$id_usuario' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM usuarios WHERE id_usuario='$id_usuario' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM usuarios WHERE id_usuario='$id_usuario' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT id_ficha, tipo_programa, pro_nombre, concat(usuarios.nombre,' ',usuarios.apellido) as lider, lider_ficha from fichas join programa on nombre_programa=id_programa join usuarios on id_usuario=lider_ficha";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;