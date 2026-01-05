<?php
session_start();
$con =mysqli_connect('localhost','root','','excelimport');
   require 'vendor/autoload.php';

   use PhpOffice\PhpSpreadsheet\Spreadsheet;
   use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
   

  if(isset($_POST['submit']))
  {
      $fileName=$_FILES['import_file']['name'];
      $file_ext=pathinfo($fileName,PATHINFO_EXTENSION);
      $allowed_ext =['xls','csv','xlsx'];

      if(in_array($file_ext, $allowed_ext))
      {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data=$spreadsheet->getActiveSheet()->toArray();

        $count="0";
        foreach($data as $row)
        {
          if($count>0)
          { 
            $id=$row['0'];
            $branch=$row['1'];
            $rollno=$row['2'];
            $registerno=$row['3'];
            $name=$row['4'];
            $gender=$row['5'];
            $category=$row['6'];
            $academicYear=$row['7'];
            $bday=$row['8'];
            $mothername=$row['9'];
            $birthPlace=$row['10'];
            $institutelastattended=$row['11'];
          
            $studentQuery="INSERT INTO  students(id,branch,rollno,registerno,name,gender,category,academicYear,bday,mothername,birthPlace,institutelastattended)  VALUES (' $id',' $branch',' $rollno',' $registerno','$name','$gender',' $category','$academicYear',' $bday','$mothername',' $birthPlace','$institutelastattended')";
            $result=mysqli_query($con, $studentQuery);
            $msg=true;

          }
          else{
            $count="1";
          }
        
        }
        if(isset($msg))
        {
          $_SESSION['message']="Successfully imported";
          header('Location:importindex.php');
          exit(0);
        }
        else
        {
          $_SESSION['message']="Not imported";
          header('Location:importindex.php');
          exit(0);
        }
      }
      else
      {
        $_SESSION['message']= "Invalid File";
        header('Location:importindex.php');
        exit(0);
      }


  }
 
  

?>