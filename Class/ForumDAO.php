<?php 
class ForumDAO{
    
    function displayAll(){
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM forum_post"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 

        $status = $stmt->execute(); 

        while($row = $stmt->fetch()){
            $result[] = $row; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        return $result; 
    }
    
}


?>