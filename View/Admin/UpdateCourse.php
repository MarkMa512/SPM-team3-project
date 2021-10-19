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
          $('#nav').load("navbarAdmin.html");
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
      <h5>Edit Course</h5>
      <br>

       <form id='addCourseForm'> 
        <div class="form-group">
            <label for="code">Course Code</label>
            <input type="text" class="form-control" id="code" placeholder="PT101">
        </div>
        <div class="form-group">
            <label for="name">Course Name</label>
            <input type="text" class="form-control" id="name" placeholder="Intro to Ink Printers">
        </div>
        <div class="form-group">
            <label for="badgeName">Price</label>
            <input type="text" class="form-control" id="badgeName" placeholder="Ink Badge">
        </div>
        <div>
            <label for="formFileLg" class="form-label">Badge Image</label>
           <input class="form-control form-control-sm" id="formFileLg" type="file" />
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
    </form>
      
    </div>

        <div class="footer-basic">
        <footer>
          
            <p class="copyright">LMS - Group 3 © 2021</p>
        </footer>
    </div>


</body>

</html>