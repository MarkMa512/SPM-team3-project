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

    <div id="nav"></div>

    <!-- picture can edit -->
    <br>
     <div class="container">
        <div class="row mapD">
            <h6 class="border-bottom border-gray pb-2 mb-0">Assign Class</h6>
        </div>
        <br>
        
        <div id="datatable">
            <!-- example -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Course ID</th>
                      <th scope="col">Course Name</th>
                      <th scope="col">Section</th>
                      <th scope="col">Start Date</th>
                      <th scope="col">Avaiable Slots</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <th scope="row">IS112-S1</th>
                      <td>Intro to Database</td>
                      <td>Section 1</td>
                      <td>2021-12-1</td>
                      <td>20</td>
                      <td><button class="btn btn-outline-primary">Assign</button></td>
                    </tr>
                    <tr>
                      <th scope="row">IS112-S1</th>
                      <td>Intro to Database</td>
                      <td>Section 2</td>
                      <td>2021-12-10</td>
                      <td>10</td>
                      <td><button class="btn btn-outline-primary">Assign</button></td>
                    </tr>
                    <tr>
                      <th scope="row">IS112-S1</th>
                      <td>Web App Development</td>
                      <td>Section 3</td>
                      <td>2021-12-20</td>
                      <td>1</td>
                      <td><button class="btn btn-outline-primary">Assign</button></td>

                    </tr>
                  </tbody>
            </table>

        </div>
        
    </div>


        <div class="footer-basic">
        <footer>
          
            <p class="copyright">LMS - Group 3 © 2021</p>
        </footer>
    </div>


</body>

</html>