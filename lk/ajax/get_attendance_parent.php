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

$result = $db->prepare("SELECT organisations.id AS o_id,
       associations.id AS a_id,
       organisations.name AS o_name, 
       associations.name AS a_name
FROM parents 
    INNER JOIN employment 
        ON parents.student = employment.student 
    INNER JOIN organisations 
        ON employment.organisation = organisations.id 
    INNER JOIN associations 
        ON employment.association = associations.id
WHERE parents.user = ?");
$result->execute([$_COOKIE['user']]);
$organisations = $result->fetchAll();

$result = $db->prepare("SELECT * FROM attendance 
    INNER JOIN parents
        ON attendance.student = parents.student
WHERE parents.user = ?");
$result->execute([$_COOKIE['user']]);
$attendance = $result->fetchAll();
print("<pre>".print_r($attendance,true)."</pre>");
?>
<h3><?=$student_header?></h3>
<?php foreach ($organisations as $organisation): ?>
    <h4><?=$organisation['o_name']?> <?=$organisation['a_name']?></h4>
    <table class="table table-scroll">
        <thead>
        <tr>

        </tr>
        </thead>
        <tbody>
            <?php foreach ($attendance as $item): ?>

            <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>