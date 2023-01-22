<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>TO DO LIST</title>
</head>
<body>

<?php
$dom = new DOMDocument();
$dom->load('data/data.xml');
$tasks = $dom->getElementsByTagName('tasks')->item(0);
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
            </li>


            <?php
            $i = 1;
            $tasks=$tasks->getElementsByTagName('tasks');
            foreach ($tasks as $tmp){
                ?>
                <li onclick="tik_visible('<?php echo $i - 1 ?>')">
                    <a href="index.php?page_layout=delete&id=<?php echo  $tasks->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" class="tik_check">delete</a>
                    <a class="id_hidden" href="index.php?page_layout=update&id=<?php echo  $tasks->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> <?php echo $tmp->getElementsByTagName('id')->item(0)->nodeValue?></a>
                    <a href="index.php?page_layout=update&id=<?php echo  $tasks->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> <?php echo $tmp->getElementsByTagName('task')->item(0)->nodeValue?></a>
                    <a href="index.php?page_layout=update&id=<?php echo  $tasks->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> <?php echo $tmp->getElementsByTagName('date')->item(0)->nodeValue?></a>
                </li>
                <?php
                $i++;
            } ?>
        </ul>

    </div>
</div>





<script src="script/main.js"></script>

</body>
</html>
