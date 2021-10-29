<?php
    require_once "../../../Class/autoload.php";
    $empDAO = new EmployeeDAO();
    // var_dump($empDAO->getAllInstructors());
    $instructors = $empDAO->getAllInstructors();
    $result = [];
    foreach ($instructors as $instructor) {
        $empID = $instructor->getEmpID();
        $name = $instructor->getEmpFirstName(). " " .$instructor->getEmpLastName();
        $result[] = ["EmpID"=>$empID, "Name"=>$name];
    }
    $postJSON = json_encode($result);
    echo $postJSON;
?>

