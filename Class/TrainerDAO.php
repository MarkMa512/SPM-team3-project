<?php

require_once "autoload.php";

class TrainerDAO{

    function getClassesByID($trainerID){

        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $sql = "SELECT c.Course_Name, cr.Course_Code, cr.Course_Run_ID, cr.Capacity, cr.Start_Date, cr.End_Date FROM course_run cr, assignment a, course c 
        WHERE cr.Course_Code=a.Course_Code AND cr.Course_Run_ID=a.Course_Run_ID AND c.Course_Code = cr.Course_Code AND a.Instructor_ID = :trainerID;";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":trainerID", $trainerID, PDO::PARAM_INT);

        $result = [];

        if ($stmt->execute()) {
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
                $result[] = [new CourseRun($row['Course_Code'], $row['Course_Run_ID'], $row['Capacity'], $row['Start_Date'], $row['End_Date']), $row['Course_Name']];
            }
        }else{

        }
        $stmt = null;
        $conn = null;        
        
        return $result;
    }

    function getMaterialsById($trainerID){
        // input: trainerID 
        //  output: a list of materials uploaded by a particular trainer

        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        $sql="SELECT * FROM ASSIGNMENT A , MATERIAL M, COURSE C 
        WHERE A.Course_Code = M.Course_Code AND M.Course_Code = C.Course_Code AND A.Course_Run_ID= M.Course_Run_ID 
        AND A.Course_Code=M.Course_Code AND M.Course_Code = C.Course_Code AND A.Instructor_ID=:trainerID;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":trainerID", $trainerID, PDO::PARAM_INT);
        $result = [];

        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
                $result[] = $row;
            }
        }else{

        }
        $stmt = null;
        $conn = null;        
        
        return $result;
    }

    function getCourseRunByTrainerID($trainerID){
        // input: trainerID 
        //  output: a list of materials uploaded by a particular trainer

        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        $sql="SELECT c.Course_Name, a.Course_Code, a.Course_Run_ID, q.Section_ID, q.Quiz_Score, q.Attempt_Number 
        FROM assignment a, course c, course_run cr, quiz_record q 
        WHERE a.Course_Code=cr.Course_Code 
        AND a.Course_Run_ID=cr.Course_Run_ID 
        AND a.Course_Code=c.Course_Code 
        AND q.Course_Code=a.Course_Code 
        AND q.Course_Run_ID=a.Course_Run_ID 
        AND a.Instructor_ID=:trainerID;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":trainerID", $trainerID, PDO::PARAM_INT);
        $result = [];

        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
                $result[] = $row;
            }
        }else{

        }
        $stmt = null;
        $conn = null;        
        
        return $result;
    }

    
}


?>