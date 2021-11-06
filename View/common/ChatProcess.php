<?php 
    session_start();
    // require_once "../../Class/autoload.php";
    // var_dump($_SESSION);
    // echo date("Y-m-d H:i:s");// ." ". date("H:i:s")."<br>";

    require_once "../../Class/autoload.php";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start(); 

    // Dummy value for development purposes
    $_POST ["RecieverID"] = "1001"; 
    //print_r($_POST); 

    //print_r($_SESSION); 

    $recieverID = $_POST["RecieverID"]; 
    $sender = $_SESSION["user"]; 

    $senderID = $sender->getEmpID(); 
    print_r($senderID); 

    $messageHistory = []; 

    if($_POST){
    $msgDAO = new MessageDAO();
    $messageHistory = $msgDAO->displayConversation($senderID, $recieverID); 
    }
    // print_r($messageHistory); 
?>