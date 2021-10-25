<?php
   if(isset($_FILES['image']) && isset($_POST['user'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_names = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower($file_names[sizeof($file_names)-1]);
      var_dump($file_ext);
      $extensions= array("jpeg","jpg","png", "docx", "pptx", "zip", "ppt", "pdf");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG, file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      // for user to create the file first time 
      if (!file_exists("./Files/{$_POST['user']}/")) {
        mkdir("./Files/{$_POST['user']}/", 0777, true);
    }
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"Files/{$_POST['user']}/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">

          Username: <input type="text" name="user"> <br>
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body>
</html>