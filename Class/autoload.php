<?php
    // foreach (glob("*.php") as $filename)
    // {
    //     echo $filename;
    //     include $filename;
    // }
    spl_autoload_register(function($class){
        require_once $class . ".php";
    });
?>