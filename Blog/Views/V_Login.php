<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginform</title>
</head>

<body>
    <form action="login.php" method="post">
        <h1>Bienvenido al blog del trio calavera</h1>
        <label for="username">Usuario:</label>
        <input type="text" id="user" name="user"><br><br>
        <label for="password">Contraseña:</label>
        <input type="text" id="pass" name="pass"><br><br>
        <input type="submit" value="Entrar">
        <input type="reset" value="Borrar">
    </form>
</body>

</html>