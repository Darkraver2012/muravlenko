<?php include("includes/check_auth.php"); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/events.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Е-Занятость | Панель администратора</title>
</head>
<body>
<script src="js/get_attendance_parent.js"></script>
<script src="js/show_sidebar.js"></script>
<?php include("includes/sidebar.php"); ?>
<div class="wrapper">
    <?php include("includes/navbar.php"); ?>
    <main>
        <section class="section-padding-both">
            <div class="container">
                <h1>Посещаемость</h1>
                <div class="form-group">
                    Четверть:
                    <select class="form-control" name="quarter_select">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM quarters");
                        while($row=mysqli_fetch_array($result))
                        {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="table-wrapper">

                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>