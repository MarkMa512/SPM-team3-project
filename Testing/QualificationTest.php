<!--
TDD author: Yu Miao
-->

<?php
require __DIR__ . '/../Class/Qualification.php';
use PHPUnit\Framework\TestCase;

Class QualificationTest extends TestCase
{
    public function testConstructGetParams(){
        $qualification = new Qualification(1001, 'PT101', "2021-11-02 10:00:00", "2021-11-02 10:00:00");
        $this -> assertEquals(1001, $qualification->getEmployeeID());
        $this -> assertEquals('PT101', $qualification->getCourseCode());
        $this -> assertEquals("2021-11-02 10:00:00", $qualification->getQualificationDate());
        $this -> assertEquals("2021-11-02 10:00:00", $qualification->getBadgeAssignDate());
    }

}

?>
