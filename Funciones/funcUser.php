<?php
    include("conn.php");
    // obtener id del usuario logueado
    function usLog(){
        global $pdo;
        $usLog=$_SESSION['usuario'];
        $query="SELECT*FROM user WHERE correo=?";
        $resultado=$pdo->prepare($query);
        $resultado->execute([$usLog]);
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        while ($row=$resultado->fetch()) {
            return $row['idUser'];
        }

    }
    

    //registrar usuario
    $pdo;

    function addUser($nombres,$correo,$celular,$pw){
        global $pdo;
        try {
            $add=$pdo->prepare("INSERT INTO usuario(Nombres,Correo,Celular,PW) VALUES(?,?,?,?)");
            $add->execute([$nombres,$correo,$celular,$pw]);  
            echo "REGISTRO EXITOSO";
        } catch (Exception $ex) {
            die("Error").$ex->getMessage();
        }
              
    }

    function login($user,$pw){
        global $pdo;

        $query="SELECT*FROM usuario WHERE Correo=? AND PW=?";
        $resultado=$pdo->prepare($query);
        $resultado->execute([$user,$pw]);
        $resultado->setFetchMode(PDO::FETCH_ASSOC);

        while ($row=$resultado->fetch()) {
            $usuario=$row['Correo'];
            $contra=$row['PW'];
            $id=$row['idUser'];
        }

        if(isset($usuario)&&($contra)){
            $_SESSION['usuario']=$usuario;                                                                                                                                                                                                      

            if($_SESSION['usuario']=="admin@gmail.com"){
                header("location:../Admin/index.php");
                
            }else{
                echo "el usuario ingresado no es un ADMINISTRADOR";
            }
            // header("location:../../index.php");            
        }else{
            echo "EL USUARIO NO EXISTE";
        }       
    }

    //CERRAR SESSION
    function cerrarSession(){
        session_unset();
        session_destroy();        
    }
    
    // MOSTRAR MIS PRODUCTOS
    function showIMG(){
        global $pdo;
        $id=usLog();

        $arrData=[];

        $query="SELECT*FROM producto WHERE idUser=?";
        $resultado=$pdo->prepare($query);
        $resultado->execute([$id]);
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        
        while ($row=$resultado->fetch()) {
            array_push($arrData,$row);
        }
        return $arrData;

    }
?>