<?php

class ConnectionManager {

    public function getConnection() {
        // for development / testing purposes only! 
        // fill up based on your own configurations
        // $servername = 'localhost';

        $servername = "database-1.cjfoojqqvgrl.us-east-2.rds.amazonaws.com";
        $username = 'admin';
        $password = 'pass1234';
        $dbname = 'LMS-Database';

        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // if fail, exception will be thrown

        // Return connection object
        return $conn;
    }

}
