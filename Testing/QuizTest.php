<?php
require __DIR__ . '/../Class/Quiz.php';
use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase
{
    public function testConstructGetParams(){
        $quiz = new quiz('SR101', 1, 1,'Title 1', [ ['qnNumber' => 1, 'type' => 'mcq', 'qnText' => 'Q1', 'options' => [['id' => 'q1-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q1-2', 'optText' => 'A2', 'value' => 2], ['id' => 'q1-3', 'optText' => 'A3', 'value' => 3]]],
                                        ['qnNumber' => 2, 'type' => 'mcq', 'qnText' => 'Q2', 'options' => [['id' => 'q2-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q2-2', 'optText' => 'A2', 'value' => 2]]] 
                                    ],
                                    [['qnNumber' => 1, 'answer' => '2'], ['qnNumber' => 2, 'answer' => '1']]);
        $this -> assertEquals('SR101', $quiz->getCourseCode());
        $this -> assertEquals(1, $quiz->getCourseRunID());
        $this -> assertEquals(1, $quiz->getSectionID());                            
        $this -> assertEquals("Title 1", $quiz->getQuizTitle());
        $this -> assertEquals([ ['qnNumber' => 1, 'type' => 'mcq', 'qnText' => 'Q1', 'options' => [['id' => 'q1-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q1-2', 'optText' => 'A2', 'value' => 2], ['id' => 'q1-3', 'optText' => 'A3', 'value' => 3]]],
                                        ['qnNumber' => 2, 'type' => 'mcq', 'qnText' => 'Q2', 'options' => [['id' => 'q2-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q2-2', 'optText' => 'A2', 'value' => 2]]] 
                                ], $quiz->getQuizQuestionList());
        $this -> assertEquals([['qnNumber' => 1, 'answer' => '2'], ['qnNumber' => 2, 'answer' => '1']], $quiz->getQuizAnswerList());
    }

    #Only testing set functions that have been completed
    public function testAutoGrade1(){
        $quiz = new quiz('SR101', 1, 1,'Title 1', [ ['qnNumber' => 1, 'type' => 'mcq', 'qnText' => 'Q1', 'options' => [['id' => 'q1-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q1-2', 'optText' => 'A2', 'value' => 2], ['id' => 'q1-3', 'optText' => 'A3', 'value' => 3]]],
                                        ['qnNumber' => 2, 'type' => 'mcq', 'qnText' => 'Q2', 'options' => [['id' => 'q2-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q2-2', 'optText' => 'A2', 'value' => 2]]] 
                                    ],
                                    '[{"qnNumber": 1,"answer": "2"},{"qnNumber": 2,"answer": "1"}]');
        $response = [['qnNumber' => 1, 'answer' => '2'], ['qnNumber' => 2, 'answer' => '1']];
        $result = $quiz->autoGrade($response);
        $this -> assertEquals(100.00, $result);
    }

    public function testAutoGrade2(){
        $quiz = new quiz('SR101', 1, 1,'Title 1', [ ['qnNumber' => 1, 'type' => 'mcq', 'qnText' => 'Q1', 'options' => [['id' => 'q1-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q1-2', 'optText' => 'A2', 'value' => 2], ['id' => 'q1-3', 'optText' => 'A3', 'value' => 3]]],
                                        ['qnNumber' => 2, 'type' => 'mcq', 'qnText' => 'Q2', 'options' => [['id' => 'q2-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q2-2', 'optText' => 'A2', 'value' => 2]]] 
                                    ],
                                    '[{"qnNumber": 1,"answer": "2"},{"qnNumber": 2,"answer": "1"}]');
        $response = [['qnNumber' => 1, 'answer' => '1'], ['qnNumber' => 2, 'answer' => '1']];
        $result = $quiz->autoGrade($response);
        $this -> assertEquals(50.00, $result);
    }

    public function testAutoGrade3(){
        $quiz = new quiz('SR101', 1, 1,'Title 1', [ ['qnNumber' => 1, 'type' => 'mcq', 'qnText' => 'Q1', 'options' => [['id' => 'q1-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q1-2', 'optText' => 'A2', 'value' => 2], ['id' => 'q1-3', 'optText' => 'A3', 'value' => 3]]],
                                        ['qnNumber' => 2, 'type' => 'mcq', 'qnText' => 'Q2', 'options' => [['id' => 'q2-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q2-2', 'optText' => 'A2', 'value' => 2]]] 
                                    ],
                                    '[{"qnNumber": 1,"answer": "2"},{"qnNumber": 2,"answer": [1,4]}]');
        $response = [['qnNumber' => 1, 'answer' => '1'], ['qnNumber' => 2, 'answer' => [1,4]]];
        $result = $quiz->autoGrade($response);
        $this -> assertEquals(50.00, $result);
    }
    
    public function testAutoGrade4(){
        $quiz = new quiz('SR101', 1, 1,'Title 1', [ ['qnNumber' => 1, 'type' => 'mcq', 'qnText' => 'Q1', 'options' => [['id' => 'q1-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q1-2', 'optText' => 'A2', 'value' => 2], ['id' => 'q1-3', 'optText' => 'A3', 'value' => 3]]],
                                        ['qnNumber' => 2, 'type' => 'mcq', 'qnText' => 'Q2', 'options' => [['id' => 'q2-1', 'optText' => 'A1', 'value' => 1], ['id' => 'q2-2', 'optText' => 'A2', 'value' => 2]]] 
                                    ],
                                    '[{"qnNumber": 1,"answer": "2"},{"qnNumber": 2,"answer": "1"},{"qnNumber": 3,"answer": "1"}]');
        $response = [['qnNumber' => 1, 'answer' => '1'], ['qnNumber' => 2, 'answer' => '1'], ['qnNumber' => 3, 'answer' => '2']];
        $result = $quiz->autoGrade($response);
        $this -> assertEquals(33.33, $result);
    }
    
}

?>