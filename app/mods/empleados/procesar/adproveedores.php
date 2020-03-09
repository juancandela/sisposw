<?php
require('../../../../datos/conexion.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_proveedor = $_POST['idProv'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefonos = $_POST['telefonos'];
    $sql = "INSERT INTO proveedores(Id_Proveedor,Nombre_Prov,Direccion,Email,Telefonos)
        VALUES('$id_proveedor','$nombre','$direccion','$email','$telefonos')";

    if ($conexion->query($sql) === TRUE) {
        $respuesta['msg'] = 'Registro guardado';
        $respuesta['exito'] = true;
    } else {
        $respuesta['error'] = '' . $conexion->error;
        $respuesta['msg'] = 'Registro no guardado';
    }

    $conexion->close();
    echo json_encode($respuesta);
    die();
}
