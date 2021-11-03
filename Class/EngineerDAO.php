<?php

require_once "autoload.php";

class EngineerDAO{


    function GetAll($Etype){

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        
        // prepare select
        $sql = "SELECT * FROM Engineer WHERE Engineer_Type = :Etype";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":Etype", $Etype, PDO::PARAM_STR);
            
        $engineer = null;
        if ( $stmt->execute() ) {
            
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                $engineer = new Employee($row["First_Name"], $row["Last_Name"],
                $row["Employee_ID"],$row["Employee_Type"],$row["Engineer_Type"]);
            }
            
        }
        else {
            // $connMgr->handleError($stmt, $sql );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $engineer;
    }

    function addAccessRecord($learnerID, $courseCode, $courseRunID, $sectionID){
        // input: $learnerID, $courseCode, $courseRunID, $SectionID
        // output: True if success
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO Access_Record (Learner_ID, Course_Code, Course_Run_ID, Section_ID) 
                VALUES                 (:learner_id, :course_code, :course_run_id, :section_id);"; 
        $stmt = $pdo->prepare($sql); 
        
        $learnerID = $learnerID; 
        $courseCode = $courseCode; 
        $courseRunID = $courseRunID; 
        $sectionID = $sectionID; 


        $stmt->bindParam(":learner_id", $learnerID, PDO::PARAM_STR); 
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":section_id", $sectionID, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }

    function getAllAccessRecord($learnerID){
        // input: learnerID 
        // output: a list of record given authorID
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Access_Record WHERE Learner_ID = :learner_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":author_id", $learnerID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Learner_ID"], $row["Course_Code"], $row["Course_Run_ID"], $row["Section_ID"], $row["Visit_Date_Time"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }
}

?>