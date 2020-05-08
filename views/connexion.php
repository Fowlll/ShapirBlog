<?php

$user = UserManager::getUserById(1);

echo "Nom: " . $user["name_user"];


if(isset($_POST["submit"])){

    if(isset($_POST["email"]) && isset($_POST["password"])){

        if(RegManager::checkLog($_POST["email"], $_POST["password"])){
            RegManager::connectUser($_POST["email"]);
            $error = "Connexion réussie !";

        }else{
            $error = "Les identifiants sont incorrects";
        }

    }else{
        $error = "Tout les champs doivent être remplies";
    }

}

?>

<html>

    <head>
        <meta charset="utf-8">
        <title><?= $blogName ?> | Connexion</title>


    </head>


    <body>
        
        <h1>Connexion</h1>

        <?php if(isset($error)) echo $error; ?>


        <form action="" method="POST">
        
            <input type="email" placeholder="Adresse email" name="email">
            <br/>
            <input type="password" placeholder="Mot de passe" name="password">

            <br/>

            <input type="submit" value="Connexion" name="submit">

        </form>

    </body>

</html>