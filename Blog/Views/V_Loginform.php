<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="formStyle.css">
    <title>Loginform</title>
</head>

<body>
    <form action="../System/C_Login.php" method="post">
    	<h1>Bienvenido al blog del trio calavera</h1>
        <label for="username">Usuario:</label>
        <input type="text" id="user" name="username"><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="pass" name="password"><br><br>
        <input type="submit" value="Iniciar Sesión">
        <input type="reset" value="Borrar">
    </form>
</body>

</html>