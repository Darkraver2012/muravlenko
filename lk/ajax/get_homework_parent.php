<?php
include ('../db_pdo.php');
$db = Database::getConnection();

$result = $db->prepare("
		SELECT *, students.name AS s_name, organisations.name AS o_name, students.id AS s_id
		FROM students
		INNER JOIN organisations ON students.school = organisations.id
		INNER JOIN parents ON students.id = parents.student
		WHERE parents.user=?
	");
$result->execute([$_COOKIE['user']]);
$student = $result->fetch();
$student_header = "$student[surname] $student[s_name] $student[patronymic], $student[class]$student[letter] ($student[o_name])";

$result = $db->prepare("SELECT organisations.name AS o_name, 
       associations.name AS a_name, homework.value, homework.date
FROM parents 
    INNER JOIN employment 
        ON parents.student = employment.student 
    INNER JOIN homework 
        ON employment.organisation = homework.organisation 
               AND employment.association = homework.association 
    INNER JOIN organisations 
        ON employment.organisation = organisations.id 
    INNER JOIN associations 
        ON employment.association = associations.id
WHERE parents.user = ? ORDER BY homework.date");
$result->execute([$_COOKIE['user']]);
$homework = $result->fetchAll();
?>
<h3><?=$student_header?></h3>
<table class="table">
    <thead>
    <tr>
        <th>Наименование ОДО</th>
        <th>Объединение</th>
        <th>Дата</th>
        <th>Задание</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($homework as $item): ?>
        <tr>
            <td><?=$item['o_name']?></td>
            <td><?=$item['a_name']?></td>
            <td><?=$item['date']?></td>
            <td><?=$item['value']?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>