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

        $this -> assertEquals(0001, $testPostDAO->getAllPostByAuthor($authorID)[0]['Post_ID']);
        $this -> assertEquals('Hello  LMS Forum', $testPostDAO->getAllPostByAuthor($authorID)[0]['Topic']);
        $this -> assertEquals("Hi LMS learning Community, Albert here, I hope you enjoy this learning platform!", $testPostDAO->getAllPostByAuthor($authorID)[0]['Content']);
        $this -> assertEquals("2021-01-01 08:00:00", $testPostDAO->getAllPostByAuthor($authorID)[0]['Creation_Date_Time']);
        $this -> assertEquals(0001, $testPostDAO->getAllPostByAuthor($authorID)[0]['Author_ID']);
        $this -> assertNull($testPostDAO->getAllPostByAuthor($authorID)[0]['Reply_To_Post_ID']);
    }

    public function testGetAllReplies(){
        $testPostDAO = new PostDAO(); 
        $postID = 0001; 
        $this -> assertEquals(0002, $testPostDAO->getAllReplies($postID)[0]['Post_ID']);
        $this -> assertEquals('Reply to LMS Forum', $testPostDAO->getAllReplies($postID)[0]['Topic']);
        $this -> assertEquals("Hey Albert, Thomas here, I am so excited to use the system", $testPostDAO->getAllReplies($postID)[0]['Content']);
        $this -> assertEquals("2021-01-01 10:00:00", $testPostDAO->getAllReplies($postID)[0]['Creation_Date_Time']);
        $this -> assertEquals(1001, $testPostDAO->getAllReplies($postID)[0]['Author_ID']);
        $this -> assertEquals(0001, $testPostDAO->getAllReplies($postID)[0]['Reply_To_Post_ID']);

    }
    
    public function testReplyPost(){
        $testAuthor = 1003; 
        $testPost = new Post("TestReplyPostTopic", "TestReplyContent", $testAuthor, 0001); 
        $testPostDAO = new PostDAO(); 

        // check if the insertion is successful or not 
        $this -> assertTrue($testPostDAO->ReplyPost($testPost)); // this function got issue!!!!!

        // $this -> assertEquals(0001, $testPostDAO->getAllPostByAuthor($testAuthor)[0]['Post_ID']);
        $this -> assertEquals('TestReplyPostTopic', $testPostDAO->getAllPostByAuthor($testAuthor)[0]['Topic']);
        $this -> assertEquals("TestReplyContent", $testPostDAO->getAllPostByAuthor($testAuthor)[0]['Content']);
        // $this -> assertEquals("2021-01-01 08:00:00", $testPostDAO->getAllPostByAuthor($testAuthor)[0]['Creation_Date_Time']);
        $this -> assertEquals($testAuthor, $testPostDAO->getAllPostByAuthor($testAuthor)[0]['Author_ID']);
        $this -> assertEquals(0001, $testPostDAO->getAllPostByAuthor($testAuthor)[0]['Reply_To_Post_ID']);
        
    }

    public function testNewPost(){
        sleep(1);// need to sleep for 1s to prevent dulication of primary key
        $testAuthor = 2001; 
        $testPostDAO = new PostDAO(); 

        // this function does not work 
         // check if the insertion is successful or not 
        $this->assertTrue($testPostDAO->newPost("TestNewPostTopic", "TestNewContent", $testAuthor));
        $this -> assertEquals('TestNewPostTopic', $testPostDAO->getAllPostByAuthor($testAuthor)[0]['Topic']);
        $this -> assertEquals("TestNewContent", $testPostDAO->getAllPostByAuthor($testAuthor)[0]['Content']);
        // $this -> assertEquals("2021-01-01 08:00:00", $testPostDAO->getAllPostByAuthor($testAuthor)[0]['Creation_Date_Time']);
        $this -> assertEquals($testAuthor, $testPostDAO->getAllPostByAuthor($testAuthor)[0]['Author_ID']);
        $this -> assertNull( $testPostDAO->getAllPostByAuthor($testAuthor)[0]['Reply_To_Post_ID']);
    }

}

?>