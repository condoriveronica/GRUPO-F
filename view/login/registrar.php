<?php
    include("head.php");
?>
<body>
<div class="registro-box">
  <br>
<div class="titulo"><label for="titulo"> Nuevo Usuario</label></div >
  <!---Formulario para enviar datos a registrar.php metodo POST-->  
  <form action="registrar.php" method="POST">
      <label for="Nombres">Nombres</label>
        <input id="n" type="text" name="nombre" placeholder="Ingrese Nombres">
        <label  for="correo">Correo</label>
        <input  id="c" type="email" name="email" placeholder="Ingrese Correo">
        <label for="Nombres">Celular</label>
        <input  id="cel" type="number" name="celular" placeholder="Ingrese Celular">
        <label for="Nombres">Contraseña</label>
        <input id="contra" type="password" name="pw" placeholder="Ingrese Contraseña">
        <input type="submit" id="registrar" name="registrar" value="Registrar">
    </form>

    <div class ="i">    <a href="#">---Registrar</a>
    <a href="iniciarSession.php">---Inciar Sesion---</a></div>
  
  </div>
  <?php
     if(isset($_POST['registrar'])){
        $nombre=$_POST['nombre'];
        $correo=$_POST['email'];
        $celular=$_POST['celular'];
        $pw=$_POST['pw'];
        addUser($nombre,$correo,$celular,$pw);
    }
  ?>

</body>

