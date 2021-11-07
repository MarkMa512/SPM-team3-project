<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload New Materials</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function(){
          $('#nav').load("./common/navbarTrainer.php");
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

    <br>
     <div class="container">
        <div class="row mapD">
            <h6 class="border-bottom border-gray pb-2 mb-0">Upload New Material</h6>
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
                      <th scope="col">Section</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  require_once "../../Class/autoload.php";
                  session_start();
                  $sectionDAO = new SectionDAO();
                  // var_dump($_SESSION);
                  $sections = $sectionDAO->getSectionByID($_SESSION['user']->getEmpID());
                  foreach($sections as $section){
                    echo "
                    
                    <tr>
                      <th scope='row'>{$section['CourseCode']}</th>
                      <td>{$section['CourseRunID']}</td>
                      <td>{$section['CourseName']}</td>
                      <td>Section {$section['SectionID']}</td>
                      <td><a class='btn btn-outline-primary btn-primary' href=\"UploadNewMaterialTo.php?courseCode={$section['CourseCode']}&courseRunID={$section['CourseRunID']}&SectionID={$section['SectionID']}&CourseName={$section['CourseName']}\" role='button'>Upload</a></td>
                    </tr>
                    ";
                  }
                  ?>
                  </tbody>
            </table>

        </div>
        
    </div>




</body>

</html>
