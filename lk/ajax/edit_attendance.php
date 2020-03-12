<?php
include ('../db_pdo.php');
$db = Database::getConnection();

$result = $db->prepare("SELECT teachers.organisation, teachers.association FROM teachers
WHERE teachers.user = ?");
$result->execute([$_COOKIE['user']]);
$subject = $result->fetch();

if (preg_match('/^[ПОУН]+$/', $_GET['value'])) {
    $result = $db->prepare("INSERT INTO attendance (student, organisation, association, date, value) VALUES (?, ?, ?, ?, ?)");
    $result->execute([$_GET['user'], $subject['organisation'], $subject['association'], $_GET['date'], $_GET['value']]);
} elseif ($_GET['value']==="") {
    $result = $db->prepare("DELETE FROM attendance 
WHERE student=? AND organisation=? AND association=? AND date=?");
    $result->execute([$_GET['user'], $subject['organisation'], $subject['association'], $_GET['date']]);
}