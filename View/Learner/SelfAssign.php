<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self-Enrollment</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function(){
          $('#nav').load("./common/navbarLearner.php");
          console.log("click");
        });
    </script>

      <style>
          .footer-basic {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding:40px 0;
        background-color:#ffffff;
        color:#4b4c4d;
        }


        .footer-basic .copyright {
         margin-top:15px;
         text-align:center;
         font-size:13px;
         color:#aaa;
         margin-bottom:0;
        }
  </style>

</head>
<body>
      
    <div id="nav"></div>

    <!-- picture can edit -->
    <br>
     <div class="container" id="app">
        <div class="row mapD">
            <h6 class="border-bottom border-gray pb-2 mb-0">Self-Enrollment</h6>
        </div>
        <br>
        
        <div id="datatable">
            <!-- example -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Course ID</th>
                      <th scope="col">Course Run ID</th>
                      <th scope="col">Course Name</th>
                      <!-- <th scope="col">Section</th> -->
                      <th scope="col">Start Date</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                    session_start();
                    require_once "../../Class/autoload.php";
                    $learnerDAO = new LearnerDAO();
                    $attendedCourse = $learnerDAO->getAllAttendCourseByUserId($_SESSION["userID"]);
                    $noAttendedCourse = $learnerDAO->getAllNotAttendCourseByUserId($_SESSION["userID"]);
                    // var_dump($attendedCourse);
                    // var_dump($noAttendedCourse);
                    $courseDAO = new CourseDAO();
                    $self_assign_course = [];
                    foreach($noAttendedCourse as $course){
                        $prerequisite = $courseDAO->getPrerequisite($course);
                        // var_dump($prerequisite);
                        if(sizeof($prerequisite) == 0){
                            $self_assign_course[] = $course;
                        }else{
                            $allow = true;
                            foreach($prerequisite as $eachCourse){
                                if(!in_array($eachCourse, $attendedCourse)){
                                    $allow = false;
                                    break;
                                }
                            }if($allow){
                                $self_assign_course[] = $course;
                            }
                        }
                    }
                    // var_dump($self_assign_course);
                    
                    $result = [];
                    $courseRunDao = new CourseRunDAO();
            
                    foreach($self_assign_course as $course){
                        // var_dump($course);
                        $name = $courseDAO->getCourseByID($course)->getCourseName();
                        foreach($courseRunDao->getCourseRun($course) as $courseRun){
                            $result[] = [
                                "CourseName"=>$name,
                                "CourseRunID"=>$courseRun->getCourseRunID(),
                                "CourseID"=>$courseRun->getCourseCode(),
                                "StartTime"=>$courseRun->getStartDate()
                            ];
                        }
                    }
                    foreach($result as $info){
                      echo"
                      <tr>
                      <th scope='row'>{$info['CourseID']}</th>
                      <td>{$info['CourseRunID']}</td>
                      <td>{$info['CourseName']}</td>
                      <td>{$info['StartTime']}</td>
                      <td><a href='./postData/selfAssignProcess.php?courseID={$info['CourseID']}&courseRunID={$info['CourseRunID']}'><button class='btn btn-outline-primary'>Enrol</button></a></td>
                    </tr>
                      ";
                    }
                    if(sizeof($result) == 0){
                      echo "<tr><td colspan='6' class='text-center'>No self-assign class</td></tr>";
                    }
                  ?>
                  
                    <!-- <tr>
                      <th scope="row">PT101</th>
                      <td>1</td>
                      <td>Intro to Ink Printers</td>
                      <td>2021-01-15</td>
                      <td>50</td>
                      <td><a><button class="btn btn-outline-primary">Enrol</button></a></td>
                    </tr>
                   -->
                  



                  </tbody>
            </table>

        </div>
        
    </div>




</body>

</html>
