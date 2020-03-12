<?php
include ('../db_pdo.php');
$db = Database::getConnection();

$result = $db->prepare("SELECT teachers.organisation, teachers.association FROM teachers
WHERE teachers.user = ?");
$result->execute([$_COOKIE['user']]);
$subject = $result->fetch();

if (empty(trim($_POST['add_homework_text'])) || empty($_POST['add_homework_date'])) {
    echo "Заполните все поля!";
} else {
    $result = $db->prepare("INSERT INTO homework (organisation, association, date, value) VALUES (?, ?, ?, ?)");
    echo $result->execute([$subject['organisation'], $subject['association'], $_POST['add_homework_date'], $_POST['add_homework_text']]);
}