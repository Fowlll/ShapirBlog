<html>

    <head>
        <meta charset="utf-8">
        <title><?= $blogName ?> | Accueil</title>

        <link rel="stylesheet" type="text\css" href="public/css/general.css">
        <link rel="stylesheet" type="text\css" href="public/css/home.css">
    </head>

    <body>
        
        <h1>Accueil</h1>

        <!-- Header -->

        <!-- Show all the articles -->
        <?php foreach($allArticle as $article){ ?>

            <a href="index.php?p=view_article&id=<?= $article["id_article"] ?>"><?= $article["title_article"] ?></a>
            <br>

        <?php } ?>

        <!-- Footer -->

    </body>

</html>