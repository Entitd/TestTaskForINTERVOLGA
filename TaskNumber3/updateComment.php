<?php
require_once "db_class.php";
require_once "comment_Class.php";
require_once "main_logic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Task 3</title>
</head>
<body>
<div class="container w-80 mt-3">
    <h1>Edit Comment</h1>
    <?php
    $id_comment = $_GET["id_comment"];
    $arr = Comment::getComment($id_comment);
    foreach ($arr as $comment): ?>

        <form class="bg-body-secondary mt-2 pt-2 px-2 rounded-3" action="" method="POST">
            <textarea name="newComment" class="w-100 mb-2 p-2 border border-opacity-25 rounded-3" placeholder="Напишите сюда свой коментарий" required><?= htmlspecialchars($comment['comment']) ?></textarea>
            <div class="d-flex justify-content-between">
                <div class="">
                    <input class="rounded-2 border border-opacity-25 p-1 ps-2" type="text" name="newNickname" value="<?= htmlspecialchars($comment['nickname']) ?>" placeholder="Введите ник">
                    <p class="">если не введете ник, то будете отображены гостем!</p>
                </div>

                <input class="btn mt-4 h-50 btn-primary" type="submit" name="updateComment">
            </div>
        </form>

    <?php endforeach; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>