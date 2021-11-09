<?php
require __DIR__ . '/../Class/Trainer.php';
use PHPUnit\Framework\TestCase;

Class TrainerTest extends TestCase
{
    public function testConstructGetParams(){

        $testTrainer = new Trainer("TestFirstName", "TestLastName",9999, "E", "BADPassword", "I");

        $this -> assertEquals("TestFirstName",$testTrainer->getEmpFirstName());
        $this -> assertEquals("TestLastName", $testTrainer->getEmpLastName()); 
        $this -> assertEquals(9999, $testTrainer->getEmpID()); 
        $this -> assertEquals("E", $testTrainer->getEmpType());

        $this -> assertEquals('I', $testTrainer->getEngineerType());
    }
}

?>