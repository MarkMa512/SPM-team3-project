<?php
    require_once "../../../Class/autoload.php";
    $empDAO = new EmployeeDAO();
    session_start();
    $instructors = $empDAO->getLearnerUnderTrainer($_SESSION["user"]->getEmpID());
    $trainerID = $_SESSION["user"]->getEmpID();
    $result = [];
    foreach ($instructors as $instructor) {
        $empID = $instructor->getEmpID();
        $name = $instructor->getEmpFirstName(). " " .$instructor->getEmpLastName();
        $result[] = ["EmpID"=>$empID, "Name"=>$name, "TrainerID"=>$trainerID];
    }
    $postJSON = json_encode($result);
    echo $postJSON;
?>

