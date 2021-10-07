<?php 
class HR extends Employee {

    function __construct(){
        // i'm not sure for this part 
        Employee::__construct();
    }

    function displayAllCourse(){
        // use select
    }

    function createCourse(courseCode, courseTitle, prerequisite=[]){
        // call function __construct from course 
    }

}

?>