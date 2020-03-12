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
<script src="js/add_homework.js"></script>
<script src="js/show_sidebar.js"></script>
<?php include("includes/sidebar.php"); ?>
<div class="wrapper">
    <?php include("includes/navbar.php"); ?>
    <main>
        <section class="section-padding-both">
            <div class="container">
                <h1>Добавить домашнее задание</h1>

                <div class="alert alert-success">
                    Задание успешно добавлено!
                </div>
                <div class="alert alert-danger">
                </div>
                <form method="post" name="add_homework_form">
                    <div class="form-group">
                        <label>Дата</label>
                        <input type="date" name="add_homework_date" class="form-control form-control-block">
                    </div>
                    <div class="form-group">
                        <label>Задание</label>
                        <textarea name="add_homework_text" class="form-control form-control-block"></textarea>
                    </div>
                    <input type="button" name="add_homework_submit" value="Добавить задание" class="btn btn-success">
                </form>
            </div>
        </section>
    </main>
</div>
</body>
</html>