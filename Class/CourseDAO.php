<?php 
require_once "autoload.php";

class CourseDAO{
    function getPrerequisite($course){
        // input: a course object 
        // output: a list of prerequisite courses of the object
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Prerequisite WHERE course_code = :course_code;"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 

        $courseCode = $course->getCourseCode(); 
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 

        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = $row["Prerequisite_Course_Code"]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    // rephase function name 
    function getCourseRunIDList($course){
        // input: a course object 
        // output: a list of course run of the courses the object
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 

        
        $sql = "SELECT * FROM Course_Run WHERE course_code = :course_code;"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 

        $courseCode = $course->getCourseCode(); 
        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 

        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = $row['Course_Run_ID']; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        return $result; 
    }

    function getAllCourse(){
        // input: -- 
        // output: a list of all the course objects 
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Course;"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = new Course($row["Course_Code"], $row["Course_Name"]); 
        }
        $stmt->closeCursor();
        $pdo = NULL; 

        // NO need this line because we use the add function when condition apply 
        // foreach ($result as $object){
        //     // insert Prerequisite list and courseRunList

        // }

        return $result; 
    }

    function addCourse($course){
        // input: a course to be added into the database 
        // output: True if success
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO Course (Course_Code, Course_Name) VALUES (:course_code, :course_name);"; 
        $stmt = $pdo->prepare($sql); 
        
        $courseCode = $course->getCourseCode(); 
        $courseName = $course->getCourseName(); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_name", $courseName, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }

    function removeCourse($course_code){
        // input: a course to be removed from the database
        // output: Trye if sucess 
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "DELETE FROM Course WHERE course_code = :course_code;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }

    function updateCourse($courseCode){
        // under Construction 
    }

}

?>
>>>>>>> refs/remotes/origin/main
