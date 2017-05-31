



<form action="" method="get">
    <input type="hidden" name="act" value="Edit">
    <input type="hidden" name="id" value="<? echo $items->id; ?>">
    Заголовок<input type="text" name="title" value="<? echo $items->title; ?>"><br>
    Текст<textarea type="text" name="newText" rows="10" cols="45" value=""><? echo $items->newText; ?></textarea><br>

    <input type="submit" value="Редактировать">
</form>