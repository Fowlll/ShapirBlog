<?php

class RegManager{

    public static function checkLog($email, $password){

        global $bdd;

        $sql = sprintf("SELECT * FROM users WHERE email_user = \"%s\";", $email);

        $req_user = $bdd->query($sql);

        $user = $req_user->fetch();

        if(md5($password) == $user["password_user"]){
            

            return true;

        }else{
            return false;
        }


    }

    public static function connectUser($email){

        global $bdd;

        $sql = sprintf("SELECT * FROM users WHERE email_user = \"%s\";", $email);

        $req_user = $bdd->query($sql);

        $user = $req_user->fetch();

        session_start();

        $_SESSION["user_id"] = $user["id_user"];
        $_SESSION["user_email"] = $user["email_user"];

        header("Location: index.php?p=dashboard");

    }

}