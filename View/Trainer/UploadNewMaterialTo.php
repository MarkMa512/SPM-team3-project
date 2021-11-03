<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload New Material</title>
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
        <div class="row mapD">
            <h6 class="border-bottom border-gray pb-2 mb-0">Upload New Material</h6>
        </div>
         
             <div id="datatable">
         
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Course ID</th>
                      <th scope="col">Course Run ID</th>
                      <th scope="col">Course Name</th>
                      <th scope="col">Section</th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                      <th scope="row">PT101</th>
                      <td>1</td>
                      <td>Intro to Ink Printers</td>
                      <td>Section 1</td>
                    </tr>
                    
                  </tbody>
            </table>

        </div>

        <form  method="POST" enctype="multipart/form-data">
     
              <div>
                <label for="formFileLg" class="form-label">Upload New Material</label>
                 <input class="form-control form-control-sm" name="formFileLg" type="file" multiple/>
              </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <br>
        </form>
        </div>
        <br>
            
        <a href="Files/SR101/1/1/1/Presentaiton3_research_.pdf">download</a>
<?php

var_dump($_GET);
if(isset($_FILES['formFileLg']) && $_GET){
  $errors= array();
  $file_name = str_replace(" ", "", $_FILES['formFileLg']['name']);
  $file_size =$_FILES['formFileLg']['size'];
  $file_tmp =$_FILES['formFileLg']['tmp_name'];
  $file_type=$_FILES['formFileLg']['type'];
  $file_names = explode('.',$_FILES['formFileLg']['name']);
  $file_ext=strtolower($file_names[sizeof($file_names)-1]);
  var_dump($file_ext);
  $extensions= array("jpeg","jpg","png", "docx", "pptx", "zip", "ppt", "pdf");
  
  if(in_array($file_ext,$extensions)=== false){
     $errors[]="extension not allowed, please choose a png, docx, pptx, jpeg, zip, ppt, pdf or jpg, file.";
  }
  
  if($file_size > 104857600){
     $errors[]='File size must no more than 100 MB';
  }
  // for user to create the file first time 
  if (!file_exists("./../Files/{$_GET['cid']}/{$_GET['crid']}/{$_GET['sid']}/{$_GET['mid']}/")) {
    mkdir("./../Files/{$_GET['cid']}/{$_GET['crid']}/{$_GET['sid']}/{$_GET['mid']}/", 0777, true);
  }
  if(empty($errors)==true){
     move_uploaded_file($file_tmp,"./../Files/{$_GET['cid']}/{$_GET['crid']}/{$_GET['sid']}/{$_GET['mid']}/".$file_name);
     echo "./../Files/{$_GET['cid']}/{$_GET['crid']}/{$_GET['sid']}/{$_GET['mid']}/$file_name"; // stored this for users to download and refers to viewFiles to get the sense of downloading 
     echo "Success";
  }else{
     print_r($errors);
  }
}
?>

</body>

</html>
