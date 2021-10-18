<?php
    // foreach (glob("*.php") as $filename)
    // {
    //     echo $filename;
    //     include $filename;
    // }
    spl_autoload_register(function($class){
        require_once $class . ".php";
    });

    // example to handle log in user to different start page 
    
    
    session_start();
    // we need to find the real location for each start page
    // if(!$_SESSION["username"]){
    //     header("Location:./login.php");
    //     die();
    // }
    // if($_SESSION["role"] == "admin"){
    //     header("Location:./admin.php");
        
    // }else if($_SESSION["role"] == "trainer"){
    //     header("Location:./trainer.php");

    // }else{
    //     header("Location:./learner.php");
    // }
    // die();


?>