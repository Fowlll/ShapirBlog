<?php

try{

    if(isset($_POST["email"])){

        $user = "root";
        $password = "";

        $bdd = new PDO("mysql:host=localhost", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $sql = file_get_contents("data/install_db.sql");
        $bdd->exec($sql);


        // Create the main user
        $new_user = array(
            "id_user" => null,
            "name_user" => $_POST["name"],
            "firstname_user" => $_POST["firstname"],
            "email_user" => $_POST["email"],
            "password_user" => md5($_POST["password"]),
            "admin" => true
        );

        $sql_admin = sprintf("INSERT INTO users (%s) VALUES(%s);", implode(", ", array_keys($new_user)), ":" . implode(", :", array_keys($new_user)));

        $req_admin = $bdd->prepare($sql_admin);
        $req_admin->execute($new_user);
        
        $admin_user_id = $bdd->query("SELECT id_user FROM users WHERE email_user = \"" . $_POST["email"] . "\";");


        //Create the first article
        $new_article = array(
            "id_article" => null,
            "title_article" => "Premier article",
            "text_article" => "Voici votre premier article, allez dans le panel admin pour le supprimer",
            "author_article" => 1,
            "date_article" => date("Y-m-d"),
            "tags_article" => ""
        );

        $sql_article = sprintf("INSERT INTO article (%s) VALUES (%s);", implode(", ", array_keys($new_article)), ":" . implode(", :", array_keys($new_article)));

        $req_article = $bdd->prepare($sql_article);
        $req_article->execute($new_article);


        echo "La base de donnée a correctement été installé <br/>";

        echo "Identifiants admin: <br/>";
        echo "Email: " . $_POST["email"] . "<br/>";
        echo "Mot de passe: " . $_POST["password"] . "<br/>";

    }

}catch(PDOException $error){
    echo "Erreur: " . $error->getMessage();
}