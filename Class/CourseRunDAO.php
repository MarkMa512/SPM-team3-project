<?php

require_once 'autoload.php'; 

class CourseRunDAO{
    
    function displayAllCourseRun(){
        // output: display a list of CourseRun Object of all courses
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT C.Course_Code, Course_Name, Course_Run_ID, Capacity, Start_Date, End_Date 
                FROM Course C, Course_Run CR WHERE C.Course_Code = CR.Course_Code;"; 
        $stmt = $pdo->prepare($sql); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Course_Code"], $row["Course_Name"], $row["Course_Run_ID"], $row["Capacity"], $row["Start_Date"], $row["End_Date"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

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
            $result[] = new CourseRun($row["Course_Code"], $row["Course_Run_ID"], $row["Capacity"], $row["Start_Date"], $row["End_Date"]); 
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

    function updateCourseRunStartDateEndDate($courseRun, $startDate, $endDate){
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
        //input: A courseRun Object 
        // output: A list of trainee enrolled in the current courserun 
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "SELECT * FROM Enrollment_Record 
                WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id;"; 
        $stmt = $pdo->prepare($sql); 

        $courseCode = $courseRun->getCourseCode(); 
        $courseRunID = $courseRun->getCourseRunID();
        
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        while($row = $stmt->fetch()){
            $result[] = [$row["Course_Code"], $row["Course_name"], $row["Course_Run_ID"], $row["Capacity"], $row["Start_date"], $row["End_Date"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        return $result; 
    }

    function getAssignedTrainer($courseRun){
        // input: A courseRun Object 
        // output: the trainer assigned to the course
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "SELECT E.Employee_ID, E.First_Name, E.Last_name 
                FROM Assignment A, Employee E 
                WHERE A.Instructor_ID = E.Employee_ID AND A.Course_Code = :course_code AND A.Course_Run_ID = :course_run_id;"; 
        $stmt = $pdo->prepare($sql); 

        $courseCode = $courseRun->getCourseCode(); 
        $courseRunID = $courseRun->getCourseRunID();
        
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        while($row = $stmt->fetch()){
            $result[] = [$row["Employee_ID"], $row["First_Name"], $row["Last_name"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        return $result; 
    }

    function assignTrainer($HRID, $instructorID,  $courseCode, $courseRunID){
        // input: Assign a Trainer to the course 
        // output: true if success
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO Assignment (HR_ID, Instructor_ID, Course_Code, Course_Run_ID) VALUES (:hr_id, :instructor_id,:course_code,:course_run_id);"; 
        $stmt = $pdo->prepare($sql); 
        
        // $courseCode = $courseRun->getCourseCode(); 
        // $courseRunID = $courseRun->getCourseRunID();
        $stmt->bindParam(":hr_id", $HRID, PDO::PARAM_INT); 
        $stmt->bindParam(":instructor_id", $instructorID, PDO::PARAM_INT); 
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_INT); 
        
        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }


    function enrolLearner($leanerID,  $courseCode, $courseRunID){
        // input: Assign a Trainer to the course 
        // output: true if success
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO enrollment_record (Learner_ID, Course_Code, Course_Run_ID) VALUES (:leaner_id,:course_code,:course_run_id);"; 
        $stmt = $pdo->prepare($sql); 
        
        // $courseCode = $courseRun->getCourseCode(); 
        // $courseRunID = $courseRun->getCourseRunID();
        $stmt->bindParam(":leaner_id", $leanerID, PDO::PARAM_INT); 
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_INT); 
        
        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }









    function generateMaterials($courseCode, $courseRunID){
        // 
        // SELECT * FROM material WHERE Course_Code='SR101' AND Course_Run_ID=1
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection();
        $sql = "SELECT * FROM material WHERE Course_Code=:course_code AND Course_Run_ID=:course_run_id";
        $stmt = $pdo->prepare($sql); 
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_INT);
        $result = []; 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = ["CourseCode"=>$row["Course_Code"], "CourseRunID"=>$row["Course_Run_ID"], "SectionID"=>$row["Section_ID"], "MaterialID"=>$row["Material_ID"], "Material"=>$row["Material"], "Name"=>$row["Name"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        return $result; 
    }
}

?>