<?php
       session_start();
       include("../../Funciones/funcUser.php");
       include("../../Funciones/funcProd.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleadm.css">
    <title>articulos</title>
</head>
<body>
    <h1>SISTEMA DE REGISTRO DE ARTICULOS ELECTRODOMESTICOS</h1>
    <?php
        if(isset($_SESSION['usuario'])){
            $user=$_SESSION['usuario'];

        ?>
            <span id="user"><?php echo $user?></span>
        <?php
        if(isset($_POST['cerrar'])){
            cerrarSession();
        }

        ?>     
            <form action="#" method="post" class="cerrar">
                <input type="submit" id="btcerrar" name="cerrar" value="Cerrar Session">
            </form>
        <?php
            // enviar al incio si no esta registrado
        }
        else{
            header("location:../../index.php");
        }
    ?>
</body>
</html>