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
    <h1 class="text-center">Name Forum</h1>
    <?php
    $arr = Comment::showComment();
    foreach ($arr as $comment): ?>
        <div class="box bg-info bg-opacity-10 mt-2 p-3 rounded-3">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3"><?= htmlspecialchars($comment['nickname']) ?></h2>
                <div class="d-flex">
                    <a href="updateComment.php?id_comment=<?= htmlspecialchars($comment['id_comment']) ?>" class="me-2">
                        <button type="button" class="btn btn-warning">Редактировать</button>
                    </a>
                    <form action="" method="POST">
                        <button type="submit" name="deleteComment" class="btn btn-danger" value="<?= htmlspecialchars($comment['id_comment']) ?>">Удалить</button>
                    </form>
                </div>
            </div>
            <p>
                <?= htmlspecialchars($comment['comment']) ?>
            </p>
            <div class="d-flex justify-content-between">
                <span><?= htmlspecialchars($comment['date']) ?></span>
                <div class="">
                    <?php if ($comment['edited'] == 1): ?>
                        <span>изменено*</span>
                    <?php endif;?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <form class="bg-body-secondary my-2 pt-2 px-2 rounded-3" action="" method="POST">
        <textarea name="comment" class="w-100 mb-2 p-2 border border-opacity-25 rounded-3" placeholder="Напишите сюда свой коментарий" required></textarea>
        <div class="d-flex justify-content-between">
            <div class="">
                <input class="rounded-2 border border-opacity-25 p-1 ps-2" type="text" name="nickname" placeholder="Введите ник">
                <p class="">если не введете ник, то будете отображены гостем!</p>
            </div>

            <input class="btn mt-4 h-50 btn-primary" type="submit" name="addComment">
        </div>
    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>