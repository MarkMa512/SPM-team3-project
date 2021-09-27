<?php

class Course{
    private $courseName;
    private $courseID;
    private $class = [];
    public function __construct( $courseName, $courseID){
        $this->courseName = $courseName;
        $this->courseID = $courseID;
        $this->class = [];
    }
    public function createClass($className, $classID){
        $this->class[] = new Session($className, $classID);

    }
}



?>