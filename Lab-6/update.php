<?php

$connection = mysqli_connect('127.0.0.1',  'root', '', 'task');

if (!$connection) {
    echo 'Не удалось подключиться к БД';
    echo mysqli_connect_error();
    exit();
}

$get_id=$_GET['id'];

if(isset($_POST['sbm'])){
    $task = $_POST['task'];
    $date = $_POST['date'];

    $sql="UPDATE TASK SET task='$task',date='$date' WHERE id= '$get_id'";
    mysqli_query($connection, $sql);

    header('location: index.php?page_layout=list');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Create Task</title>
</head>
<body>


<div class="to-do-list">
    <form method="post" enctype="multipart/form-data">

        <input type="text" name="task" id="task" placeholder="Введите task" required maxlength="20">

        <input type="text" name="date" id="date" placeholder="Введите date" required maxlength="20">

        <button name="sbm" class="btn-plus" type="submit">
            <img class ="tik" src="img/plus.png" alt="no image" width="40">
        </button>

    </form>
</div>

</body>
</html>