<?php


class ArticleManager{

    public static function fetchArticleById($id){

        global $bdd;
        
        $sql = sprintf("SELECT * FROM article WHERE id_article = %s;", $id);

        $req_all_article = $bdd->query($sql);

        return $req_all_article->fetch();

    }

    public static function fetchAllArticle(){

        global $bdd;
        
        $sql = "SELECT * FROM article ORDER BY date_article DESC;";

        $req_all_article = $bdd->query($sql);

        return $req_all_article->fetchAll();

    }

    public static function addArticle($title, $cover, $content, $tags){

        global $bdd;

        $new_article = array(
            "title_article" => $title,
            "cover_article" => "",
            "text_article" => $content,
            "author_article" => $_SESSION["user_id"],
            "date_article" => date("Y-m-d"),
            "tags_article" => $tags
        );

        $sql = sprintf("INSERT INTO article (%s) VALUES (%s);", implode(", ", array_keys($new_article)), ":" . implode(", :", array_keys($new_article)));

        $req_new_article = $bdd->prepare($sql);
        $req_new_article->execute($new_article);

    }



}