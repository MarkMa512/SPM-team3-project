<?php
    require_once "../../../Class/autoload.php";
    $empDAO = new EmployeeDAO();
    
    $instructors = $empDAO->getLearnerUnderTrainer("1001");
    $result = [];
    foreach ($instructors as $instructor) {
        $empID = $instructor->getEmpID();
        $name = $instructor->getEmpFirstName(). " " .$instructor->getEmpLastName();
        $result[] = ["EmpID"=>$empID, "Name"=>$name];
    }
    $postJSON = json_encode($result);
    echo $postJSON;
?>

