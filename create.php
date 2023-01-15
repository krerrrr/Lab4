<?php
    if (isset($_POST['submit'])) {
        $imgitem = $_POST['imgitem'];
        $name = $_POST['name'];
        $size = $_POST['size'];

        $xml = simplexml_load_file('data.xml');
        


        $lastEl = $xml->item[($xml->count())- 1];
        
        $newitem = $xml->addChild('item','');
        $newitem->addChild('name', $name);
        $newitem->addChild('size', $size);
        $newitem->addChild('img', $imgitem);
        $newitem->addAttribute('id',$lastEl['id'] + 1);

        $xml->saveXML('data.xml');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>AddVinyl</title>
</head>
<body>
    <form action="#" method="POST">

        <input type="text" name="imgitem" placeholder="URL пластинки">

        <br>
        <br>

        <input type="text" name="name" placeholder="Группа и альбом">

        <br>
        <br>

        <input type="text" name="size" placeholder="Состояние пластинки">

        <br>
        <br>

        <button type="submit" name="submit">Отправить</button>
    </form>
    <a href="index.php">Назад</a>
</body>
</html>