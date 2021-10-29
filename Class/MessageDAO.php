<?php
require_once "autoload.php"; 

class MessageDAO{
    function displayConversation($senderID, $recieverID){
        // input: senderID and recieverID
        // output: a list of Message Objects as the conversation between given sender and reciever
        $result = 0; 
        return $result; 
    }

    function newMessage($messageObject){
        // input: a message object 
        // output: true if the database insertion is successful
        return 0; 
    }

    function readMessage($messageObject){
        // input: a message object 
        // output: true if the database update is successful
        $messageObject->readMessage(); 
        return 0; 
    }
}
?>