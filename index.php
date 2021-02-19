<?php

require "db.php";
$stmt = $pdo->query("select * from works");
$works = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой сайт</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/lightgallery.min.css">
</head>
<body>

<section class="first-screen section-bg">
    <div class="container">
        <div>
            <h1>Портфолио веб-разработчика <br> Алексея Жумаева</h1>
        </div>
        <div>
            <a onclick="smoothScroll('#about')" class="btn btn-bg" href="#">Обо мне</a>
            <a onclick="smoothScroll('#portfolio')" class="btn btn-outline" href="#">Мои работы</a>
        </div>
    </div>
</section>

<a onclick="smoothScroll('#feedback')" class="chevron" href="#">
    <img src="assets/img/chevron.png" alt="scroll">
</a>

<section>
    <div class="container">
        <h2 id="about">Обо мне</h2>

        <p>
            Я знаю, что многие клиенты, прежде чем сделать выбор, хотят увидеть реальные
            кейсы по веб-разработке, т.е. «живые» сайты. Поэтому, на этой странице я представил часть своих
            работ, выполненных в разное время, начиная с 2020 года.
        </p>
        <p>
            Глядя на них вы можете увидеть мой профессиональный рост и навыки, которыми я обладаю.
            Посмотрите и решите, соответствуют ли они Вашим ожиданиям, прежде чем вы решите оформить заказ.
        </p>
    </div>

</section>

<section>
    <div class="container">
        <h2 id="portfolio">Мои работы</h2>
        <div id="lightgallery" class="gallery">

            <?php foreach ($works as $work): ?>
                <a class="img-wrapper"
                   data-sub-html="<?= $work['name'] ?>"
                   href="<?= $work['file_path'] ?>">
                    <img src="<?= $work['file_path'] ?>"/>
                </a>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<section class="section-bg">
    <div class="container">
        <div class="d-flex">
            <div class="w-60 pr-4">
                <h2 id="feedback">Обратная связь</h2>
                <p>
                    Если Вы хотите задать вопрос, сообщить об ошибках или просто поздороваться, воспользуйтесь
                    формой обратной связи или используйте другие контакты.
                </p>
                <p>
                    Мною предусмотрены почти все доступные средства связи, поэтому Вы так же можете прислать мне
                    сообщение в Skype или через один из популярных месседжеров по телефонам указанным ниже.
                </p>
            </div>
            <div class="w-40">
                <form action="feedback.php" method="POST">
                    <input name="name" type="text" placeholder="Как к вам обращаться" required>
                    <input name="email" type="email" placeholder="Ваш email" required>
                    <textarea name="text" placeholder="Сообщение" rows="4" required></textarea>
                    <input class="btn btn-bg" type="submit" value="Отправить">
                </form>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        Copyright &copy; 2021. Все права защищены.
    </div>
</footer>

<script src="assets/js/lightgallery.min.js"></script>
<script>
    lightGallery(document.getElementById('lightgallery'));

    function smoothScroll(selector) {
        event.preventDefault();
        document.querySelector(selector).scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>
</body>
</html>