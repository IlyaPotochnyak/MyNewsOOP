

    <h3><a href="index.php?ctrl=News&act=One&id=<?php echo $items->id?>"> <? echo $items->title . '<br>'; ?></a></h3>
    <? echo $items->newText . '<br>'; ?>
    <? echo $items->date . '<br>'; ?><br>


    <form action="" method="get">
        <input type="hidden" name="act" value="One">
        <input type="hidden" name="id" value="<?php echo $items->id?>">
        <input type="submit" name="edit" value="Редактировать">
    </form>
    <?php if (isset($_GET['edit'])){
        include __DIR__ . '/edit.php';
    } ?>

    <a href="index.php">На главную</a><br>


