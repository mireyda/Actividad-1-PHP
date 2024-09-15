<?php
if (!empty($_POST)) {
    // Asignar variables con valores del formulario
    $txt_id = utf8_decode($_POST["text_id"]);
    $txt_codigo = utf8_decode($_POST["text_codigo"]);
    $text_nombres = utf8_decode($_POST["text_nombres"]);
    $text_apellidos = utf8_decode($_POST["text_apellidos"]);
    $text_direccion = utf8_decode($_POST["text_direccion"]);
    $text_telefono = utf8_decode($_POST["text_telefono"]);
    $text_fn = utf8_decode($_POST["text_fn"]);
    
    
    $drop_puesto = isset($_POST["drop_puesto"]) ? utf8_decode($_POST["drop_puesto"]) : 'NULL';

    $sql = "";

    if (isset($_POST["btn_agregar"])) {
        $sql = "INSERT INTO empleados(codigo, nombres, apellidos, direccion, telefono, fecha_nacimiento, id_puesto) VALUES (
            '" . $txt_codigo . "',
            '" . $text_nombres . "',
            '" . $text_apellidos . "',
            '" . $text_direccion . "',
            '" . $text_telefono . "',
            '" . $text_fn . "',
            " . ($drop_puesto !== 'NULL' ? $drop_puesto : 'NULL') . ");";
    }
    if (isset($_POST["btn_modificar"])) {
        $sql = "UPDATE empleados SET 
            codigo='" . $txt_codigo . "',
            nombres='" . $text_nombres . "',
            apellidos='" . $text_apellidos . "',
            direccion='" . $text_direccion . "',
            telefono='" . $text_telefono . "',
            fecha_nacimiento='" . $text_fn . "',
            id_puesto=" . ($drop_puesto !== 'NULL' ? $drop_puesto : 'NULL') . " 
            WHERE id_empleado=" . $txt_id . ";";
    }
    if (isset($_POST["btn_eliminar"])) {
        $sql = "DELETE FROM  empleados  
            WHERE id_empleado=" . $txt_id . ";";
    }

    // Conectar a la base de datos
    include("datos_conexion.php");
    $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass, $db_nombre);
    
    if ($db_conexion->query($sql) === TRUE) {
        $db_conexion->close();
        header("Location: /empresa_php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $db_conexion->error;
        $db_conexion->close();
    }
}
?>
