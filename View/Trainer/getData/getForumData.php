<?php
    require_once "../../../Class/autoload.php";
    session_start();
    // var_dump($_SESSION);
    $forumDao = new PostDAO();
    $empDAO = new EmployeeDAO();

    foreach($forumDao->displayAllPost() as $post) {
        $author = $empDAO->getEmp($post->getPostAuthor());
        $name = $author->getEmpFirstName()." ".$author->getEmpLastName();
        // var_dump($post);
        $result[] = [
            "postID" => $post->getPostID(), 
            "topic" => $post->getPostTopic(),
            "content" => $post->getPostContent(),
            "createTime" => $post->getPostDateTime(), 
            "author" => $post->getPostAuthor(),
            "replyToID" => $post-> getPostReplyTo(),
            "authorName" => $name
        ];
    }
    
    
    $postJSON = json_encode($result);
    echo $postJSON;
?>