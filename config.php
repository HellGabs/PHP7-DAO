<?php

spl_autoload_register(function($className){

    if(file_exists("class". DIRECTORY_SEPARATOR ."$className.php")){
        require_once("class". DIRECTORY_SEPARATOR ."$className.php");
    }
});

?>