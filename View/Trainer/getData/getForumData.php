<?php
    require_once "../../../Class/autoload.php";
    $forumDao = new ForumDao();
    $empDAO = new EmployeeDAO();
    foreach($forumDao->displayAll() as $post) {
        $author = $empDAO->getEmp($post["Author_ID"]);
        $name = $author->getEmpFirstName()." ".$author->getEmpLastName();

        $result[] = [
            "postID" => $post["Post_ID"], 
            "topic" => $post["Topic"], 
            "content" => $post["Content"], 
            "createTime" => $post["Creation_Date_Time"], 
            "author" => $post["Author_ID"], 
            "replyToID" => $post["Reply_To_Post_ID"],
            "authorName" => $name
        ];
    }
    
    $postJSON = json_encode($result);
    echo $postJSON;
?>