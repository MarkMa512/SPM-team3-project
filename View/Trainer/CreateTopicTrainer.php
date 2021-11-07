<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Topic</title>
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
    <div class="row">
            <h6 class="border-bottom border-gray pb-2 mb-0">Create New Topic</h6>
        </div>
        <br>
        <form method="POST">
          <div class="form-group">
            <label for="topic">Topic:</label>
            <input type="topic" class="form-control" id="topic" placeholder="Topic" name="topic" require>
          
          </div>
          <div class="form-group">
             <label for="exampleInputPassword1">Content:</label>
             <input type="content"class="form-control" id="content" name="content" require>
          </div>
  
             <button type="submit" class="btn btn-primary">Submit</button>
        </form>    

    </div>
    </div>





</body>
<?php 
require_once "../../Class/autoload.php";
session_start();
var_dump($_POST);
if($_POST){
  $postDAO = new PostDAO();
  $result = $postDAO->newPost($_POST["topic"], $_POST["content"], $_SESSION["userID"]);
  // header("Location:./ForumLearner.html");
  // exit();
  var_dump($result);
  header("Location:./ForumTrainer.html");
  exit(); 
}


?>
</html>


</body>

</html>
