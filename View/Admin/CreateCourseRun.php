<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create CourseRun</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function(){
          $('#nav').load("./common/navbarAdmin.php");
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
      <h5>Create New Course Run</h5>
      <br>
        
       <form id='addCourseRunForm' method="post" action="./postData/createCourseRunProcess.php"> 
       <input type="text" name="coursecode" value="<?php echo $_GET["coursecode"];?>" hidden>
        <div class="form-group">
            <label for="code">Course Run ID:</label>
            <input type="text" class="form-control" id="code" placeholder="Enter ourse Run ID" name="courseRunID">
        </div>
        <div class="form-group">
            <label for="name">Capacity:</label>
            <input type="number" class="form-control" id="capacity" placeholder="Enter Capacity" name="capacity">
        </div>
        
        <div class="form-group">
            <label for="name">Start Date:</label>
		    <input type="text" class="form-control datepicker" placeholder="Select Date" name="sDate"/>
	    </div>

        <div class="form-group">
            <label for="name">End Date:</label>
		    <input type="text" class="form-control datepicker" placeholder="Select Date" name="eDate"/>
	    </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
    </form>
      
    </div>



</body>

</html>

