<?php
    include("../header.php");
    include("nav.php");
?>
<body>
    <div>
        <p>CATEGORIA</p>
        <form action="#" method="post" class="form1">
            <input type="text" name="categoria">
            <input type="submit" name="enviar" value="Agregar">
        </form>
        <?php
            if(isset($_POST['enviar'])){
                $categoria=$_POST['categoria'];

                addcatg($categoria);
            }
              
            //Asignacion de la funcion para mostrar categorias<b>
            $cat=verCat();
        ?>
    </div>
    
    <div>
        <p>PRODUCTOS</p>
        <form action="#" method="post" enctype="multipart/form-data">
            <select name="categoria">
                <?php 
                     foreach($cat as $key){
                        ?>
                            <option value="<?php echo $key['Descripcion']?>"><?php echo $key['Descripcion']?></option>
                        <?php
                    }
                ?>
            </select>
            <input type="text" name="Descripcion" placeholder="Descripcion">
            <input type="number" name="Precio" placeholder="Precio">
            <input type="number" name="Cantidad" placeholder="Cantidad">
            <input type="text" name="Marca" placeholder="Marca">
            <input type="file" name="img">
            <input type="submit" name="agregarProd" value="Agregar">
        </form>
        <?php
            
            if(isset($_POST['agregarProd'])){
                $Categoria=$_POST['categoria'];
                $Descripcion=$_POST['Descripcion'];
                $Precio=$_POST['Precio'];
                $Cantidad=$_POST['Cantidad'];
                $Marca=$_POST['Marca'];
                $img=$_FILES['img']['name'];
                $imgT=$_FILES['img']['tmp_name'];

                addProd($Descripcion,$Precio,$Cantidad,$Marca,$img,$imgT,$Categoria);
                
            }            
        ?>
    </div>
   
    <div>
        <p>MIS ARTICULOS</p>
        <?php
            $productos=mostrarProd();
            ?>
                <table>
                        <tr class="titulo">
                            <td>ID</td>
                            <td>Descripcion</td>
                            <td>Categoria</td>
                            <td>Precio</td>
                            <td>Cantidad</td>
                            <td>Marca</td>
                            <td>imagen</td>
                            <td>Acciones</td>
                        </tr>
                        <?php
                            foreach ($productos as $key) {
                                ?>
                                    <tr>
                                        <td><?php echo $key['idProducto']?></td>
                                        <td><?php echo $key['Descripcion']?></td>
                                        <td><?php echo $key['id_Categoria']?></td>
                                        <td><?php echo $key['Precio']?></td>
                                        <td><?php echo $key['Cantidad']?></td>
                                        <td><?php echo $key['Marca']?></td>
                                        <td class="imagen"><img src="../../img/<?php echo $key['imagen']?>"></td>
                                        <td><a href="eliminar.php?id=<?php echo $key['idProducto']?>">Eliminar</a> / <a href="editar.php?id=<?php echo $key['idProducto']?>">Editar</a> </td>
                                    </tr>
                                <?php
                            }
                        ?>
                </table>
            <?php
        ?>
    </div>
</body>
</html>