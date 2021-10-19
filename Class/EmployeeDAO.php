<?php

require_once "autoload.php";

class EmployeeDAO {

    
    function getAll() {
        
        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        
        // prepare select
        $sql = "SELECT * FROM Employee";
        $stmt = $conn->prepare($sql);
            
        $employee = null;
        if ( $stmt->execute() ) {
            
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                $user = new Employee($row["First_Name"], $row["Last_Name"],
                $row["Employee_ID"],$row["Employee_Type"],$row["Employee_Password_Hash"]);
                $employee[] = $user;
            }
            
        }
        else {
            // $connMgr->handleError($stmt, $sql );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $employee;
    }
    function getEmp($emp_id) {
        
        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        
        // prepare select
        $sql = "SELECT * FROM Employee WHERE Employee_ID = :emp_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":emp_id", $emp_id, PDO::PARAM_INT);
            
        $employee = null;
        if ( $stmt->execute() ) {
            
            if ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                $employee = new Employee($row["First_Name"], $row["Last_Name"],
                $row["Employee_ID"],$row["Employee_Type"],$row["Employee_Password_Hash"]);
            }
            
        }
        else {
            // $connMgr->handleError($stmt, $sql );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $employee;
    }
    
    function createNewEmployee($employee) {
        $result = true;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        
        // prepare insert
        $sql = "INSERT INTO Employee (Employee_ID,First_Name,Last_Name,Employee_Type,Employee_Password_Hash) VALUES (:Employee_ID,:First_Name,:Last_Name,:Employee_Type,:Employee_Password_Hash)";
        $stmt = $conn->prepare($sql);
        
        $id = $employee->getEmpID();
        $first_name = $employee->getEmpFirstName();
        $last_name = $employee->getEmpLastName();
        $emp_type = $employee->getEmpType();
        $passwordHash = $employee->getPasswordHash();

        $stmt->bindParam(":Employee_ID", $id, PDO::PARAM_INT);
        $stmt->bindParam(":First_Name", $first_name, PDO::PARAM_STR);
        $stmt->bindParam(":Last_Name", $last_name, PDO::PARAM_STR);
        $stmt->bindParam(":Employee_Type", $emp_type, PDO::PARAM_STR);
        $stmt->bindParam(":passwordHash", $passwordHash, PDO::PARAM_STR);
        

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "employee" => $employee, ];
            // $connMgr->handleError( $stmt, $sql, $parameters );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }


    function updatePassword($employee) {
        $result = true;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        
        // prepare insert
        $sql = "UPDATE Employee SET Employee_Password_Hash = :passwordHash  WHERE Employee_ID = :EmpID";
        $stmt = $conn->prepare($sql);
        
        $id = $employee->getEmpID();
        $passwordHash = $employee->getPasswordHash();

        $stmt->bindParam(":EmpID", $id, PDO::PARAM_STR);
        $stmt->bindParam(":passwordHash", $passwordHash, PDO::PARAM_STR);
        

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "user" => $employee, ];
            // $connMgr->handleError( $stmt, $sql, $parameters );
            
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }
}