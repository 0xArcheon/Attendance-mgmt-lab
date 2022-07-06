<?php
   $s_name = $_POST["s_name"];
   $department = $_POST["department"];
   $admission_yr = $_POST["admission_yr"];
   $s_gender = $_POST["s_gender"];
   echo "<h4><strong>Student Name: </strong>", $s_name, "</h4><br>";
   echo "<h4><strong>Student Department: </strong>", $department, "</h4><br>";
   echo "<h4><strong>Admission Year: </strong>", $admission_yr, "</h4><br>";
   echo "<h4><strong>Gender: </strong>", $s_gender, "</h4><br>";   
?>