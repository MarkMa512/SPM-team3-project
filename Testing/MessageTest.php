<?php
// TDD Author: Ma Ningzhi 
require __DIR__ . '/../Class/Message.php';
use PHPUnit\Framework\TestCase;

Class MessageTest extends TestCase
{
public function testConstructGetParams(){
        $testMessage = new Message(1001, 0001, "Test Message Class Content");
        $this -> assertEquals(1001, $testMessage->getSenderID());
        $this -> assertEquals(0001, $testMessage->getRecieverID());
        $this -> assertEquals("Test Message Class Content", $testMessage->getMessageContent());
        // $this -> assertEquals("2021-02-02 18:00:00", $testMessage->getSentDateTime()); Time now are auto generated
        // removal of the read_status attributes 
        // $this -> assertEquals(FALSE, $testMessage->getReadStatus());
    }
}

?>