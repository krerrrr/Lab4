<?php
    $xml = simplexml_load_file('data.xml');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopik with Vinyl</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <h1>Виниловые пластинки</h1>
    <br>

    <h2>Самый популярный винил</h2>


    <!-- контейнер с книгами -->
    <!-- books = items
         book = item
         book_name = item_name
         book_author = merch -->
    <div class="items">


        <!-- одна книга -->
        <?php foreach($xml->item as $item) { ?>

        <div class="item">  

            <img src=" <?php echo $item->img ?> " alt="" class="image">

            <div class="item_name">
                <!-- подставляем название из xml -->    
                <?php echo $item->name ?>        
            </div>

            <div class="merch">
                <!-- подставляем размер из xml --> 
                <?php echo $item->size ?>
            </div>

            <br>
            <a href="update.php?id=<?php echo $item ['id'] ?>" class="link">Обновить</a>
            <br>
            <a href="delete.php?id=<?php echo $item ['id'] ?>" class="link">Удалить</a>
        </div>
        <?php } ?>
    </div>

    <a href="create.php" class="link">Добавить новый винил</a>
</body>
</html>