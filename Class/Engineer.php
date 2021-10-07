<?php 

class Engineer extends Employee{
    private $type; 

    function __construct($name, $empID, $empType, $type){
        $this->name = $name;
        $this->empID = $empID;
        $this->empType = $empType;
        $this->type = $type;
    }

    function getType(){
        return $this->type;
    }
    
}

?>