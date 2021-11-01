<?php
require __DIR__ . '/../Class/Section.php';
require __DIR__ . '/../Class/Quiz.php';
use PHPUnit\Framework\TestCase;

class SectionTest extends TestCase
{
    public function testConstructGetParams(){
        $section = new Section('Test course code', 'Test run ID', 'Test section ID', 'Test name');
        #No functions to get params
    }

    public function testCreateQuiz(){
        $section = new Section('Test course code', 'Test run ID', 'Test section ID', 'Test name');
        $section -> createQuiz('Test ID', 'Test Type', 'Test Question', 'Test Answer');
        #No function to get quiz param to check quiz has been created
    }

}

?>