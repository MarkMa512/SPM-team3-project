<?php
require_once "autoload.php"; 

class PostDAO{
    function displayAllPost(){
        // input: - 
        // output: a list of Post Objects
        $conn = new ConnectionManager(); 
        $pdo = $conn -> getConnection();
        $sql = "SELECT * FROM Forum_Post;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = new Post($row["Post_ID"], $row["Topic"], $row["Content"], $row["Creation_Date_Time"], $row["Author_ID"], $row["Reply_To_Post_ID"]); 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function getAllPostByAuthor($authorID){
        // input: authorID 
        // output: a list of Post Object of given authorID
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Forum_Post WHERE Author_ID = :author_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":author_id", $authorID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = new Post($row["Post_ID"], $row["Topic"], $row["Content"], $row["Creation_Date_Time"], $row["Author_ID"], $row["Reply_To_Post_ID"]); 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }



    function getAllReplies($postID){
        // input: postID 
        // output: a list of CoursrRun Object of given postID
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Forum_Post WHERE Reply_To_Post_ID = :reply_to_post_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":reply_to_post_id", $postID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = new Post($row["Post_ID"], $row["Topic"], $row["Content"], $row["Creation_Date_Time"], $row["Author_ID"], $row["Reply_To_Post_ID"]); 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }



    function newPost($postObject){
        // input: a post object to be added into the database 
        // output: True if success
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO Forum_Post (Post_ID, Topic, Content, Author_ID, Reply_To_Post_ID) 
                VALUES                 (:post_id, :topic, :content, :author_id, :reply_to_post_id);"; 
        $stmt = $pdo->prepare($sql); 
        
        $postID = $postObject->getPostID(); 
        $topic = $postObject->getPostTopic();
        $content = $postObject->getPostContent(); 
        $authorID = $postObject->getPostAuthor();  
        $replyToPostID = $postObject->getPostReplyTo(); 


        $stmt->bindParam(":post_id", $postID, PDO::PARAM_STR); 
        $stmt->bindParam(":topic", $topic, PDO::PARAM_STR); 
        $stmt->bindParam(":content", $content, PDO::PARAM_STR); 
        $stmt->bindParam(":author_id", $authorID, PDO::PARAM_STR); 
        $stmt->bindParam(":reply_to_post_id", $replyToPostID, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }

    function deletePost($postID){
        // input: a postID to be removed from the database
        // output: True if success 
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "DELETE FROM Forum_Post WHERE Post_ID = :Post_ID;"; 
        $stmt = $pdo->prepare($sql); 
        
        $stmt->bindParam(":Post_ID", $postID, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status;  
    }


    function editPost($editedPostObject){
        // input: a post object to be added into the database 
        // output: True if success
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "UPDATE Forum_Post
                SET Topic = :topic, Content = :content
                WHERE Post_ID = :post_id;"; 

        $stmt = $pdo->prepare($sql); 

        $topic = $editedPostObject->getPostTopic();
        $content = $editedPostObject->getPostContent(); 
        $postID = $editedPostObject->getPostID(); 

        $stmt->bindParam(":post_id", $postID, PDO::PARAM_STR); 
        $stmt->bindParam(":topic", $topic, PDO::PARAM_STR); 
        $stmt->bindParam(":content", $content, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }
}

?>