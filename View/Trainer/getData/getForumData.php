<?php
    require_once "../../../Class/autoload.php";
    session_start();
    // var_dump($_SESSION);
    $forumDao = new PostDAO();
    $empDAO = new EmployeeDAO();
    // var_dump($forumDao->displayAllPost());
    foreach($forumDao->displayAllPost() as $post) {
        $author = $empDAO->getEmp($post['Author_ID']);
        $name = $author->getEmpFirstName()." ".$author->getEmpLastName();
        // var_dump($post);
        $result[] = [
            "postID" => $post['Post_ID'],
            "topic" => $post['Topic'],
            "content" => $post['Content'],
            "createTime" => $post['Creation_Date_Time'], 
            "author" => $post['Author_ID'],
            "replyToID" => $post['Reply_To_Post_ID'],
            "authorName" => $name
        ];
    }
    
    
    $postJSON = json_encode($result);
    echo $postJSON;
?>