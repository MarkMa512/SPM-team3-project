<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Section</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function(){
          $('#nav').load("./common/navbarTrainer.php");
          console.log("click");
        });
    </script>

    <script>
       $(function(){
         $('.datepicker').datepicker({
         format: 'mm-dd-yyyy'
       });
     });
    </script>


</head>
<body>

    <div id="nav"></div>
     <br>
    <div class="container">
      <h5>Create New Section</h5>
      <br>

       <form id='addCourseRunForm' method="post"> 
         <input type="text" name="courseCode" value='<?php echo $_GET['courseCode'];?>' hidden>
         <input type="text" name="courseRunID" value='<?php echo $_GET['courseRunID'];?>' hidden>
        <div class="form-group">
            <label for="code">Section ID:</label>
            <input type="text" class="form-control" id="code" placeholder="Enter Section ID" name="sid" require>
        </div>
        <div class="form-group">
            <label for="sname">Section Name:</label>
            <input type="text" class="form-control" id="capacity" placeholder="Enter Section Name" name="sname" require>
        </div>
        
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
    </form>
      
    </div>
     <?php
     require_once "../../Class/autoload.php";
      // var_dump($_POST);
      if($_POST){

        $sectionDAO = new SectionDAO();
        $sectionDAO->addSection(new Section($_POST['courseCode'], $_POST['courseRunID'],$_POST['sid'],$_POST['sname']));
        header("Location:./ViewCourseTrainer.html");
        exit();
      }

     ?>


</body>

</html>
