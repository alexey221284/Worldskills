<?php

require_once "../db.php";

if(!empty($_POST['name']))
{
    $apppath = dirname(dirname(__FILE__));
    $filepath = 'uploads/' . time() . basename($_FILES['file'][name]);
    $uploadfile = $apppath . '/' . $filepath;

    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

    $stmt = $pdo->prepare('insert into works(name, file_path) values(?,?)');
    $stmt->execute([
        $POST['name'],
        $filepath
    ]);

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление работы в портфолио</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/lightgallery.min.css">
</head>
<body>

<form action="add.php" method="post" enctype="multipart/form-data">
    <input type="text" required placeholder="Название" name="name">
    <input type="file" required name="file">
    <input type="submit" value="Создать">
</form>

</body>
</html>