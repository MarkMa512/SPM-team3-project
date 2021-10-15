<?php

class CourseRunDAO{
    

    function addCourseRun($courseCode, $courseRunID, $capacity, $startDate, $endDate, $trainer=""){
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 

        $sql = "INSERT INTO course_run (Course_Code, Course_Run_ID, Capacity, Start_Date, End_Date) VALUES (:course_code, :course_name, :capacity, :start_date, :end_date);"; 

        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_name", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":capacity", $capacity, PDO::PARAM_INT);  
        $stmt->bindParam(":start_date", $startDate, PDO::PARAM_STR); 
        $stmt->bindParam(":end_date", $endDate, PDO::PARAM_STR); 
        // $stmt->bindParam(":trainer", $trainer, PDO::PARAM_STR); 

    }

}

?>