<?php


class router{

    private $_ctrl;
    private $_view;
    private $_target;

    public static $_defaultTarget = "home";


    public function __construct($targetPage){
        
        $this->_target = $targetPage;
        $this->_ctrl = "controllers/" . $targetPage . ".php";
        $this->_view = "views/" . $targetPage . ".php";

    }

    // redirect function
    public function setUpPage(){

        // Check if files exists
        if(is_file($this->_ctrl)){

            if(is_file($this->_view)){


                require_once("db_config.php");

                require_once("controllers/manager.php");

                // Include controllers
                include_once($this->_ctrl);
                // Include view
                include_once($this->_view);

                

            }else{
                router::redirectToDefaultPage();
            }

        }else{
            router::redirectToDefaultPage();
        }

    }

    //redirect to default page
    public static function redirectToDefaultPage(){
        header("Location: index.php?p=" . router::$_defaultTarget);
    }

}