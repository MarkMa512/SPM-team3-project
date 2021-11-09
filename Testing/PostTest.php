<?php
// TDD Author: Ma Ningzhi 
require __DIR__ . '/../Class/Post.php';
use PHPUnit\Framework\TestCase;

Class PostTest extends TestCase
{
    public function testConstructGetParams(){
        // $testPost = new Post(4, "TestPostTopic", "Test Content", 1002, "2021-02-02 18:00:00",  NULL);
        // $this -> assertEquals(4, $testPost->getPostID()); // The post id now is the time

        $testPost = new Post("TestPostTopic", "Test Content", 1002,  NULL); // revised constructor with automated time capture
        $this -> assertEquals("TestPostTopic",$testPost->getPostTopic());
        $this -> assertEquals("Test Content", $testPost->getPostContent());
        $this -> assertEquals(1002, $testPost->getPostAuthor());
        // $this -> assertEquals("2021-02-02 18:00:00", $testPost->getPostDateTime()); Automated Date
        $this -> assertEquals(NULL, $testPost->getPostReplyTo());
    }

}

?>