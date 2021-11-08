<?php
// TDD Auther: Ningzhi 
require __DIR__ . '/../Class/MessageDAO.php';
use PHPUnit\Framework\TestCase;

// below are the mock data in the database for testing, check b4 running the test! 
/*
INSERT INTO MSG 
(Sender_ID, Reciever_ID, Message_Content,Sent_Date_Time, Read_Status)VALUES
(1001, 0001, "Test Message", "2021-01-02 09:00:00", TRUE), 
    (0001, 1001, "Test Message", "2021-01-02 09:00:20", TRUE)
    ;  
*/
/*
Note: the connection Manager cannot use "localhost"; must use the numbers! 
$servername = "127.0.0.1"; 
*/

Class MessageDAOTest extends TestCase{

    public function testDisplayCoversation(){

        $testMessageDAO = new MessageDAO();

        $this -> assertEquals(1001, $testMessageDAO->displayConversation(1001, 0001)[0]['sender']);
        $this -> assertEquals(0001, $testMessageDAO->displayConversation(1001, 0001)[0]['reciever']);
        $this -> assertEquals("Test Message", $testMessageDAO->displayConversation(1001, 0001)[0]['message']);
        $this -> assertEquals("2021-01-02 09:00:00", $testMessageDAO->displayConversation(1001, 0001)[0]['time']);

        $this -> assertEquals(0001, $testMessageDAO->displayConversation(1001, 0001)[1]['sender']);
        $this -> assertEquals(1001, $testMessageDAO->displayConversation(1001, 0001)[1]['reciever']);
        $this -> assertEquals("Test Message", $testMessageDAO->displayConversation(1001, 0001)[1]['message']);
        $this -> assertEquals("2021-01-02 09:00:20", $testMessageDAO->displayConversation(1001, 0001)[1]['time']);
    }

    public function testNewMessage(){

        $testMessageDAO = new MessageDAO(); 

        //insert into database, check if success
        $this->assertTrue($testMessageDAO->newMessage(1002, 0001, "New Message Test")); 

        // Test if the message is inserted correctly
        $this -> assertEquals(1002, $testMessageDAO->displayConversation(1002, 0001)[0]['sender']);
        $this -> assertEquals(0001, $testMessageDAO->displayConversation(1002, 0001)[0]['reciever']);
        $this -> assertEquals("New Message Test", $testMessageDAO->displayConversation(1002, 0001)[0]['message']);
    }

}

// Unecessary
// $messageDAOTest = new MessageDAOTest(); 

// $messageDAOTest->testDisplayCoversation(); 

// $messageDAOTest->testNewMessage();


?>