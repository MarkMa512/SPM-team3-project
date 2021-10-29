<?php
    require_once "../../../Class/autoload.php";
    session_start();
    $sectionDAO = new SectionDAO();
    $result = $sectionDAO->getSectionByID($_SESSION['user']->getEmpID());

    $postJSON = json_encode($result);
    echo $postJSON;

?>