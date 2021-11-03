<?php
require __DIR__ . '/../Class/Employee.php';
use PHPUnit\Framework\TestCase;

Class PostTest extends TestCase
{
    public function testConstructGetParams(){
        $testPost = new Post(4, "TestPostTopic", "Test Content", 1002, "2021-02-02 18:00:00",  NULL);
        $this -> assertEquals("4", $testPost->getPostID());
        $this -> assertEquals("Test Content", $testPost->getPostContent());
        $this -> assertEquals(1002, $testPost->getPostAuthor());
        $this -> assertEquals("2021-02-02 18:00:00", $testPost->getPostDateTime());
        $this -> assertEquals(NULL, $testPost->getPostReplyTo());
    }

}

?>