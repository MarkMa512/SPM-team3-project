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
            $result = new Quiz($courseCode, $courserunID, $sectionID, $row["Quiz_Title"], $row["Quiz_Question_List"], $row["Quiz_Answer_List"]); 
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
            $result = [$row["Quiz_Question_List"], $row['Quiz_Title']]; 
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
                VALUES      (:courseCode, :courserunID, :sectionID, :quizTitle, :quizQuestionList, :quizAnswerList)
                ON DUPLICATE KEY UPDATE Quiz_Title = :quizTitle, Quiz_Question_List = :quizQuestionList, Quiz_Answer_List = :quizAnswerList"; 
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
        
        try{
            $status = $stmt->execute();
        }catch(PDOException $e){
            echo $e;
        }
        
         
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status;
    }

    function addQuizRecord($learnerID, $courseCode, $courserunID, $sectionID, $responseList, $quizScore){
        // input: a quiz object to be added into the database 
        // output: True if success
        
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO Quiz_Record (Learner_ID, Course_Code, Course_Run_ID, Section_ID, Response_List, Quiz_Score) 
                VALUES      (:learnerID, :courseCode, :courserunID, :sectionID, :responseList, :quizScore)"; 
        $stmt = $pdo->prepare($sql); 
        
        
        
        $responseListJSON = json_encode($responseList); 
        

        $stmt->bindParam(":learnerID", $learnerID, PDO::PARAM_STR); 
        $stmt->bindParam(":courseCode", $courseCode, PDO::PARAM_STR);
        $stmt->bindParam(":courserunID", $courserunID, PDO::PARAM_STR);
        $stmt->bindParam(":sectionID", $sectionID, PDO::PARAM_STR); 
        $stmt->bindParam(":responseList", $responseListJSON, PDO::PARAM_STR); 
        $stmt->bindParam(":quizScore", $quizScore, PDO::PARAM_STR); 
        
        
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status;
    }

    function getLatestQuizResult($learnerID,$courseCode, $courserunID, $sectionID){
        // input: courseCode 
        // output: a list of CoursrRun Object of given courseCode
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT qr.Learner_ID, qr.Course_Code, qr.Course_Run_ID, qr.Section_ID, qr.Attempt_Number, qr.Response_List, qr.Quiz_Score, qr.Quiz_Date_Time, q.Quiz_Title, q.Quiz_Question_List, q.Quiz_Answer_List 
                FROM quiz_record AS qr LEFT JOIN quiz AS q 
                ON q.Course_Code = qr.Course_Code AND q.Course_Run_ID = qr.Course_Run_ID AND q.Section_ID = qr.Section_ID 
                WHERE qr.Learner_ID = :learnerID AND qr.Course_Code = :courseCode AND qr.Course_Run_ID = :courserunID AND qr.Section_ID = :sectionID 
                AND qr.Attempt_Number = (SELECT MAX(Attempt_Number) FROM Quiz_Record WHERE Learner_ID = :learnerID AND Course_Code = :courseCode AND Course_Run_ID = :courserunID AND Section_ID = :sectionID)"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":learnerID", $learnerID, PDO::PARAM_STR);
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
            $result = $row; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

}

?>