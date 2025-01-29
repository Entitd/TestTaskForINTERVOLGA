<?php

Class Comment
{
    #Метод вывода всех комментариев из БД
    public static function showComment(){
        $pdo = Database::connection();
        $sql = "SELECT * FROM comment ORDER BY date ASC";
        $result = $pdo->prepare($sql);
        $result->execute();
        $arr = [];
        foreach ($result as $item) {
            $arr[] = $item;
        }
        return $arr;
    }
    #Метод добавления комментария, поля id_comment, date, edited генерируются сами
    public static function addComment($nickname, $comment){
        $pdo = Database::connection();
        $sql = "INSERT INTO comment (nickname, comment, edited) VALUES(:nickname, :comment, :edited)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":nickname" => $nickname,
            ":comment" => $comment,
            ":edited" => 0
        ]);
    }
    #Метод для редактирования комментария
    public static function updateComment($id_comment, $nickname,$comment){
        $pdo = Database::connection();
        $sql = "UPDATE comment SET nickname = :nickname, comment = :comment, edited = TRUE WHERE id_comment = :id_comment";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":comment" => $comment,
            ":nickname" => $nickname,
            ":id_comment" => $id_comment,
        ]);
    }
    #Метод для удаления комментария
    public static function deleteComment($id_comment){
        $pdo = Database::connection();
        $sql = "DELETE FROM comment WHERE id_comment = :id_comment";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id_comment' => $id_comment]);
    }
    #Метод для вывода всей информации о комментарии, по его id_comment. Используется для редактирования комментария
    public static function getComment($id_comment){
        $pdo = Database::connection();
        $sql = "SELECT * FROM comment WHERE id_comment = :id_comment";
        $result = $pdo->prepare($sql);
        $result->execute([':id_comment' => $id_comment]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}