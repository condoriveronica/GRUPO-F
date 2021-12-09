<?php
    include("conn.php");

    $pdo;

    //agregar categorias
    function addcatg($categoria){
        global $pdo;
       try {
        $sql="INSERT INTO categoria(Descripcion) VALUES(?)";
        $agregar=$pdo->prepare("$sql");
        $agregar->execute([$categoria]);
        echo "Se agrego correctamente";
       } catch (Exception $ex) {
          die("Error al agregar").$ex->getMessage();
       }

    }

    //ver categorias
    function verCat(){
        global $pdo;
        $categoria=[];
        $sql="SELECT*FROM categoria";   
        $resultado=$pdo->query($sql);
        $resultado->setFetchMode(PDO::FETCH_ASSOC);

        while ($row=$resultado->fetch()) {
            array_push($categoria,$row);
            
        }
      return($categoria);
      
    }

    //Obtener id
    //agregar producto
    function addProd($Descripcion,$Precio,$Cantidad,$Marca,$img,$imgT,$categoria){
        global $pdo;

        $idCategoria="3";
        $sql="INSERT INTO productos(id_Categoria,Descripcion,Precio,Cantidad,Marca,imagen) VALUES(?,?,?,?,?,?)";
        $agregar=$pdo->prepare($sql);
        $agregar->execute([$idCategoria,$Descripcion,$Precio,$Cantidad,$Marca,$img]);
        
        $ruta="../../img/";
        $subido=$ruta.basename($img);

        if(move_uploaded_file($imgT,$subido)){
          echo "Se registro su imagen";
        }else{
             echo "Error al registrar";
        }
    }

    //Mostrar producto

    function mostrarProd(){
        global $pdo;
        $arrProd=[];
        $sql="SELECT*FROM productos";   
        $resultado=$pdo->query($sql);
        $resultado->setFetchMode(PDO::FETCH_ASSOC);

        while ($row=$resultado->fetch()) {
            array_push($arrProd,$row);
        }
        return $arrProd;             
         
    }

    //eliminar producto
    function eliminar($id){
        global $pdo;
        try {
            $sql="DELETE FROM productos WHERE idProducto=?";
            $resultado=$pdo->prepare($sql);
            $resultado->execute([$id]);
           
        } catch (Exception $ex) {
            die("ERROR").$ex->getMessage();
        }
    }

    //Editar producto
    function editProd($idPro,$DescripcionED,$PrecioED,$CantidadED,$MarcaED,$imgED,$imgTED){
        global $pdo;
       
        try {
            // UPDATE productos SET Descripcion='usb',Precio='23',Cantidad='4',Marca='hp',imagen='df.txt' WHERE idProducto='32'
            $sql="UPDATE productos SET Descripcion=?,Precio=?,Cantidad=?,Marca=?,imagen=? WHERE idProducto=?";
            $update=$pdo->prepare($sql);
            $update->execute([$DescripcionED,$PrecioED,$CantidadED,$MarcaED,$imgED,$idPro]);
            
            $ruta="../../img/";
            $subido=$ruta.basename($imgED);

            if(move_uploaded_file($imgTED,$subido)){
            echo "Se actualizo su producto";
            }else{
                echo "Error al registrar";
            }
        } catch (Exception $ex) {
            die("Error al actualizar").$ex->getMessage();
        }
    }
    
    
    


 
?>