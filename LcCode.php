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
            $srno=$row['0'];
            $Roll_No=$row['1'];
            $register_no=$row['2'];
            $fullname=$row['3'];
            $mother_name=$row['4'];
            $Race=$row['5'];
            $caste_SubCaste=$row['6'];
            $Nationality=$row['7'];
            $place_of_birth=$row['8'];
            $state=$row['9'];
            $Date_of_Birth=$row['10'];
            $Birth_in_word=$row['11'];
            $last_school=$row['12'];
            $adm_date=$row['13'];
            $progress=$row['14'];
            $conduct=$row['15'];
            $leaving_date=$row['16'];
            $diploma_year=$row['17'];
            $course=$row['18'];
            $since_when=$row['19'];
            $reason=$row['20'];
            $remark=$row['21'];
           
           
          
            $studentQuery="INSERT INTO lcdata(srno,Roll_No,register_no,fullname,mother_name,Race,caste_SubCaste,Nationality,place_of_birth,state,Date_of_Birth,Birth_in_word,last_school,adm_date,progress,conduct,leaving_date,diploma_year,course,since_when,reason,remark)  VALUES ('$srno','$Roll_No','$register_no','$fullname','$mother_name',' $Race','$caste_SubCaste','$Nationality','$place_of_birth','$state','$Date_of_Birth','$Birth_in_word','$last_school','$adm_date','$progress',' $conduct',' $leaving_date','$diploma_year','$course','$since_when','$reason',' $remark')";
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