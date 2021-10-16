<?php

require_once 'autoload.php'; 

class CourseRunDAO{
    
    // we should not use this method as it defeats the purpose of OOP 

    // function addCourseRun($courseCode, $courseRunID, $capacity, $startDate, $endDate, $trainer=""){
    //     $conn = new ConnectionManager(); 
    //     $pdo = $conn-> getConnection(); 

    //     $sql = "INSERT INTO course_run (Course_Code, Course_Run_ID, Capacity, Start_Date, End_Date) VALUES (:course_code, :course_name, :capacity, :start_date, :end_date);"; 

    //     $stmt = $pdo->prepare($sql); 

    //     $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
    //     $stmt->bindParam(":course_name", $courseRunID, PDO::PARAM_STR); 
    //     $stmt->bindParam(":capacity", $capacity, PDO::PARAM_INT);  
    //     $stmt->bindParam(":start_date", $startDate, PDO::PARAM_STR); 
    //     $stmt->bindParam(":end_date", $endDate, PDO::PARAM_STR); 
    //     // $stmt->bindParam(":trainer", $trainer, PDO::PARAM_STR); 

    //     $status = $stmt->execute(); 

    //     if(!$status){
    //         var_dump($stmt->errorinfo());
    //         # output any error if database access has problem
    //     }

    //     $stmt->closeCursor(); 
    //     $pdo = NULL; 
    //     return $status; 
    // }

    function getCourseRun($courseCode){
        // input: courseCode 
        // output: a list of CoursrRun Object of given courseCode
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Course_Run WHERE Course_Code = :course_code;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = new CourseRun($row["Course_Code"], $row["Course_Run_ID"], $row["Capacity"], $row["Start_date"], $row["End_Date"]); 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function addCourseRun($courseRun){
        // input: a courserun object to be added into the database 
        // output: True if success
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO Course_Run (Course_Code, Course_Run_ID, Capacity, Start_Date, End_Date) 
                VALUES      (:course_code, :course_run_ID, :capacity, :start_date, :end_date);"; 
        $stmt = $pdo->prepare($sql); 
        
        $courseCode = $courseRun->getCourseCode(); 
        $courseRunID = $courseRun->getCourseRunID();
        $capacity = $courseRun->getCapacity(); 
        $startDate = $courseRun->getStartDate();  
        $endDate = $courseRun->getEndDate(); 


        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_ID", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":capacity", $capacity, PDO::PARAM_STR); 
        $stmt->bindParam(":start_date", $startDate, PDO::PARAM_STR); 
        $stmt->bindParam(":end_date", $endDate, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }
    
    function removeCourseRun($courseCode, $courseRunID){
        // input: a courserun objec to be removed from the database
        // output: True if sucess 
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "DELETE FROM Course_Run WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id;"; 
        $stmt = $pdo->prepare($sql); 
        
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status;  
    }

    function updateCourseStartDateEndDate($courseRun, $startDate, $endDate){
        // input: a courserun objec to update the $startDate and $endDate
        // output: True if sucess 
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "UPDATE Course_Run 
                SET Start_Date = :start_date, End_Date = :end_date 
                WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id;"; 
        $stmt = $pdo->prepare($sql); 

        $courseCode = $courseRun->getCourseCode(); 
        $courseRunID = $courseRun->getCourseRunID();
        
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":start_date", $startDate, PDO::PARAM_STR); 
        $stmt->bindParam(":end_date", $endDate, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status;  
    }

    function getTrainee($courseRun){
        // under construction 
    }

    function getTrainer($courseRun){
        // under construction
    }

    function getSection($courseRun){
        // under construction
    }
}

?>