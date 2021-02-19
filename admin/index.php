<?php
require "../db.php";

$stmt = $pdo->query('select * from messages');
$messages = $stmt->fetchAll();

$stmt = $pdo->query('select * from works');
$works = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            padding: 10px;
        }
        .admin-img-wrapper {
            margin-bottom: 30px;
        }
        .admin-img-wrapper .img-wrapper {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Сообщения</h2>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Текст</th>
            <th>Дата и время</th>
        </tr>
        <?php foreach ($messages as $key => $message): ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= htmlspecialchars($message['name']) ?></td>
                <td><?= htmlspecialchars($message['email']) ?></td>
                <td><?= htmlspecialchars($message['text']) ?></td>
                <td><?= $message['create_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2 id="portfolio">Галерея</h2>

    <a href="add.php">Добавить</a>

    <div id="lightgallery" class="gallery">
        <?php foreach ($works as $work) : ?>
            <div class="admin-img-wrapper">
                <a class="img-wrapper"
                   data-sub-html="<?= $work['name'] ?>"
                   href="../<?= $work['file_path'] ?>">
                    <img src="../<?= $work['file_path'] ?>" />
                </a>
                <a href="remove.php?id=<?= $work['id'] ?>">Удалить</a>
            </div>
        <?php endforeach; ?>
    </div>

</div>

</body>
</html>