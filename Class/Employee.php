<?php 

class Employee{
    private $First_Name;
    private $Last_Name;
    private $Employee_ID;
    private $Employee_Type;
    private $Employee_Password_Hash;

    function __construct($First_Name, $Last_Name,$Employee_ID, $Employee_Type,$Employee_Password_Hash){
        $this->First_Name= $First_Name;
        $this->Last_Name= $Last_Name;
        $this->Employee_ID =$Employee_ID;
        $this->Employee_Type=$Employee_Type;
        $this->Employee_Password_Hash=$Employee_Password_Hash;

    }
    public function getEmpType(){
        return $this->Employee_Type;
    }

    public function getEmpFirstName(){
        return $this->First_Name;
    }

    public function getEmpLastName(){
        return $this->Last_Name;
    }

    public function getEmpID(){
        return $this->Employee_ID;
    }

    public function getPasswordHash(){
        return $this->Employee_Password_Hash;
    }

    public function setPasswordHash($hashed){
        $this->Employee_Password_Hash = $hashed;
    }

}

?>