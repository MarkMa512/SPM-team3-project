<?php
require_once "autoload.php"; 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Class TDD</title>
</head>
<body>
    <?php
    // functional testing 
    $testPost = new Post(4, "TestPostTopic", "Test Content", 1002, "2021-02-02 18:00:00",  NULL);
    print_r($testPost); 

    $postDAO = new PostDAO(); 
    $allPost = $postDAO -> displayAllPost(); 
    print_r($allPost); 

    $postBy0001 = $postDAO -> getAllPostByAuthor("1"); 
    print_r($postBy0001); 

    $replyToPost0001 = $postDAO->getAllReplies("0001"); 
    print_r($replyToPost0001);


    // print_r($testPost->getPostAuthor()); 
    // $postDAO->newPost($testPost); 
    // $allPost2 = $postDAO -> displayAllPost(); 
    // print_r($allPost2); 

    // $postDAO->deletePost(3); 
    // $allPost3 = $postDAO -> displayAllPost(); 
    // print_r($allPost3); 

    $testPost ->setPostContent("This is a newly edited content"); 
    $postDAO -> editPost($testPost); 
    ?>
</body>
</html>

<?php
// Unit Testing: 
require __DIR__ .'/../Testing/phpunit';
use PHPUnit\Framework\TestCase;


class PostTest extends TestCase
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