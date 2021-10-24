<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function(){
          $('#nav').load("./common/navbarAdmin.php");
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
      <?php
          require_once "../../Class/autoload.php";
          $courseRunDAO = new CourseRunDAO();
          // var_dump($empDAO->getAllInstructors());
          $courseRuns = $courseRunDAO->displayAllCourseRun();
          
          session_start();

        ?>
    <div id="nav"></div>

    <!-- picture can edit -->
    <br>
     <div class="container">
        <div class="row mapD">
            <h6 class="border-bottom border-gray pb-2 mb-0">Enrollment Class</h6>
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
                      <th scope="col">Avaiable Slots</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($courseRuns as $courseRun){
                    // remove section <td>Section 1</td>
                    echo "
                    <tr>
                      <th scope=\"row\">{$courseRun[0]}</th>
                      <td>{$courseRun[2]}</td>
                      <td>{$courseRun[1]}</td>
                      <td>{$courseRun[4]}</td>
                      <td>{$courseRun[3]}</td>
                      <td><a href=\"./postData/EnrollLearnerProcess.php?empID={$_GET['empID']}&CourseID={$courseRun[0]}&CourseRUNID={$courseRun[2]}\"><button class=\"btn btn-outline-primary\">Assign</button></a></td>
                    </tr>
                    
                    ";
                  }



                  ?>
                    
                  </tbody>
            </table>

        </div>
        
    </div>
    <?php 

      if(isset($_SESSION['error_msg'])){
        echo "<div class='alert alert-danger' role='alert'>
          {$_SESSION['error_msg']}</div>";
          unset($_SESSION['error_msg']);
      }
    ?>


        <div class="footer-basic">
        <footer>
          
            <p class="copyright">LMS - Group 3 © 2021</p>
        </footer>
    </div>


</body>

</html>