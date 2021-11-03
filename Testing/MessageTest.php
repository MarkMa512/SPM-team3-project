<?php
require __DIR__ . '/../Class/Employee.php';
use PHPUnit\Framework\TestCase;

Class MessageTest extends TestCase
{
public function testConstructGetParams(){
        $testMessage = new Message(1001, 0001, "Test Message Content", "2021-02-02 18:00:00");
        $this -> assertEquals(1001, $testMessage->getSenderID());
        $this -> assertEquals(0001, $testMessage->getRecieverID());
        $this -> assertEquals("Test Content", $testMessage->getMessageContent());
        $this -> assertEquals("2021-02-02 18:00:00", $testMessage->getSentDateTime());
        $this -> assertEquals(FALSE, $testMessage->getReadStatus());
    }
}

?>