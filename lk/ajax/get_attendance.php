<?php
include ('../db_pdo.php');
$db = Database::getConnection();
$result = $db->prepare("SELECT students.id, students.name, students.surname, students.patronymic 
FROM students 
    INNER JOIN employment 
        ON students.id = employment.student 
    INNER JOIN teachers 
        ON employment.organisation = teachers.organisation 
               AND employment.association = teachers.association 
WHERE teachers.user = ?");
$result->execute([$_COOKIE['user']]);
$students = $result->fetchAll();

$result = $db->prepare("SELECT schedule.day FROM schedule 
    INNER JOIN teachers 
        ON schedule.teacher = teachers.id 
WHERE teachers.user = ?");
$result->execute([$_COOKIE['user']]);
$weekDays = $result->fetchAll();
$weekDays_prep = [];
foreach ($weekDays as $day) {
    $weekDays_prep[] = ((int)$day['day'])+1;
}

$result = $db->prepare("SELECT quarters.start, quarters.end FROM quarters WHERE quarters.id = ?");
$result->execute([$_GET['quarter']]);
$quarterDates = $result->fetch();

$result = $db->prepare("SELECT attendance.* FROM attendance 
    INNER JOIN employment 
        ON attendance.organisation = employment.organisation 
               AND attendance.association = employment.association
    INNER JOIN teachers 
        ON attendance.organisation = teachers.organisation 
               AND attendance.association = teachers.association 
WHERE teachers.user = ? AND employment.student = attendance.student");
$result->execute([$_COOKIE['user']]);
$attendance = $result->fetchAll();

function generateDates($start, $end, $weekDays) {
    $interval = DateInterval::createFromDateString('1 day');
    $period   = new DatePeriod($start, $interval, $end);
    $dates = [];
    foreach ($period as $date) {
        if (in_array($date->format("N"), $weekDays)) {
            $dates[] = $date;
        }
    }
    return $dates;
}

function findValue($date, $user, $data) {
    foreach($data as $d) {
        if($d['student'] != $user || $d['date'] != $date ) continue;
        return $d['value'];
    }
    return false;
}

function shortName($name, $surname, $patronymic) {
   return $surname." ".mb_substr($name, 0, 1).". ".mb_substr($patronymic, 0, 1).".";
}

$dates = generateDates(new DateTime($quarterDates['start']), new DateTime($quarterDates['end']), $weekDays_prep);

$result = $db->prepare("SELECT organisations.name AS o_name, 
       associations.name AS a_name
FROM teachers  
    INNER JOIN organisations 
        ON teachers.organisation = organisations.id 
    INNER JOIN associations 
        ON teachers.association = associations.id
WHERE teachers.user = ?");
$result->execute([$_COOKIE['user']]);
$organisation = $result->fetch();
?>
<h4><?=$organisation['o_name']?> <?=$organisation['a_name']?></h4>
<table class="table table-scroll">
    <thead>
    <tr>
        <th></th>
        <?php foreach ($dates as $date): ?>
            <th><?=$date->format("d.m")?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?=shortName($student['name'], $student['surname'], $student['patronymic'])?></td>
            <?php foreach ($dates as $date): ?>
                <td
                    data-user="<?=$student['id']?>"
                    data-date="<?=$date->format("Y-m-d")?>"
                    class="editable"><?=findValue($date->format("Y-m-d"), $student['id'], $attendance)?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>




