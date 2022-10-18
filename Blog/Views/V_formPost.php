<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar post</title>
</head>

<body>
    <form action="C_insertPost.php" method="post">
    	<input type="text" name="title" placeholder="title">
        <input type="text" name="brief" placeholder="brief">
        <input type="text" name="content" placeholder="content">
        <input type="text" name="image" placeholder="image">
        <input type="text" name="created_at" placeholder="created_at">
        <input type="text" name="status" placeholder="status">
        <input type="text" name="user_id" placeholder="user_id">
        <input type="submit" value="Guardar">
    </form>
</body>

</html>