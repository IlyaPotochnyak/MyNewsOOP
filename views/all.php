<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php foreach ($items as $item) { ?>
    <h3><a href="index.php?ctrl=News&act=One&id=<?php echo $item->id?>"> <? echo $item->title . '<br>'; ?></a></h3>
    <? echo $item->newText . '<br>'; ?>
    <? echo $item->date . '<br>';

} ?>
<br>


</body>
</html>