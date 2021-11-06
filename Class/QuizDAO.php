<?php

require_once 'autoload.php'; 

class QuizDAO{

    function getQuiz($courseCode, $courserunID, $sectionID){
        // input: courseCode 
        // output: a list of CoursrRun Object of given courseCode
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM quiz WHERE Course_Code = :courseCode AND Course_Run_ID = :courserunID AND Section_ID = :sectionID;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":courseCode", $courseCode, PDO::PARAM_STR);
        $stmt->bindParam(":courserunID", $courserunID, PDO::PARAM_STR);
        $stmt->bindParam(":sectionID", $sectionID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = new Quiz($courseCode, $courserunID, $sectionID, $row["Quiz_Title"], $row["Quiz_Question_List"], $row["Quiz_Answer_List"]); 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function getQuizQuestions($courseCode, $courserunID, $sectionID){
        // input: courseCode 
        // output: a list of CoursrRun Object of given courseCode
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM quiz WHERE Course_Code = :courseCode AND Course_Run_ID = :courserunID AND Section_ID = :sectionID;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":courseCode", $courseCode, PDO::PARAM_STR);
        $stmt->bindParam(":courserunID", $courserunID, PDO::PARAM_STR);
        $stmt->bindParam(":sectionID", $sectionID, PDO::PARAM_STR);  
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result = $row["Quiz_Question_List"]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function getQuizAnswer($courseCode, $courserunID, $sectionID){
        // input: courseCode 
        // output: a list of CoursrRun Object of given courseCode
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM quiz WHERE Course_Code = :courseCode AND Course_Run_ID = :courserunID AND Section_ID = :sectionID;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":courseCode", $courseCode, PDO::PARAM_STR);
        $stmt->bindParam(":courserunID", $courserunID, PDO::PARAM_STR);
        $stmt->bindParam(":sectionID", $sectionID, PDO::PARAM_STR); 
        
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
        // input: a quiz object to be added into the database 
        // output: True if success
        
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO Quiz (Course_Code, Course_Run_ID, Section_ID, Quiz_Title, Quiz_Question_List, Quiz_Answer_List) 
                VALUES      (:courseCode, :courserunID, :sectionID, :quizTitle, :quizQuestionList, :quizAnswerList)"; 
        $stmt = $pdo->prepare($sql); 
        
        
        $courseCode = $quiz->getCourseCode();
        $courserunID = $quiz->getCourseRunID();
        $sectionID = $quiz->getSectionID();
        $quizTitle = $quiz->getQuizTitle(); 
        $quizQuestionList = json_encode($quiz->getQuizQuestionList());
        $quizAnswerList = json_encode($quiz->getQuizAnswerList()); 
        

        
        $stmt->bindParam(":courseCode", $courseCode, PDO::PARAM_STR);
        $stmt->bindParam(":courserunID", $courserunID, PDO::PARAM_STR);
        $stmt->bindParam(":sectionID", $sectionID, PDO::PARAM_STR); 
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