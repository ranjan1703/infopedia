<?php
include_once("dbconnect.php");
session_start();
$mail=$_SESSION['mail'];
if(isset($_POST['start']))
{
  $CAT=$_POST['start'];
  $sqlTime="SELECT `totTime` FROM `category` WHERE `catName`='$CAT'";
  $rsltTime=mysqli_query($connect,$sqlTime);
  $rowTime=mysqli_fetch_assoc($rsltTime);
  $currentTime=strtotime(date("h:i:sa"));
  $setTime=$rowTime["totTime"];
  $_SESSION['TIMER']=$setTime+$currentTime;

  $newTab=$mail.$CAT;
  $sqlT="CREATE TABLE `db_examportal`.`$newTab` ( `questno` INT(255) NOT NULL , `quest` VARCHAR(255) NOT NULL , `opt1` VARCHAR(255) NOT NULL , `opt2` VARCHAR(255) NOT NULL , `opt3` VARCHAR(255) NOT NULL , `opt4` VARCHAR(255) NOT NULL , `marked` INT(1) NULL , `postiveMarks` INT(10) NOT NULL , `negetiveMarks` INT(10) NOT NULL , PRIMARY KEY (`questno`)) ENGINE = MyISAM;";
  if(mysqli_query($connect,$sqlT))
  {
    header('Location:start_exam.php');
  }
  else {
    header('Location:giveExam.php?given=1');
  }
}
elseif (isset($_GET['given'])) {
  $CAT=$_SESSION['CATEGORY'];
  $sqlT="UPDATE `$mail` SET `given`='1' WHERE `catName`='$CAT'";
  if(mysqli_query($connect,$sqlT))
  {
    unset($_SESSION['TIMER']);
  }
  header('Location:giveExam.php?given=1');
}

 ?>
