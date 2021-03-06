<?php

require_once 'autoload.php'; 


class SectionDAO{
    function getAllSection($courseCode, $courseRunID){
        // input: $courseCode, $CourseRunID, $SectionID 
        // output: a list of Section Object of given courseCode and Course Run Code 
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Section WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        $result = [];
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = new Section($row["Course_Code"], $row["Course_Run_ID"], $row["Section_ID"], $row["Section_Name"]); 
            // $result[] = $row;
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function getQuizQuestion($courseCode, $courseRunID, $sectionID){
        // input: courseCode, courseRunID, $sectionID 
        // output: a list of qustions
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Question WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id AND Section_ID = :section_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":section_id", $sectionID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Question_Number"], $row["Question_Type"], $row["Question"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }

    function getQuizAnswer($courseCode, $courseRunID, $sectionID, $questionNumber){
        // input: courseCode, courseRunID, $sectionID, $questionNumber
        // output: a list of answers 
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Answer WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id AND Section_ID = :section_id AND Question_Number = :question_number;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":section_id", $sectionID, PDO::PARAM_STR); 
        $stmt->bindParam(":question_number", $questionNumber, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Question_number"], $row["Answer_Number"], $row["Answer"], $row["Is_Correct"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }
    function getAllMaterial($courseCode, $courseRunID, $sectionID){
        // input: courseCode, courseRunID, $sectionID 
        // output: a list of materials

        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Material WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id AND Section_ID = :section_id;"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":section_id", $sectionID, PDO::PARAM_STR); 
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Material_ID"], $row["Material"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 

    }

    function addMaterial($courseCode, $courseRunID, $sectionID, $materialID, $materialName, $material){
        // input: a material URL  to be added into the database 
        // output: True if success

        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "INSERT INTO Material (Course_Code, Course_Run_ID, Section_ID, Material_ID, Material_Name, Material) 
                VALUES          (:course_code, :course_run_id, :section_id, :material_id, :material_name, :material);"; 
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":section_id", $sectionID, PDO::PARAM_STR); 
        $stmt->bindParam(":material_id", $materialID, PDO::PARAM_STR); 
        $stmt->bindParam(":material_name", $materialName, PDO::PARAM_STR); 
        $stmt->bindParam(":material", $material, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }

    function updateMaterial($courseCode, $courseRunID, $sectionID, $materialID, $newMaterialName, $newMaterial){
        // input: a material URL  to be added into the database 
        // output: True if success

        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 
        $sql = "UPDATE Material 
                SET Material = :material, Material_Name = :material_name
                WHERE Course_Code = :course_code AND Course_Run_ID = :course_run_id
                AND Section_ID = :section_id AND Material_ID = :material_id;"; 
                
        $stmt = $pdo->prepare($sql); 

        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_id", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":section_id", $sectionID, PDO::PARAM_STR); 
        $stmt->bindParam(":material_id", $materialID, PDO::PARAM_STR); 
        $stmt->bindParam(":material_name", $newMaterialName, PDO::PARAM_STR); 
        $stmt->bindParam(":material", $newMaterial, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }

    function generateSectionById($empID, $courseCode, $courseRunID){
        $conn = new ConnectionManager(); 
        $pdo = $conn->getConnection(); 
        $sql = "SELECT * FROM Section s, Assignment a WHERE s.Course_Code=a.Course_Code AND s.Course_Run_ID=a.Course_Run_ID AND a.Instructor_ID=:empID AND s.Course_Code=:courseCode AND s.Course_Run_ID=:courseRunId;";
        // 1001
        $stmt = $pdo->prepare($sql); 
        $stmt->bindParam(":empID", $empID, PDO::PARAM_INT); 
        $stmt->bindParam(":courseCode", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":courseRunId", $courseRunID, PDO::PARAM_INT); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = [];
        $status = $stmt->execute(); 
        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }
        while($row = $stmt->fetch()){
            $result[] = [$row["Material_ID"], $row["Material"]]; 
        }
        $stmt->closeCursor();
        $pdo = NULL; 
        
        return $result; 
    }
    function getSectionByID($trainerID){

        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $sql = "SELECT c.Course_Name, s.Course_Code, s.Course_Run_ID, s.Section_ID FROM Section s, Assignment a, Course c WHERE s.Course_Code=a.Course_Code AND s.Course_Run_ID=a.Course_Run_ID AND c.Course_Code = s.Course_Code AND a.Instructor_ID =:trainerID;";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":trainerID", $trainerID, PDO::PARAM_INT);

        $result = [];

        if ($stmt->execute()) {
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
                $result[] = [
                    "CourseCode"=>$row['Course_Code'], 
                    "CourseRunID"=>$row['Course_Run_ID'], 
                    "SectionID"=>$row['Section_ID'],
                    "CourseName"=>$row['Course_Name']
                ];
            }
        }else{

        }
        $stmt = null;
        $conn = null;        
        
        return $result;
    }

    function addSection($section){
        // input: a section object to be added into the database 
        // output: True if success
        $conn = new ConnectionManager(); 
        $pdo = $conn-> getConnection(); 

        $sql = "INSERT INTO Section (Course_Code, Course_Run_ID, Section_ID, Section_Name) 
                VALUES          (:course_code, :course_run_ID, :section_id, :section_name);"; 
        $stmt = $pdo->prepare($sql); 
        
        $courseCode = $section->getCourseCode(); 
        $courseRunID = $section->getCourseRunID();
        $sectionID = $section->getSectionID(); 
        $sectionName = $section->getSectionName();
        $IsGraded = $section->getIsGraded(); 


        $stmt->bindParam(":course_code", $courseCode, PDO::PARAM_STR); 
        $stmt->bindParam(":course_run_ID", $courseRunID, PDO::PARAM_STR); 
        $stmt->bindParam(":section_id", $sectionID, PDO::PARAM_STR); 
        $stmt->bindParam(":section_name", $sectionName, PDO::PARAM_STR); 

        $status = $stmt->execute(); 

        if(!$status){
            var_dump($stmt->errorinfo());
            # output any error if database access has problem
        }

        $stmt->closeCursor(); 
        $pdo = NULL; 
        return $status; 
    }

}

?>