<?php
require('../../../../datos/conexion.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_producto = $_POST['idProducto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $estado = $_POST['estado'];
    $existencias = $_POST['existencias'];
    $id_categoria = $_POST['idCategoria'];
    $proveedor = $_POST['proveedor'];
    $sqlcat = "INSERT INTO productos(Id_Producto,Nombre,Descripcion,ValorUnitario,Nombre_Cat,Proveedor,Estado,Existencias)
        VALUES('$id_producto','$nombre','$descripcion','$precio','$id_categoria','$proveedor','$estado','$existencias')";
    if ($conexion->query($sqlcat) === TRUE) {
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
