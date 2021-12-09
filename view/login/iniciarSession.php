<?php
    include("head.php");
?>
<body>
<div class="login-box">

<h1>Login</h1>
    <div class="tarjeta">
        <form action="iniciarSession.php" method="POST">
          <label for="Usuario">Administrador</label>
          <input type="email" name="usuario" placeholder="Ingrese administrador" required>
          <label for="Contraseña">Password</label>
          <input type="password" name="pw" placeholder=" Ingrese password" required>
          <input type="submit" name="ingresar" value="Ingresar" class="button">
         </form>
      <div class="o">
      <a href="#">Iniciar Sesion</a>
      <a href="registrar.php">Registrarse</a><br>
      </div>
      
    </div>
    </div>
    <?php
      if(isset($_POST['ingresar'])){
        $usuario=$_POST['usuario'];
        $pw=$_POST['pw'];
        login($usuario,$pw);
      }
    ?>
</body>

