<?php 
  $mydir = './Files'; 
  
  $myfiles = array_diff(scandir($mydir), array('.', '..')); 
  //   will get you all the files and folders that
  
  var_dump($myfiles);
?> 
<!-- downloda method -->
<a href="./Files/S10 Chp 06 Followership and LMX (3).pptx">download</a>