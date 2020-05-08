<?php

require("router.php");

if(isset($_GET["p"]) && !empty($_GET["p"])){

    $router = new router($_GET["p"]);

    $router->setUpPage();
    
}else{
    router::redirectToDefaultPage();
}

