<?php 
class HR extends Employee {

    function __construct($First_Name, $Last_Name,$Employee_ID, $Employee_Type,$Employee_Password_Hash){
        // i'm not sure for this part 
        Employee::__construct($First_Name, $Last_Name,$Employee_ID, $Employee_Type,$Employee_Password_Hash);
    }

    function displayAllCourse(){
        // use select sql (sql + fornt end)

    }

    function createCourse($courseCode, $courseName, $prerequisiteList =[], $courseRunList=[]){
        // call function __construct from course 
        $course = new Course($courseCode, $courseName, $prerequisiteList);
        

    }

    function getCourseObject($courseCode){
        
        $courseCode = "";
        $courseTitle ="";
        $prerequisite ="";
        $courseRunList = [];
        // select and update the variable 

        // if return result ==>  NA/NULL return false 

        // continue
        $crrCourse = new Course($courseCode, $courseTitle, $prerequisite, $courseRunList); 
        return $crrCourse;
    }

    function getCourseRunObject($courseCode, $courseRunID){
        
        $startDate = "";
        $endDate = "";
        $trainer = "";
        // select and update the variable 

        // continue  same as getCourseObject
        
        $crrCourseRun = new CourseRun($courseCode, $courseRunID, $startDate, $endDate, $trainer); 
        return $crrCourseRun;
    }

}

?>