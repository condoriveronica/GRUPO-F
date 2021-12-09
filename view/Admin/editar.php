<?php
    include("../header.php");
    include("nav.php");
    $cat=verCat();
    $verProd=mostrarProd();
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        foreach ($verProd as $key) {
            if($key['idProducto']==$id){
                        ?>
                            <body>
                                <div>
                                    <form action="#" method="post" enctype="multipart/form-data">                                        <input type="text" name="Descripcion" value="<?php  echo $key['Descripcion']?>">

                                        <input type="number" name="Precio" value="<?php  echo $key['Precio']?>">
                                        <input type="number" name="Cantidad" value="<?php  echo $key['Cantidad']?>">
                                        <input type="text" name="Marca" value="<?php  echo $key['Marca']?>">
                                        <input type="file" name="img" value="<?php  echo $key['imagen']?>">
                                        <input type="submit" name="editarPro" value="Agregar">
                                    </form>

                                    <?php
                                        if(isset($_POST['editarPro'])){
                                            $idPro=$key['idProducto'];
                                            $DescripcionED=$_POST['Descripcion'];
                                            $PrecioED=$_POST['Precio'];
                                            $CantidadED=$_POST['Cantidad'];
                                            $MarcaED=$_POST['Marca'];
                                            $imgED=$_FILES['img']['name'];
                                            $imgTED=$_FILES['img']['tmp_name'];                                          
                                            editProd($idPro,$DescripcionED,$PrecioED,$CantidadED,$MarcaED,$imgED,$imgTED);

                                           

                                        }
                                    ?>
                            </div>
                        </body>
                <?php
            }
        }
                                                                                                                                                    

    }
?>
