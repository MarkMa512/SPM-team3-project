<?php

require_once 'Autoload.php'; 


class SectionDAO{
    function getAllSection($courseCode, $CourseRunID){
        // input: $courseCode, $CourseRunID, $SectionID 
        // output: a list of Section Object of given courseCode and Course Run Code 
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Section WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_code", $CourseRunID, PDO::PARAM_STR); 
        
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
        // under construction 
    }

    function getQuizAnswer($courseCode, $courseRunID, $sectionID, $questionNumber){
        // under construction 
    }
    function getMaterial($courseCode, $courseRunID, $sectionID){
        // under construction 

    }
}

?>