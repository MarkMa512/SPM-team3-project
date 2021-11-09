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
                  <?php 
                    if(isset($_GET['cid'])){
                      echo "
                      <tr>
                        <th scope='row'>{$_GET['cid']}</th>
                        <td>{$_GET['crid']}</td>
                        <td>{$_GET['cname']}</td>
                        <td>Section {$_GET['sid']}</td>
                      </tr>
                      ";
                    }else if(isset($_GET['courseCode'])){
                      echo "
                      <tr>
                        <th scope='row'>{$_GET['courseCode']}</th>
                        <td>{$_GET['courseRunID']}</td>
                        <td>{$_GET['CourseName']}</td>
                        <td>Section {$_GET['SectionID']}</td>
                      </tr>
                      ";
                    }
                  
                  
                  ?>
                     
                    
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
            
        <!-- <a href="Files/SR101/1/1/1/Presentaiton3_research_.pdf">download</a> -->
<?php
require_once "../../Class/autoload.php";
session_start();
// var_dump($_GET);
if(isset($_FILES['formFileLg']) && isset($_GET['cid'])){
  $errors= array();
  $file_name = str_replace(" ", "", $_FILES['formFileLg']['name']);
  $file_size =$_FILES['formFileLg']['size'];
  $file_tmp =$_FILES['formFileLg']['tmp_name'];
  $file_type=$_FILES['formFileLg']['type'];
  $file_names = explode('.',$_FILES['formFileLg']['name']);
  $file_ext=strtolower($file_names[sizeof($file_names)-1]);
  // var_dump($file_ext);
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
     $sectionDAO = new SectionDAO();
     $sectionDAO->updateMaterial($_GET['cid'], $_GET['crid'], $_GET['sid'], $_GET['mid'], $file_name, "./../Files/{$_GET['cid']}/{$_GET['crid']}/{$_GET['sid']}/{$_GET['mid']}/$file_name");
     //echo "./../Files/{$_GET['cid']}/{$_GET['crid']}/{$_GET['sid']}/{$_GET['mid']}/$file_name"; // stored this for users to download and refers to viewFiles to get the sense of downloading 
    //  echo "Success";
    header("Location:./ManageMaterial.html");
    exit();
  }
}
if(isset($_FILES['formFileLg']) && isset($_GET['courseCode'])){
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
  if (!file_exists("./../Files/{$_GET['courseCode']}/{$_GET['courseRunID']}/{$_GET['SectionID']}/1/")) {
    mkdir("./../Files/{$_GET['courseCode']}/{$_GET['courseRunID']}/{$_GET['SectionID']}/1/", 0777, true);
  }
  if(empty($errors)==true){
     move_uploaded_file($file_tmp,"./../Files/{$_GET['courseCode']}/{$_GET['courseRunID']}/{$_GET['SectionID']}/1/".$file_name);
     $sectionDAO = new SectionDAO();
     $sectionDAO->addMaterial($_GET['courseCode'], $_GET['courseRunID'], $_GET['SectionID'], 1, $file_name, "./../Files/{$_GET['courseCode']}/{$_GET['courseRunID']}/{$_GET['SectionID']}/1/$file_name");
     //echo "./../Files/{$_GET['cid']}/{$_GET['crid']}/{$_GET['sid']}/{$_GET['mid']}/$file_name"; // stored this for users to download and refers to viewFiles to get the sense of downloading 
    //  echo "Success";
    header("Location:./ManageMaterial.html");
    exit();
  }
}
?>

</body>

</html>
