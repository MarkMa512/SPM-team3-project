<?php

require_once "autoload.php"; 

class QualificationDAO{
    function retrieveQualificationByEmployeeID($employeeID){
        // input: courseCode 
        // output: a list of CoursrRun Object of given courseCode
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Qualification WHERE Employee_ID = :employee_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":employee_id", $employeeID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = new Qualification($row["Employee_ID"], $row["Course_Code"], $row["Qualification_Date"], $row["Badge_Assign_Date"]); 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }
}

?>