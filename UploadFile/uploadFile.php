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
         $errors[]="extension not allowed, please choose a png, docx, pptx, jpeg, zip, ppt, pdf or jpg, file.";
      }
      
      if($file_size > 104857600){
         $errors[]='File size must no more than 100 MB';
      }
      // for user to create the file first time 
      if (!file_exists("./Files/{$_POST['user']}/")) {
        mkdir("./Files/{$_POST['user']}/", 0777, true);
    }
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"./Files/{$_POST['user']}/".$file_name);
         echo "Files/{$_POST['user']}/$file_name"; // stored this for users to download and refers to viewFiles to get the sense of downloading 
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action="submit" method="POST" enctype="multipart/form-data">

          Username: <input type="text" name="user"> <br>
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body>
</html>