<?php
    $id = 0;
    $name = '';
    $size = '';
    $imgitem = '';

    $xml = simplexml_load_file('data.xml') or die("Error: Cannot create object");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

        foreach($xml->item as $item){
            if ($item['id'] == $id){
                $name=$item->name;
                $size=$item->size;
                $node = $item;
                break;
            }
        }

    }else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        foreach($xml->item as $item){
            if ($item['id'] == $id){
                $item->name=$_POST['name'];
                $item->size=$_POST['size'];
                break;
            }
        }
        $xml->saveXML('data.xml');
        echo '<script>
        alert("Винил успешно обновлен");
        location.href="index.php";
        </script>';


    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>UpdateVinyl</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="name" value="<?php echo $name?>">

        <br>
        <br>

        <input type="text" name="size" value="<?php echo $size?>">
        <input type="hidden" name="id" value="<?php $id ?>">

        <br>
        <br>

        <button type="submit" name="submit">Обновить</button>
    </form>
</body>
</html>