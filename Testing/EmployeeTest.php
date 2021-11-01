<?php
require __DIR__ . '/../Class/Employee.php';
use PHPUnit\Framework\TestCase;

Class EmployeeTest extends TestCase
{
    public function testConstructGetParams(){
        $employee = new Employee($First_Name, $Last_Name,$Employee_ID, $Employee_Type,$Employee_Password_Hash);
    }

}

?>