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
          $('#nav').load("navbarLearner.php");
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
      session_start();
      require_once "../../Class/autoload.php";
      $empDao = new EmployeeDAO();
      $_SESSION["user"] = $empDao->getEmp(2001);
      
      $_SESSION["userID"] = $_SESSION["user"]->getEmpID();
      var_dump($_SESSION);
    ?>
    <div id="nav"></div>

    <!-- picture can edit -->
    <br>
    <div class="container">
        <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">Announcement</h5>
              <p class="card-text">There will be new courses due to new models or updates. We would
                    introduce a new course. We can retire a course if the team does not foresee the course
                    being offered again. The list of courses are maintained by the administrators of the systems.
                    They will decide internally and update or create within the LMS.</p> 
              <img class="card-img-top" style="width: 400px; height:auto;" src="../img/home.jfif" alt="">
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>

        </div>
        
    </div>
    


        <div class="footer-basic">
        <footer>
          
            <p class="copyright">LMS - Group 3 © 2021</p>
        </footer>
    </div>


</body>

</html>