<?php
include ('../db_pdo.php');
$db = Database::getConnection();
$result = $db->prepare("DELETE FROM homework WHERE id = ?");
$result->execute([$_GET['id']]);