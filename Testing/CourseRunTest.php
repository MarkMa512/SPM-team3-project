<?php
require __DIR__ . '/../Class/CourseRun.php';
require __DIR__ . '/../Class/Section.php';
require 'phpunit';
use PHPUnit\Framework\TestCase;

class CourseRunTest extends TestCase
{
    public function testConstructGetParams(){
        $courseRun = new CourseRun('Test Code', 'Test ID', 'Test Start', 'Test End', 'Test Trainer');
        $this -> assertEquals("Test Code", $courseRun->getCourseCode());
        $this -> assertEquals("Test ID", $courseRun->getCourseRunID());
        $this -> assertEquals("Test Start", $courseRun->getStartDate());
        $this -> assertEquals("Test End", $courseRun->getEndDate());
        $this -> assertEquals("Test Trainer", $courseRun->getTrainer());
        $this -> assertEquals([], $courseRun->getTrainee());
    }

    <
    public function testSetsParams(){
        $courseRun = new CourseRun('Test Code', 'Test ID', 'Test Start', 'Test End', 'Test Trainer');
        $courseRun ->
    }

    public function testCreateSection(){
        $courseRun = new CourseRun('Test Code', 'Test ID', 'Test Start', 'Test End', 'Test Trainer');
        $courseRun -> createSection(1);
        $sectionList = $courseRun ->getSectionList();
        $this -> assertEquals(1, count($sectionList));
    }







}

?>