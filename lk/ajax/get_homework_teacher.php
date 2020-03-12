<?php
include ('../db.php');
include ('../db_pdo.php');
$db = Database::getConnection();
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
<table class="table">
    <thead>
    <tr>
        <th>Дата</th>
        <th>Задание</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $result = mysqli_query($conn, "SELECT homework.id, homework.value, homework.date
	FROM homework
        INNER JOIN teachers 
            ON homework.organisation = teachers.organisation 
                AND homework.association = teachers.association 
    WHERE teachers.user = $_COOKIE[user] ORDER BY homework.date");
    while($row=mysqli_fetch_array($result))
    {
        ?>
        <tr>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['value'];?></td>
            <td><a href="javascript:void(0);" data="<?=$row['id']?>" class="btn btn-danger"><i class="fas fa-times"></i></a></td>
        </tr>
        <?php
    }
    mysqli_close($conn);
    ?>

    </tbody>
</table>