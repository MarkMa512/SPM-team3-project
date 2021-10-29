<?php
require_once "../../../Class/autoload.php";
session_start();
if(isset($_GET)){
    // var_dump($_GET);
    $courseDao = new CourseDao();
    // var_dump($courseRunDao->generateMaterials());
    $postJSON = json_encode($courseDao->getSectionMaterialById($_SESSION['user']->getEmpID()));
    // $postJSON = json_encode($_GET);
    // $postJSON = json_encode($courseRunDao->generateMaterials("SR101", 1));
    // var_dump($courseRunDao->generateMaterials("SR101", 1));
    echo $postJSON;
    
}


?>