<?php 

class Learner extends Engineer{

    function viewCourseProgress($courseCode, $courseRunID){
        // need to use sql to get progress (sql + fornt end)
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        
        // prepare select
        $sql = "SELECT * FROM Course_Run WHERE Course_Code = :courseCode AND Course_Run_ID = :courseRunID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":courseCode", $courseCode, PDO::PARAM_STR);
        $stmt->bindParam(":courseRunID", $courseRunID, PDO::PARAM_INT);

        $progress = null;
        if ( $stmt->execute() ) {
            
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                $progress = new CourseRun($row["Course_Code"], $row["Course_Run_ID"],
                $row["Capacity"],$row["Start_Date"],$row["End_Date"]);
            }
            
        }
        else {
            // $connMgr->handleError($stmt, $sql );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $progress;
    }

    function viewMaterial($courseCode, $courseRunID){
        // need to use sql (sql + fornt end)
    }

    function messageTrainer($courseCode){
        $crrCourse = $this->getCourseClass($courseCode);
        
        // message function 

        
    }



    function getCourseClass($courseID){
        $courseRunID = "";
        $startDate = "";
        $endDate = "";
        $sessionList = [];
        // materials ?? datatype how to store?
        $trainer = "";
        $trainee = [];
        // return new Course($courseCode, $courseTitle, $prerequisite, $courseRunList);


    }


}

?>