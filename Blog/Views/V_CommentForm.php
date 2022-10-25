<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar comentario</title>
</head>

<body>
    <form action="../System/C_InsertComment.php" method="post">
    	<input type="text" id="id" name="id" value="" readonly>
    	<input type="text" name="name" placeholder="name">
        <input type="text" name="comment" placeholder="comment">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="post_id" placeholder="post_id">
        <input type="text" id="created_at" name="created_at" value="" readonly>
        <input type="text" name="status" placeholder="status">
        <input type="submit" value="Guardar">
    </form>
</body>

</html>