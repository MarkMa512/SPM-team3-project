<?php 

class Employee{
    private name;
    private empID;
    private empType;

    function __construct(name, empID, empType){
        $this->name = name;
        $this->empID = empID;
        $this->empType = empType;
    }
    function getEmpoyerType(){
        return $this->empType;
    }
}

?>