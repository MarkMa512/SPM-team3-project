<?php
require __DIR__ . '/../Class/Course.php';
require __DIR__ . '/../Class/CourseRun.php';
require 'phpunit';
use PHPUnit\Framework\TestCase;


class CourseTest extends TestCase
{
    public function testConstructGetParams(){
        $course = new Course("TestCode", "TestName", ["PreReq1", "PreReq2"], ["RunList1", "RunList2"]);
        $this -> assertEquals("TestCode", $course->getCourseCode());
        $this -> assertEquals("TestName", $course->getCourseName());
        $this -> assertEquals(["PreReq1", "PreReq2"], $course->getPrerequisiteList());
        $this -> assertEquals(["RunList1", "RunList2"], $course->getCourseRunList());
    }

    public function testCreateCourseRun(){
        $course = new Course("TestCode", "TestName", ["PreReq1", "PreReq2"], ["RunList1", "RunList2"]);
        $course -> createCourseRun("Test ID", "Test start date", 'Test end date');
        $courseRunList = $course ->getCourseRunList();
        $this -> assertEquals(3, count($courseRunList));
    }

    public function testAddPrerequisite(){
        $course = new Course("TestCode", "TestName", ["PreReq1", "PreReq2"], ["RunList1", "RunList2"]);
        $course -> addPrerequisite("PreReq3");
        $preReqList = $course ->getPrerequisiteList();
        $this -> assertEquals(3, count($preReqList));
        $this -> assertEquals("PreReq3", $preReqList[2]);
    }
    
    /*Not tested yet
    public function testSetParams(){
        $course = new Course("TestCode", "TestName", ["PreReq1", "PreReq2"], ["RunList1", "RunList2"]);
        $course -> setCourseID()
    }

    /*public function testCanBeCreatedFromValidEmailAddress(): void
    {
        $this->assertInstanceOf(
            Course::class,
            Email::fromString('user@example.com')
        );
    }
    */
    
}
# S:\wamp64\www\git\SPM-team3-project\Testing\phpunit
# S:\wamp64\www\git\SPM-team3-project\Testing\CourseTest.php
?>