<?php
require_once "../../../Class/autoload.php";
if(isset($_GET["coursecode"]) && isset($_GET["crid"])){
    // var_dump($_GET);
    $courseRunDao = new CourseRunDao();
    // var_dump($courseRunDao->generateMaterials());
    $postJSON = json_encode($courseRunDao->generateMaterials($_GET["coursecode"], $_GET["crid"]));
    // $postJSON = json_encode($_GET);
    // $postJSON = json_encode($courseRunDao->generateMaterials("SR101", 1));
    // var_dump($courseRunDao->generateMaterials("SR101", 1));
    echo $postJSON;
}


?>