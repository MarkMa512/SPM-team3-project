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
          $('#nav').load("navbarTrainer.php");
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
     <div class="container">
        <div class="row mapD">
            <h6 class="border-bottom border-gray pb-2 mb-0">Manage Materials</h6>
        </div>
        <br>
        
        <div id="datatable">
            <!-- example -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Course Name</th>
                      <th scope="col">Material</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <th scope="row">IS112-S1</th>
                      <td scope="row">Begin Your Service Journey</td>
                      <td><button class="btn btn-outline-primary">Delete</button></td>
                    </tr>
                    <tr>
                      <th scope="row">IS112-S1</th>
                      <td scope="row">Intro to Ink Printers</td>
                      <td><button class="btn btn-outline-primary">Delete</button></td>
                    </tr>
                    <tr>
                      <th scope="row">IS112-S1</th>
                      <td scope="row">Different types of Ink Printers</td>
                      <td><button class="btn btn-outline-primary">Delete</button></td>

                    </tr>
                  </tbody>
            </table>

            <a class="btn btn-outline-primary btn-primary" href="CreateCourse.html" role="button">Upload New Material</a>

        </div>
        
    </div>


        <div class="footer-basic">
        <footer>
          
            <p class="copyright">LMS - Group 3 © 2021</p>
        </footer>
    </div>


</body>

</html>