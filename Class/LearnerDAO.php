<?php
require_once "autoload.php";
class LearnerDAO{
    function getClassesByID($trainerID){

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
}


?>