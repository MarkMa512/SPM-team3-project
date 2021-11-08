<?php
// TDD Auther: Ningzhi 
require __DIR__ . '/../Class/PostDAO.php';
use PHPUnit\Framework\TestCase;

// below are the mock data in the database for testing, check b4 running the test! 
/*
INSERT INTO Forum_Post(Post_ID, Topic, Content, Creation_Date_Time, Author_ID, Reply_To_Post_ID)
VALUES
    (0001, 'Hello  LMS Forum', 'Hi LMS learning Community, Albert here, I hope you enjoy this learning platform!', '2021-01-01 08:00:00', 0001, NULL), 
    (0002, 'Reply to LMS Forum', 'Hey Albert, Thomas here, I am so excited to use the system', '2021-01-01 10:00:00', 1001, 0001)
    ; 
*/
/*
Note: the connection Manager cannot use "localhost"; must use the numbers! 
$servername = "127.0.0.1"; 
*/

Class PostDAOTest extends TestCase{

    public function testDisplayAllPost(){

        $testPostDAO = new PostDAO();

        $this -> assertEquals(0001, $testPostDAO->displayAllPost()[0]['Post_ID']);
        $this -> assertEquals('Hello  LMS Forum', $testPostDAO->displayAllPost()[0]['Topic']);
        $this -> assertEquals("Hi LMS learning Community, Albert here, I hope you enjoy this learning platform!", $testPostDAO->displayAllPost()[0]['Content']);
        $this -> assertEquals("2021-01-01 08:00:00", $testPostDAO->displayAllPost()[0]['Creation_Date_Time']);
        $this -> assertEquals(0001, $testPostDAO->displayAllPost()[0]['Author_ID']);
        $this -> assertNull($testPostDAO->displayAllPost()[0]['Reply_To_Post_ID']);

        $this -> assertEquals(0002, $testPostDAO->displayAllPost()[1]['Post_ID']);
        $this -> assertEquals('Reply to LMS Forum', $testPostDAO->displayAllPost()[1]['Topic']);
        $this -> assertEquals("Hey Albert, Thomas here, I am so excited to use the system", $testPostDAO->displayAllPost()[1]['Content']);
        $this -> assertEquals("2021-01-01 10:00:00", $testPostDAO->displayAllPost()[1]['Creation_Date_Time']);
        $this -> assertEquals(1001, $testPostDAO->displayAllPost()[1]['Author_ID']);
        $this -> assertEquals(0001, $testPostDAO->displayAllPost()[1]['Reply_To_Post_ID']);
    }

    public function testGetAllPostByAuthor(){
        $testPostDAO = new PostDAO();
        $authorID = 0001; 
        $testPost = $testPostDAO->getAllPostByAuthor($authorID)[0]; 

        $this -> assertNotNull(0001, $testPost->getPostID()); // check if this function was used by esle where
        // data retrival is okay, but the new Post Class uses the date as PostID; 
        $this -> assertEquals('Hello  LMS Forum', $testPost->getPostTopic());
        $this -> assertEquals("Hi LMS learning Community, Albert here, I hope you enjoy this learning platform!", $testPost->getPostContent($authorID));
        $this -> assertEquals("2021-01-01 08:00:00", $testPost->getPostDateTime());
        $this -> assertEquals(0001, $testPost->getPostAuthor());
        $this -> assertNull($testPost->getPostReplyTo());
    }
    // public function testNewPost(){

    //     $testMessageDAO = new MessageDAO(); 

    //     //insert into database, check if success
    //     $this->assertTrue($testMessageDAO->newMessage(1002, 0001, "New Message Test")); 

    //     // Test if the message is inserted correctly
    //     $this -> assertEquals(1002, $testMessageDAO->displayConversation(1002, 0001)[0]['sender']);
    //     $this -> assertEquals(0001, $testMessageDAO->displayConversation(1002, 0001)[0]['reciever']);
    //     $this -> assertEquals("New Message Test", $testMessageDAO->displayConversation(1002, 0001)[0]['message']);
    // }

}

?>