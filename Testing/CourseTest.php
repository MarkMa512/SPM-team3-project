<?php
// TDD Author: Adolphus
require __DIR__ . '/../Class/Course.php';
require __DIR__ . '/../Class/CourseRun.php';
use PHPUnit\Framework\TestCase;


class CourseTest extends TestCase
{
    public function testConstructGetParams(){
        $course = new Course('SR101', 'Test Name', 'Test Badge', ['PreReq 1', 'PreReq 2'], ['1', '2'], $courseStatus = TRUE);
        $this -> assertEquals("SR101", $course->getCourseCode());
        $this -> assertEquals("Test Name", $course->getCourseName());
        $this -> assertEquals("Test Badge", $course->getBadgeName());
        $this -> assertEquals(["PreReq 1", "PreReq 2"], $course->getCoursprerequisiteList());
        $this -> assertEquals(['1', '2'], $course->getCourseRunList());
    }
    
    public function testCreateCourseRun(){
        $course = new Course('SR101', 'Test Name', 'Test Badge', ['PreReq 1', 'PreReq 2'], ['1', '2'], $courseStatus = TRUE);
        $course -> createCourseRun("Test ID", "Test start date", 'Test end date', 50);
        $courseRun = new CourseRun($course->getCourseCode(), "Test ID",  50, "Test start date", 'Test end date');
        $courseRunList = $course ->getCourseRunList();
        $this -> assertEquals(3, count($courseRunList));
        $this -> assertEquals($courseRun, $courseRunList[2]);
    }
    
    public function testAddPrerequisite(){
        $course = new Course('SR101', 'Test Name', 'Test Badge', ['PreReq 1', 'PreReq 2'], ['1', '2'], $courseStatus = TRUE);
        $course -> addPrerequisite("PreReq 3");
        $preReqList = $course ->getCoursprerequisiteList();
        $this -> assertEquals(3, count($preReqList));
        $this -> assertEquals(['PreReq 1', 'PreReq 2', 'PreReq 3'], $preReqList);
    }
    
}
# S:\wamp64\www\git\SPM-team3-project\Testing\phpunit
# S:\wamp64\www\git\SPM-team3-project\Testing\CourseTest.php
?>