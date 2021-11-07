<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="shortcut icon" type="image/x-icon" href="../img/logo2.png" />

    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #7395AE;">
       <a class="navbar-brand" href="./HomeTrainer.html"><img src="../img/logo2.png" alt="Logo" style="width: 45px; height:auto;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <button class="navbar-toggler" type="button" data-toggle="collapse"  aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="HomeTrainer.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="ViewCourseTrainer.html">Class Management</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="ViewProgress.php">View Progress</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="SectionListForQuiz.html">Quiz Management</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="ManageMaterial.html">Material Management</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="ForumTrainer.html">Forum</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="ChatToLearner.html">Chat With Learners</a>
          </li>
          
         
        
        </ul>
        <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form>
      </div>
      <div class="nav-item my-2 my-lg-0">
        <a class="nav-item nav-link text-light" href="../signin.php"><?php
        require_once "../../../Class/autoload.php";
        session_start();


        $empDao = new EmployeeDAO();
        $_SESSION["user"] = $empDao->getEmp(1001);
        $_SESSION["userID"] = 1001;
        if($_SESSION){
          echo "Hi " . $_SESSION['user']->getEmpLastName();
        }else{
          echo "Log In";
        }
        
        ?></a>
      </div>
    </nav>
