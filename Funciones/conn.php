<?php
    try {
        $pdo=new PDO("mysql:host=localhost;dbname=SistemaRegistro","root","");
        //echo "conexion exitosa";
    } catch (exeption $ex) {
        die("Error al concetar la base de datos").$ex->getMessage();
    }
?>