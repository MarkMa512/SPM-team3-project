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
          $('#nav').load("navbarAdmin.php");
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
          $empDAO = new EmployeeDAO();
          // var_dump($empDAO->getAllInstructors());
          $instructors = $empDAO->getAllInstructors();
        ?>
    <div id="nav"></div>

    <!-- picture can edit -->
    <br>
    <div class="container">
       <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">List of Employees</h6>

        <?php
        foreach($instructors as $instructor){
          $empID = $instructor->getEmpID();
          $name = $instructor->getEmpFirstName(). " " .$instructor->getEmpLastName();


          echo "<div class=\"media text-muted pt-3\">
          <img data-src=\"holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1\" alt=\"\" class=\"mr-2 rounded\">
          <div class=\"media-body pb-3 mb-0 small lh-125 border-bottom border-gray\">
            <div class=\"d-flex justify-content-between align-items-center w-100\">
              <strong class=\"text-gray-dark\">{$empID}</strong>
              <a href=\"AssignTo.php?empID={$empID}\">Assign</a>
            </div>
            <span class=\"d-block\">{$name}</span>
          </div>
        </div>";
        }
        ?>
        
        
        <!--
          <small class="d-block text-right mt-3">
          <a href="#">All Class</a>
        </small>
        -->
      </div>
    </div>


        <div class="footer-basic">
        <footer>
          
            <p class="copyright">LMS - Group 3 © 2021</p>
        </footer>
    </div>


</body>

</html>