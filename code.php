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
            $branch=$row['0'];
            $rollno=$row['1'];
            $registerno=$row['2'];
            $name=$row['3'];
            $gender=$row['4'];
            $categoty=$row['5'];
            $academicYear =$row['6'];
            $bday=$row['7'];
            $motherName=$row['8'];
            $birthPlace=$row['9'];
            $instituteLastAttended=$row['10'];
            $admDate=$row['11'];
            $studentQuery="INSERT INTO  studinfo(branch,rollno,registerno,name,gender,categoty,academicYear,bday,motherName,birthPlace,instituteLastAttended,admDate)  VALUES (' $branch','$rollno',' $registerno','$name','$gender','$categoty','$academicYear','$bday','$motherName','$birthPlace','$instituteLastAttended','$admDate')";
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