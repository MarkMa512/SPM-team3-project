<?php

require_once "autoload.php";

class EngineerDAO{


    function GetAll($Etype){

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        
        // prepare select
        $sql = "SELECT * FROM Engineer WHERE Engineer_Type = :Etype";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":Etype", $Etype, PDO::PARAM_STR);
            
        $engineer = null;
        if ( $stmt->execute() ) {
            
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                $engineer = new Employee($row["First_Name"], $row["Last_Name"],
                $row["Employee_ID"],$row["Employee_Type"],$row["Engineer_Type"]);
            }
            
        }
        else {
            // $connMgr->handleError($stmt, $sql );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $engineer;
    }
}

?>