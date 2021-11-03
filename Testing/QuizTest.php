<?php
require __DIR__ . '/../Class/Quiz.php';
use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase
{
    public function testConstructGetParams(){
        $quiz = new quiz('Title 1', [ ['qnNumber' => 1, 'type' => 'mcq', 'qnText' => 'Q1', 'options' => [['id' => 'q1-1', 'value' => 'A1'], ['id' => 'q1-2', 'value' => 'A2'], ['id' => 'q1-3', 'value' => 'A3']]],
                                        ['qnNumber' => 2, 'type' => 'mcq', 'qnText' => 'Q2', 'options' => [['id' => 'q2-1', 'value' => 'A1'], ['id' => 'q2-2', 'value' => 'A2']]] 
                                    ],
                                    [['qnNumber' => 1, 'answer' => '2'], ['qnNumber' => 2, 'answer' => '1']]);
        $this -> assertEquals("Title 1", $quiz->getQuizTitle());
        $this -> assertEquals([ ['qnNumber' => 1, 'type' => 'mcq', 'qnText' => 'Q1', 'options' => [['id' => 'q1-1', 'value' => 'A1'], ['id' => 'q1-2', 'value' => 'A2'], ['id' => 'q1-3', 'value' => 'A3']]],
                                ['qnNumber' => 2, 'type' => 'mcq', 'qnText' => 'Q2', 'options' => [['id' => 'q2-1', 'value' => 'A1'], ['id' => 'q2-2', 'value' => 'A2']]] 
                                ], $quiz->getQuizQuestionList());
        $this -> assertEquals([['qnNumber' => 1, 'answer' => '2'], ['qnNumber' => 2, 'answer' => '1']], $quiz->getQuizAnswerList());
    }

    #Only testing set functions that have been completed
    public function testAutoGrade1(){
        $quiz = new quiz('Title 1', [ ['qnNumber' => 1, 'type' => 'mcq', 'qnText' => 'Q1', 'options' => [['id' => 'q1-1', 'value' => 'A1'], ['id' => 'q1-2', 'value' => 'A2'], ['id' => 'q1-3', 'value' => 'A3']]],
                                        ['qnNumber' => 2, 'type' => 'mcq', 'qnText' => 'Q2', 'options' => [['id' => 'q2-1', 'value' => 'A1'], ['id' => 'q2-2', 'value' => 'A2']]] 
                                    ],
                                    [['qnNumber' => 1, 'answer' => '2'], ['qnNumber' => 2, 'answer' => '1']]);
        $response = [['qnNumber' => 1, 'answer' => '2'], ['qnNumber' => 2, 'answer' => '1']];
        $result = $quiz->autoGrade($response);
        $this -> assertEquals([2,2], $result);
    }

    public function testAutoGrade2(){
        $quiz = new quiz('Title 1', [ ['qnNumber' => 1, 'type' => 'mcq', 'qnText' => 'Q1', 'options' => [['id' => 'q1-1', 'value' => 'A1'], ['id' => 'q1-2', 'value' => 'A2'], ['id' => 'q1-3', 'value' => 'A3']]],
                                        ['qnNumber' => 2, 'type' => 'mcq', 'qnText' => 'Q2', 'options' => [['id' => 'q2-1', 'value' => 'A1'], ['id' => 'q2-2', 'value' => 'A2']]] 
                                    ],
                                    [['qnNumber' => 1, 'answer' => '2'], ['qnNumber' => 2, 'answer' => '1']]);
        $response = [['qnNumber' => 1, 'answer' => '1'], ['qnNumber' => 2, 'answer' => '1']];
        $result = $quiz->autoGrade($response);
        $this -> assertEquals([2,1], $result);
    }

    
    
    

}

?>