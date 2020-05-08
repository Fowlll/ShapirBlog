<?php

session_start();

if(!isset($_SESSION["user_id"])){

    header("Location: index.php?p=connexion");

}


if(isset($_POST["submit"])){

    if(isset($_POST["title"]) && isset($_POST["content"])){

        ArticleManager::addArticle($_POST["title"], null, $_POST["content"], $_POST["tags"]);

        $error = "Article ajouté avec succès !";

    }else{
        $error = "Tout les champs doivent être remplies";
    }


}

?>


<html>

    <head>
        <meta charset="utf-8">
        <title><?= $blogName ?> | Nouvel article</title>


    </head>


    <body>
        
        <h1>Nouvel article</h1>


        <?php if(isset($error)) echo $error; ?>


        <form action="" method="POST">
        
            <input type="text" placeholder="Titre de l'article" name="title">
            <br>
            <input type="text" placeholder="Les tags, séparé par des virgules" name="tags">
            <br>
            <textarea placeholder="Votre article" name="content"></textarea>

            <br>

            <input type="submit" name="submit" value="Valider">
        
        </form>

    </body>


</html>