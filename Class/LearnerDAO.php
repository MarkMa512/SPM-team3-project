<?php

require_once "autoload.php";

class LearnerDAO{
    function getClassesByID($trainerID){
        // input: trainerID 
        // output: A list of CourseRun Objects taught by the given trainer
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $sql = "SELECT c.Course_Name, er.Learner_ID, er.Course_Code, er.Course_Run_ID, cr.Start_Date, cr.End_Date, cr.Capacity FROM enrollment_record er, course_run cr, course c WHERE cr.Course_Code=er.Course_Code AND cr.Course_Code=c.Course_Code AND cr.Course_Run_ID=er.Course_Run_ID AND er.Learner_ID=:trainerID;";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":trainerID", $trainerID, PDO::PARAM_INT);

        $result = [];

        if ($stmt->execute()) {
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
                $result[] = [new CourseRun($row['Course_Code'], $row['Course_Run_ID'], $row['Capacity'], $row['Start_Date'], $row['End_Date']), $row['Course_Name']];
                // var_dump($row);
            }
        }else{

        }
        $stmt = null;
        $conn = null;        
        
        return $result;
    }


    function getMaterialsById($learnerID){
        // input: learnerID
        // a list of Information regarding the material by learner for the class he has taken. 
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        $sql="SELECT * FROM enrollment_record er, material m, course c WHERE er.Course_Code=m.Course_Code AND er.Course_Run_ID=m.Course_Run_ID AND c.Course_Code=er.Course_Code AND Learner_ID=:trainerID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":trainerID", $learnerID, PDO::PARAM_INT);
        $result = [];

        if ($stmt->execute()) {
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
                $result[] = $row;
            }
        }else{

        }
        $stmt = null;
        $conn = null;        
        
        return $result;
    }


    function getAccessedSectionRecord($learnerID, $courseCode, $courseRunID){
        // input: learnerID, courseCode, courseRunID
        // output: a list of distinct section the learner has accessed 
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT DISTINCT Section_ID FROM Access_Record WHERE Learner_ID = :learner_id AND Course_Code = :course_code AND Course_Run_ID = :course_run_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":learner_id", $learnerID, PDO::PARAM_STR); 
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Section_ID"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        return $result; 
    }

    function getPassedQuizRecord($learnerID, $courseCode, $courseRunID){
        // input: learnerID, courseCode, courseRunID
        // output: a list of distinct quizes the learner has passed with grade > 0.6
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT DISTINCT Section_ID FROM Quiz_Record 
                WHERE Learner_ID = :learner_id 
                AND Course_Code = :course_code 
                AND Course_Run_ID = :course_run_id 
                AND Quiz_Score >= 0.60"; 
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":learner_id", $learnerID, PDO::PARAM_STR); 
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = $row["Section_ID"]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        return $result; 
    }

    function getProgressByQuizPassed($learnerID, $courseCode, $courseRunID){
        // input: learnerID, courseCode, courseRunID
        // output: a float representing the current progress of the learner for a given courseCode and courseRun

        $passedSectionList =$this->getPassedQuizRecord($learnerID, $courseCode, $courseRunID); 

        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 

        $sql = "SELECT Section_ID FROM Section 
                WHERE Course_Code = :course_code 
                AND Course_Run_ID = :course_run_id;"; 

        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(":learner_id", $learnerID, PDO::PARAM_STR); 
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $totalSectionList[] = $row["Section_ID"]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 

        $result = count($passedSectionList)/ count($totalSectionList); 

        return $result; 

    }

    function getQualifiedCourse($learnerID){
        // input: learnerID
        // output: a list of CourseCode which the learner has already qualified
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $sql="SELECT Course_Code from Qualification Where Employee_ID=:learnerID;";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":learner_ID", $learnerID, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 

        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Course_Code"]]; 
        }
        $stmt = null;
        $conn = null;        
        return $result;
    }

    function getEnrolledCourses($learnerID){
        // input: learnerID
        // output: a  list of CourseCode which the learner is currently enrolled in
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $sql="SELECT Course_Code from Enrollment_Record Where Employee_ID=:learnerID;";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":learner_ID", $learnerID, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Course_Code"]]; 
        }

        $stmt = null;
        $conn = null; 
        
        return $result;
    }

    function checkPrerequisiete($learnerID, $courseCode){
        // input: learnerID, courseCode 
        // output: true if the learner met the prerequisite; false otherwise

        $courseDAO = new CourseDAO(); 
        
        $prerequisteList = $courseDAO->getPrerequisite($courseCode); // obtain the prerequisite list

        $passedCourseList = $this->getQualifiedCourse($learnerID); // obtain the passed courses

        if (count($prerequisteList) == 0) {
            // if there is no preprequisite for this course, return true
            return True; 
        }elseif (count($prerequisteList) != 0 && count($passedCourseList) == 0){
            // if there is prerequisite for this course, but the learner did not take any course b4, return false
            return False; 
        }else{
            $matchedPrerequisiteList = []; 
            foreach ($passedCourseList as $passedCourse){
                // for every passed course 
                if (in_array($passedCourse,$prerequisteList)){
                    // if the passed course is in the prerequisiteLis, add to the matchedPreprequisiteList
                    $matchedPrerequisiteList [] = $passedCourse; 
                }
            }
            if (count($matchedPrerequisiteList) == count($prerequisteList)){
                // if all the preprequisite courses are met, return True
                return True; 
            }else{
                return False; 
            }
        }
    }

    function checkAlreadyEnrolled($learnerID, $courseCode){
        $enrolledCourseList = $this->getEnrolledCourses($learnerID); 
        if (in_array($courseCode, $enrolledCourseList)){
            // if the the learner has already enrolled into the course
            return False; 
        }else{
            return True; 
        }
    }

    function selfEnrollmentToDatabase($learnerID, $courseCode, $courseRunCode){
        // input: a courserun object to be added into the database 
        // output: True if success
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO Enrollment (Learner_ID, Course_Code, Course_Run_ID) 
                VALUES      (:learner_id, :course_code, :course_run_id);"; 
        $stmt = $pdo->prepare($sql); 
    
        $stmt->bindParam(":learner_id", $learnerID, PDO::PARAM_STR); 
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

    function selfEnrollment($learnerID, $courseCode, $courseRunCode){
         if ($this->checkPrerequisiete($learnerID, $courseCode) && $this->checkAlreadyEnrolled($learnerID, $courseCode)){
             // if the learner meets the preprequiste and has yet taken this course b4, 
             if ($this->selfEnrollmentToDatabase($learnerID, $courseCode, $courseRunCode)){
                // if the insertion is successful
                return True; 
            }else{
                echo "PDO ERROR!"; 
                return False; 
            }
         }else{
             return False; 
         }

    }
}


?>