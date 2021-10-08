<?php 
class HR extends Employee {

    function __construct($name, $empID, $empType){
        // i'm not sure for this part 
        Employee::__construct($name, $empID, $empType);
    }

    function displayAllCourse(){
        // use select
    }

    function createCourse($courseCode, $courseTitle, $prerequisite=[]){
        // call function __construct from course 
    }

}

?>