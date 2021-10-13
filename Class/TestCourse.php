<?php
require "autoload.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Ground for Classes</title>
</head>
<body>



<?php
echo "<br>Test Course Class:<br>"; 
$testCourse = new Course("is001", "Test Course");
var_dump($testCourse); 
echo "<br>Course Class creation test passed<br>";// Test passed; Able to create course with given parameters

echo "<br>Testing Courses DAO Class<br>"; 
$courseDAO = new CourseDAO(); 


echo "<br>Testing getAllCourse()<br>"; 
$result = $courseDAO->getAllCourse(); 
var_dump($result);


echo "<br>Testing addCourse()<br>"; 
$addResult = $courseDAO->addCourse($testCourse); 
var_dump($addResult); 

echo "<br>Testing getAllCourse()<br>"; 
$result = $courseDAO->getAllCourse(); 
var_dump($result);

echo "<br>Testing removeCourse()<br>"; 
$removedResult = $courseDAO->removeCourse($testCourse); 
var_dump($removedResult); 

echo "<br>Testing getAllCourse()<br>"; 
$result = $courseDAO->getAllCourse(); 
print_r($result);

echo '<br> Test getPrerequisite()<br>'; 
$SR210 = $result[5]; 
//print_r($result[5]);
$prerequisiteSR201 = $courseDAO->getPrerequisite($SR210);
print_r($prerequisiteSR201); 

echo '<br> Test getCourseRun()<br>'; 
$SR101 = $result[4]; 
//print_r($SR101);
$courseRunSR101 = $courseDAO->getCourseRun($SR101); 
print_r($courseRunSR101)

?>
</body>
</html>
