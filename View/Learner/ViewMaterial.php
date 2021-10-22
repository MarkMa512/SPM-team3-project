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

    <div id="nav"></div>

    <br>
         <div class="container">
       <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Materials</h6>
        <br>
        <div class="card">
          <div class="card-header">
            IS112
          </div>
        <div class="card-body">
          <h5 class="card-title">Section 1</h5>
          <p class="card-text">Begin Your Service Journey</p>
          <a href="#" class="btn btn-primary">Download</a>
            </div>
        </div>
        <br>

        <div class="card">
          <div class="card-header">
            IS112
          </div>
        <div class="card-body">
          <h5 class="card-title">Section 2</h5>
          <p class="card-text">Intro to Ink Printers</p>
          <a href="#" class="btn btn-primary">Download</a>
            </div>
        </div>
        <br>

        <div class="card">
          <div class="card-header">
            IS112
          </div>
        <div class="card-body">
          <h5 class="card-title">Section 3</h5>
          <p class="card-text">Different types of Ink Printers</p>
          <a href="#" class="btn btn-primary">Download</a>
            </div>
        </div>
   
      </div>
    </div>


</body>

</html>
