<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>TO DO LIST</title>
</head>
<body>

<?php
$MAX_NUMBER_TASKS = 20;
$connection = mysqli_connect('127.0.0.1',  'root', '', 'task');

if (!$connection) {
    echo 'Не удалось подключиться к БД';
    echo mysqli_connect_error();
    exit();
}

?>

<div class="title">
    <h1 class="middle"> TODO LIST </h1>

    <a href="index.php?page_layout=create">
        <img src="img/plus.png" alt="no image" width="40">
    </a>

</div>

<div class="to-do-list">

    <div class="tasks">
        <ul id="myUL">
            <li id="const">
                <a class="head">ID</a>
                <a class="head">Task</a>
                <a class="head">Date</a>
                <a class="head">Delete?</a>
            </li>


            <?php
            $i = 1;
            $sql="SELECT * FROM TASK WHERE id = '$i'" ;
            $result = mysqli_query($connection, $sql);
            $data = mysqli_fetch_assoc($result);
            while ($i <= $MAX_NUMBER_TASKS) {
                if (!$data) {
                    $i++;
                    $sql="SELECT * FROM TASK WHERE id = '$i'";
                    $result = mysqli_query($connection, $sql);
                    $data = mysqli_fetch_assoc($result);
                    continue;
                }
                ?>
                <li>
                    <?php $update_link = "index.php?page_layout=update&id=". $data["id"];
                    $delete_link = "index.php?page_layout=delete&id=". $data["id"];
                    ?>
                    <a href=<?php echo $update_link;?> > <?php echo $data["id"];?></a>
                    <a href=<?php echo $update_link;?>> <?php echo $data["task"];?></a>
                    <a href=<?php echo $update_link;?>> <?php echo $data["date"];?></a>
                    <a onclick="return Del(<?php echo $data["id"];?>)" href=<?php echo $delete_link;?> > Delete </a>
                </li>
                <?php
                $i++;
                $sql="SELECT * FROM TASK WHERE id = '$i'";
                $result = mysqli_query($connection, $sql);
                $data = mysqli_fetch_assoc($result);
            } ?>
        </ul>

    </div>
</div>





<script src="script/main.js"></script>

</body>
</html>
