<?php 
    session_start();
    require_once "../../Class/autoload.php";
    $msgDAO = new MessageDAO();
    $postJSON = [];
    if(isset($_GET['send'])){
        $postJSON = json_encode($_GET);
        $msgDAO->newMessage($_GET["sender"], $_GET["receiver"], $_GET["msg"]);
        echo $postJSON;
    }
    if(isset($_GET['receive'])){
        $result=$msgDAO->displayConversation($_GET["sender"], $_GET["receiver"]);
        $postJSON = json_encode($result);
        echo $postJSON;
    }
    // $msgDAO->newMessage(1, 1001, "Hello");

    ?>