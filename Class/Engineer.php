<?php 
require_once "autoload.php"; 

class Engineer extends Employee{
    private $Engineer_type; 

    // old constructor: this dose not work， see below
    // function __construct($First_Name, $Last_Name, $Employee_ID, $Employee_Type, $Engineer_type){
    //     $this->First_Name= $First_Name;
    //     $this->Last_Name= $Last_Name;
    //     $this->Employee_ID =$Employee_ID;
    //     $this->Employee_Type=$Employee_Type;
    //     $this->Engineer_type = $Engineer_type;
    // }

    function __construct($First_Name, $Last_Name,$Employee_ID, $Employee_Type,$Employee_Password_Hash, $Engineer_type){
        parent::__construct($First_Name, $Last_Name, $Employee_ID, $Employee_Type,$Employee_Password_Hash);
        $this->Engineer_type = $Engineer_type;
    }


    function getEngineerType(){
        return $this->Engineer_type;;
    }

}

?>