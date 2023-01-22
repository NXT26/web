<?php
$get_id=$_GET['id'];
$dom = new DOMDocument();
$dom->load('data/data.xml');
$products = $dom->getElementsByTagName('tasks')->item(0);
$product=$products->getElementsByTagName('tasks');
$index = $product->length;

if(isset($_POST['sbm'])){
    $task = $_POST['task'];
    $date = $_POST['date'];
    $new_prd = $dom->createElement('tasks');

    $node_id = $dom->createElement('id', $get_id);
    $new_prd->appendChild($node_id);

    $node_task = $dom->createElement('task', $task);
    $new_prd->appendChild($node_task);

    $node_deadline = $dom->createElement('date', $date);
    $new_prd->appendChild($node_deadline);

    $products->replaceChild($new_prd,$product->item($get_id - 1));

    $dom->formatOutput=true;
    $dom->save('data/data.xml')or die('Error');
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