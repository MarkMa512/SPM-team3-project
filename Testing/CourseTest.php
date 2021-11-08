<?php
require __DIR__ . '/../Class/Course.php';
require __DIR__ . '/../Class/CourseRun.php';
use PHPUnit\Framework\TestCase;


class CourseTest extends TestCase
{
    public function testConstructGetParams(){
        $course = new Course("Test1", "TestName", "TestBadge", ["PreReq1", "PreReq2"], ["RunList1", "RunList2"]);
        $this -> assertEquals("Test1", $course->getCourseCode());
        echo 'This';
        echo $course->getCourseCode();
        $this -> assertEquals("TestName", $course->getCourseName());
        $this -> assertEquals("TestBadge", $course->getBadgeName());
        $this -> assertEquals(["PreReq1", "PreReq2"], $course->getCoursprerequisiteList());
        $this -> assertEquals(["RunList1", "RunList2"], $course->getCourseRunList());
    }

    public function testCreateCourseRun(){
        $course = new Course("Test1", "TestName", "TestBadge", ["PreReq1", "PreReq2"], ["RunList1", "RunList2"]);
        $course -> createCourseRun("Test ID", "Test start date", 'Test end date', 50);
        $courseRunList = $course ->getCourseRunList();
        $this -> assertEquals(3, count($courseRunList));
    }

    public function testAddPrerequisite(){
        $course = new Course("Test1", "TestName", "TestBadge", ["PreReq1", "PreReq2"], ["RunList1", "RunList2"]);
        $course -> addPrerequisite("PreReq3");
        $preReqList = $course ->getCoursprerequisiteList();
        $this -> assertEquals(3, count($preReqList));
        $this -> assertEquals("PreReq3", $preReqList[2]);
    }
    
    /*Not tested yet
    public function testSetParams(){
        $course = new Course("Test1", "TestName", ["PreReq1", "PreReq2"], ["RunList1", "RunList2"]);
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