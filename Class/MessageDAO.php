<?php
require_once "autoload.php"; 

class MessageDAO{
    
    function displayConversation($senderID, $recieverID){
        // input: senderID and recieverID
        // output: a list of Message Objects as the conversation between given sender and reciever
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM MSG 
                WHERE Sender_ID = :sender_id AND Reciever_ID = :reciever_id 
                OR Sender_ID =:reciever_id AND Reciever_ID = :sender_id
                ORDER BY Sent_Date_Time; "; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":sender_id", $senderID, PDO::PARAM_STR); 
        $stmt->bindParam(":reciever_id", $recieverID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        $result=[];
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = ["sender"=>$row['Sender_ID'], 
            "reciever"=>$row['Reciever_ID'], 
            "message"=>$row['Message_Content'], 
            "time"=>$row['Sent_Date_Time']]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function newMessage($senderID,$receiverID,$messageContent, $readStatus=False){
        // input: a message object 
        // output: true if the database insertion is successful
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO MSG (Sender_ID, Reciever_ID, Message_Content)
                VALUES (:sender_id, :reciever_id, :message_content);"; 
        $stmt = $pdo->prepare($sql); 
        
        // $senderID = $messageObject->getSenderID(); 
        // $recieverID = $messageObject->getRecieverID();
        // $messageContent = $messageObject->getMessageContent(); 
        // $readStatus = $messageObject->getReadStatus(); 
        // $datetime = $messageObject-> getSentDateTime();

        $date = date('Y-m-d H:i:s');
        $stmt->bindParam(":sender_id", $senderID, PDO::PARAM_STR); 
        $stmt->bindParam(":reciever_id", $receiverID, PDO::PARAM_STR); 
        $stmt->bindParam(":message_content", $messageContent, PDO::PARAM_STR); 
        // $stmt->bindParam(":readstatus", $readStatus, PDO::PARAM_STR); 
        // $stmt->bindParam(":nowdatetime", $date, PDO::PARAM_STR);
        // $stmt->bindParam(":readstatus", 0, PDO::PARAM_STR);

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }

    // function readMessage($messageObject){
    //     // input: a message object 
    //     // output: true if the database update is successful
    //     $messageObject->readMessage(); 
    //     return 0; 
    // }
}
?>