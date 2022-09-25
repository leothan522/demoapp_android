<?php
require('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable("../laravel/");
$dotenv->load();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p><small><pre>(FCM TOKEN = <?php echo $_ENV['FCM_TOKEN_TEST']; ?>)</pre></small></p>
<p>Registrar Usuario
    <form action="register.php" method="post">
        <input type="text" name="name" placeholder="Nombre">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="telefono" placeholder="telefono">
        <input type="text" name="password" placeholder="Password">
        <input type="hidden" name="fcm_token" value="<?php echo $_ENV['FCM_TOKEN_TEST']; ?>">
        <input type="submit" value="enviar">
    </form>
</p>
<p>Login ...
    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="Password">
        <input type="hidden" name="fcm_token" value="<?php echo $_ENV['FCM_TOKEN_TEST']; ?>">
		<input type="submit" value="enviar">
    </form>
</p>
<p>Recuperar
    <form action="recuperar.php" method="post">
		<input type="text" name="email" placeholder="Email">
        <input type="submit" value="enviar">
    </form>
</p>
<p>Actualizar Usuario
    <form action="update.php" method="post">
        <input type="text" name="name" placeholder="Nombre">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="telefono" placeholder="Telefono">
        <input type="text" name="password" placeholder="Password Actual">
        <input type="text" name="nuevo_password" placeholder="Nuevo Password">
        <input type="text" name="id" placeholder="ID Users">
        <input type="hidden" name="fcm_token" value="<?php echo $_ENV['FCM_TOKEN_TEST']; ?>">
        <input type="submit" value="enviar">
    </form>
</p>
<p>Listar Usuarios
<form action="listar.php" method="post">
    <input type="submit" value="enviar">
</form>
</p>
</body>
</html>