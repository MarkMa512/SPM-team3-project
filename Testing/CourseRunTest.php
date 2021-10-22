<?php
require __DIR__ . '/../Class/CourseRun.php';
require __DIR__ . '/../Class/Section.php';
require 'phpunit';
use PHPUnit\Framework\TestCase;

class CourseRunTest extends TestCase
{
    public function testConstructGetParams(){
        $courseRun = new CourseRun('Test Code', 'Test ID', 50,'Test Start', 'Test End', 'Test Trainer');
        $this -> assertEquals("Test Code", $courseRun->getCourseCode());
        $this -> assertEquals("Test ID", $courseRun->getCourseRunID());
        $this -> assertEquals("Test Start", $courseRun->getStartDate());
        $this -> assertEquals("Test End", $courseRun->getEndDate());
        $this -> assertEquals("Test Trainer", $courseRun->getTrainer());
        $this -> assertEquals([], $courseRun->getTrainee());
    }

    #Only testing set functions that have been completed
    public function testSetsParams(){
        $courseRun = new CourseRun('Test Code', 'Test ID', 50, 'Test Start', 'Test End', 'Test Trainer');
        $courseRun -> setCourseRunID('Test ID 2');
        $courseRun -> setCourseCode('Test Code 2');
        $courseRun -> setTrainer('Test Trainer 2');
        $this -> assertEquals("Test Code 2", $courseRun->getCourseCode());
        $this -> assertEquals("Test ID 2", $courseRun->getCourseRunID());
        $this -> assertEquals("Test Trainer 2", $courseRun->getTrainer());

    }

    
    public function testCreateSection(){
        $courseRun = new CourseRun('Test Code', 'Test ID', 50, 'Test Start', 'Test End', 'Test Trainer');
        $courseRun -> createSection(1, 'Test Name');
        $sectionList = $courseRun ->getSectionList();
        $this -> assertEquals(1, count($sectionList));
    }

    public function testAddTrainee(){
        $courseRun = new CourseRun('Test Code', 'Test ID', 50, 'Test Start', 'Test End', 'Test Trainer');
        $this -> assertEquals([], $courseRun->getTrainee());
        $courseRun ->addTrainee(123);
        $this -> assertEquals([123], $courseRun->getTrainee());
    }

    public function testRemoveTrainee(){
        $courseRun = new CourseRun('Test Code', 'Test ID', 50, 'Test Start', 'Test End', 'Test Trainer');
        $this -> assertEquals([], $courseRun->getTrainee());
        $courseRun -> addTrainee(123);
        $this -> assertEquals([123], $courseRun->getTrainee());
        $courseRun -> removeTrainee(123);
        $this -> assertEquals([], $courseRun->getTrainee());

    }
    

}

?>