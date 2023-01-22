<?php
$dom = new DOMDocument();
$dom->load('data/data.xml');
$products = $dom->getElementsByTagName('tasks')->item(0);
$product=$products->getElementsByTagName('tasks');
$index = $product->length;
if ($index != 0) {
    $id=$product[$index-1]->getElementsByTagName('id')->item(0)->nodeValue+1;
} else {
    $id = 1;
}

if(isset($_POST['sbm'])){
    $task = $_POST['task'];
    $deadline = $_POST['date'];
    $new_prd = $dom->createElement('tasks');

    $node_id = $dom->createElement('id', $id);
    $new_prd->appendChild($node_id);

    $node_task = $dom->createElement('task', $task);
    $new_prd->appendChild($node_task);

    $node_deadline = $dom->createElement('date', $deadline);
    $new_prd->appendChild($node_deadline);

    $products->appendChild($new_prd);

    if (strlen($task) <= 2) {
        header('location: index.php?page_layout=create');
        exit("Enter task, which len more than 2");
    }

    $dom->formatOutput=true;
    $dom->save('data/data.xml')or die('Error');
    $error = "";
    header('location: index.php?page_layout=list');
    exit();
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

<div class="title">
    <h1 class="middle"> TODO LIST </h1>

</div>
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