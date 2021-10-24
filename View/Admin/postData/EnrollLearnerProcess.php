<?php
    require_once "../../../Class/autoload.php";
    var_dump($_GET);
    if($_GET){
        $learnerID = $_GET["empID"];
        $courseCode = $_GET["CourseID"];
        $courseRunID = $_GET["CourseRUNID"];

        $courseRunDAO = new CourseRunDAO();

        try{
            $courseRunDAO->assignLearner($learnerID,  $courseCode, $courseRunID);

        }catch(Exception $e){
            echo "Error: ".$e->getMessage();
            $_SESSION['error_msg'] = "PDO issues";
            header("Location:./../EnrollLearnerTo.php?empID={$learnerID}");
            exit();
        }
    }else{
        $_SESSION['error_msg'] = "Invalid Input";
        header("Location:./../EnrollLearnerTo.php?empID={$learnerID}");
        exit();
    }
    header("Location:./../EnrollLearner.html");
    exit();
?>