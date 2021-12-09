<?php
    include("../header.php");
    if(isset($_GET['id'])){
        $id=$_GET['id'];

        eliminar($id);
        header("location:admProductos");
        
    }else{
        echo "no existe Id";
    }
?>