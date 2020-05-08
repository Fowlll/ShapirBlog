<?php


class UserManager{


    public static function getUserById($id){

        global $bdd;

        $sql = sprintf("SELECT * FROM users WHERE id_user = %s;", $id);

        $req = $bdd->query($sql);
        
        return $req->fetch();

    }


}