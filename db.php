<?php
$pdo = new PDO(
    'mysql:host=mysql-169214.srv.hoster.ru; dbname=website;charset=utf8',
    'srv169214_admin',
    'admin', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);