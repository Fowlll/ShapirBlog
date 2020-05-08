<?php


$host = "localhost";
$db_name = "blog_cms";
$user = "root";
$password = "";

global $bdd;
$bdd = new PDO("mysql:host=" . $host . ";dbname=" . $db_name . ";charset=utf8", $user, $password);