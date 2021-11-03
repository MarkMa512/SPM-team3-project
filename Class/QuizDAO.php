<?php

require_once 'Autoload.php'; 

class QuizDAO{

    function getQuiz($quizID){
        // input: courseCode 
        // output: a list of CoursrRun Object of given courseCode
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM quiz WHERE Quiz_ID = :quizID;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":quizID", $quizID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = new Quiz($row["Quiz_Title"], $row["Quiz_Question_List"], $row["Quiz_Answer_List"]); 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function getQuizQuestions($quizID){
        // input: courseCode 
        // output: a list of CoursrRun Object of given courseCode
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM quiz WHERE Quiz_ID = :quizID;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":quizID", $quizID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = $row["Quiz_Question_List"]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function getQuizAnswer($quizID){
        // input: courseCode 
        // output: a list of CoursrRun Object of given courseCode
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM quiz WHERE Quiz_ID = :quizID;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":quizID", $quizID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = $row["Quiz_Answer_List"]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function addQuiz($quiz){
        // input: a courserun object to be added into the database 
        // output: True if success
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO Quiz (Quiz_ID, Quiz_Title, Quiz_Question_List, Quiz_Answer_List) 
                VALUES      (:quizID, :quizTitle, :quizQuestionList, :quizAnswerList)"; 
        $stmt = $pdo->prepare($sql); 
        
        $quizTitle = $quiz->getQuizTitle(); 
        $quizQuestionList = $quiz->getQuizQuestionList();
        $quizAnswerList = $quiz->getQuizAnswerList(); 
        $quizID = $quiz->getQuizID();

        
        $stmt->bindParam(":quizID", $quizID, PDO::PARAM_STR);
        $stmt->bindParam(":quizTitle", $quizTitle, PDO::PARAM_STR); 
        $stmt->bindParam(":quizQuestionList", $quizQuestionList, PDO::PARAM_STR); 
        $stmt->bindParam(":quizAnswerList", $quizAnswerList, PDO::PARAM_STR); 

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