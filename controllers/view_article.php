<?php

require("modeles/ArticleManager.php");

$currentArticle = ArticleManager::fetchArticleById($_GET["id"]);

$articleTitle = $currentArticle["title_article"];
$articleContent = $currentArticle["text_article"];

?>