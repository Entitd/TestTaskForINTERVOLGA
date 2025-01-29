<?php
require_once 'db_class.php';
require_once 'comment_Class.php';

#Обработка добавления комментария
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addComment'])) {
    if (isset($_POST['nickname']) && isset($_POST['comment'])) {
        $nickname = filter_var($_POST['nickname'], FILTER_SANITIZE_STRING);
        if ($nickname == "" || $nickname == NULL) { #Проверка  назаполненость поля nickname, если пусто, то записывается "Гость"
            $nickname = "Гость";
        }
        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
        Comment::addComment($nickname,$comment);
        header('Location: layoutForum.php');
    }
}
#Обработка удаления комментария
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteComment'])) {
    $deleteComment = filter_var($_POST['deleteComment'], FILTER_SANITIZE_STRING);
    Comment::deleteComment($deleteComment);
    header('Location: layoutForum.php');
}
#Обработка редактирования комментария
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateComment'])) {
    $id_comment = filter_var($_GET['id_comment'], FILTER_SANITIZE_STRING);
    $arr = Comment::getComment($id_comment);
    foreach ($arr as $comment) {                                                   #берутся старые nackname и cocmment
        $nickname = filter_var($comment['nickname'], FILTER_SANITIZE_STRING);
        $comment = filter_var($comment['comment'], FILTER_SANITIZE_STRING);
    }
    $newNickname = filter_var($_POST['newNickname'], FILTER_SANITIZE_STRING); #берутся новые nackname и cocmment
    $newComment = filter_var($_POST['newComment'], FILTER_SANITIZE_STRING);
    if ($newComment == $comment && $newNickname == $nickname) {                    #если ничего не поменялось, то остается как есть
        header('Location: layoutForum.php');                                #иначе меняется запись
    }
    else {
        if ($newNickname == "" || $newNickname == NULL) { #Проверка  назаполненость поля nickname, если пусто, то записывается "Гость"
            $newNickname = "Гость";
        }
        Comment::updateComment($id_comment, $newNickname, $newComment);
        header('Location: layoutForum.php');
    }
}