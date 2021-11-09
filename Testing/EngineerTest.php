<?php
require __DIR__ . '/../Class/Engineer.php';
use PHPUnit\Framework\TestCase;

Class EngineerTest extends TestCase
{
    public function testConstructGetParams(){

        $testEngineer = new Engineer("TestFirstName", "TestLastName",9999, "E", "BADPassword", "I");

        $this -> assertEquals("TestFirstName",$testEngineer->getEmpFirstName());
        $this -> assertEquals("TestLastName", $testEngineer->getEmpLastName()); 
        $this -> assertEquals(9999, $testEngineer->getEmpID()); 
        $this -> assertEquals("E", $testEngineer->getEmpType());

        $this -> assertEquals('I', $testEngineer->getEngineerType());
    }

}

?>