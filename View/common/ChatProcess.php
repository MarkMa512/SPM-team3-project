<?php 
    session_start();
    require_once "../../Class/autoload.php";
    var_dump($_SESSION);
    echo date("Y-m-d H:i:s");// ." ". date("H:i:s")."<br>";

?>