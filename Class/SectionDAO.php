<?php

require_once 'Autoload.php'; 


class SectionDAO{
    function getAllSection($courseCode, $courseRunID){
        // input: $courseCode, $CourseRunID, $SectionID 
        // output: a list of Section Object of given courseCode and Course Run Code 
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Section WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = new Section($row["Course_Code"], $row["Course_Run_ID"], $row["Section_ID"], $row["Section_Name"]); 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function getQuizQuestion($courseCode, $courseRunID, $sectionID){
        // input: courseCode, courseRunID, $sectionID 
        // output: a list of qustions
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Question WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id AND Section_ID = :section_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":section_id", $sectionID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Question_Number"], $row["Question_Type"], $row["Question"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function getQuizAnswer($courseCode, $courseRunID, $sectionID, $questionNumber){
        // input: courseCode, courseRunID, $sectionID, $questionNumber
        // output: a list of answers 
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Answer WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id AND Section_ID = :section_id AND Question_Number = :question_number;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":section_id", $sectionID, PDO::PARAM_STR); 
        $stmt->bindParam(":question_number", $questionNumber, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Question_number"], $row["Answer_Number"], $row["Answer"], $row["Is_Correct"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }
    function getAllMaterial($courseCode, $courseRunID, $sectionID){
        // input: courseCode, courseRunID, $sectionID 
        // output: a list of materials

        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Material WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id AND Section_ID = :section_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":section_id", $sectionID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Material_ID"], $row["Material"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 

    }
    function addMaterial($courseCode, $courseRunID, $sectionID){
        // under construction 
    }
}

?>