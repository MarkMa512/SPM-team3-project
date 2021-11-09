<?php
// TDD Auther: Adolphus
require __DIR__ . '/../Class/Section.php';
require __DIR__ . '/../Class/Quiz.php';
use PHPUnit\Framework\TestCase;

class SectionTest extends TestCase
{
    public function testConstructGetParams(){
        $section = new Section('Test course code', 'Test run ID', 'Test section ID', 'Test name');

        $this -> assertEquals("Test course code", $$section->getCourseCode());
        $this -> assertEquals("Test run ID", $$section->getCourseRunID());
        $this -> assertEquals("Test section ID", $$section->getSectionID());
        $this -> assertEquals("Test Name", $$section->getSectionName());
        $this -> assertEquals([], $$section->getQuizList());
        #No functions to get params
    }


}

?>