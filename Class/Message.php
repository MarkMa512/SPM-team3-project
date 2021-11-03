<?php

class Message{
    private $senderID; 
    private $recieverID; 
    private $messageContent; 
    private $sentDateTime; 
    //private $readStatus; 

    function __construct($senderID, $recieverID, $messageContent, $sentDateTime = NULL)
    {
        $this->senderID = $senderID; 
        $this->recieverID = $recieverID; 
        $this->messageContent = $messageContent; 
        $this->sentDateTime = $sentDateTime; 
        // $this->readStatus = $readStatus; 
    }

    /**
     * Get the value of senderID
     */ 
    public function getSenderID()
    {
        return $this->senderID;
    }

    /**
     * Get the value of recieverID
     */ 
    public function getRecieverID()
    {
        return $this->recieverID;
    }

    /**
     * Get the value of messageContent
     */ 
    public function getMessageContent()
    {
        return $this->messageContent;
    }

    /**
     * Get the value of sentDateTime
     */ 
    public function getSentDateTime()
    {
        return $this->sentDateTime;
    }

    // /**
    //  * Get the value of readStatus
    //  */ 
    // public function getReadStatus()
    // {
    //     return $this->readStatus;
    // }

    // function readMessage(){
    //     // // set the readReadStatus = True once the reciever reads the message
    //     // if ($recieverID == $this->recieverID){
    //     //     // need to check if the reciever is the correct one or not
    //     //     $this->readStatus = TRUE; 
    //     // }else{
    //     //     echo "Wrong Reciever!"; 
    //     // }
    //     $this->readStatus = TRUE; 
    // }
}

?>