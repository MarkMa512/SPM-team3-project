<?php
require_once "autoload.php";

class HRDAO{

    function getAllCourse(){
        // get from the CourseDAO
        $courseInfo = new CourseDAO();
        return $courseInfo->getAllCourse();
    }

    function addCourse($course){
        $courseInfo = new CourseDAO();
        return $courseInfo->addCourse($course);
    }

    

    function getCourse($courseCode){
        // input: a course object 
        // output: a list of course run of the courses the object
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Course_Run WHERE course_code = :course_code;"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 

        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = $row['Course_Run_ID']; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        return $result; 
    }

    function getCourseRun($courseCode, $courseRunID){
        // input: a course object 
        // output: a list of course run of the courses the object
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 

        
        $sql = "SELECT * FROM Course_Run WHERE course_code = :course_code AND course_run_id = :course_run_id;"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 

 
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 

        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result = new CourseRun($row['Course_Code'],$row['Course_Run_ID'],$row['Capacity'],$row['Start_Date'],$row['End_Date']);
            break;
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        return $result; 
    }
    function getAvailableAssigntClass($trainerID){
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM assignment a, course_run cr, course c WHERE a.Course_Code=cr.Course_Code AND c.Course_Code=a.Course_Code AND a.Course_Run_ID=cr.Course_Run_ID AND a.Instructor_ID<>:trainer_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":trainer_id", $trainerID, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [
                "CourseCode" =>$row['Course_Code'], 
                "CourseName" =>$row['Course_Name'],
                "CourseRunID" =>$row['Course_Run_ID'],
                "StartDate" =>$row['Start_Date'],
                "Capacity" =>$row['Capacity'],
            ]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }
}

// $t = new HRDAO(); 
// $t->getAllCourse();

?>