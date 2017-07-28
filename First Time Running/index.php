

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName="db_examportal";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE `$dbName`";
if (mysqli_query($conn, $sql)) {
  $flag=0;
    echo "Database created successfully<br/>";
    $connect=mysqli_connect($servername,$username,$password,$dbName);
    $sql="CREATE TABLE `$dbName`.`organizations` ( `orga` VARCHAR(255) NOT NULL , PRIMARY KEY (`orga`)) ENGINE = MyISAM";
    if(!mysqli_query($connect,$sql))
    {
      $flag=1;
    }
    $sql="CREATE TABLE `$dbName`.`category` ( `catName` VARCHAR(255) NOT NULL , `status` VARCHAR(255) NOT NULL , `markQuestCorrect` INT(255) NOT NULL DEFAULT '3' , `markQuestIncorrect` INT(255) NOT NULL DEFAULT '0' , `totTime` VARCHAR(255) NOT NULL DEFAULT '1800' , `organization` VARCHAR(255) NOT NULL DEFAULT 'ADMIN' , PRIMARY KEY (`catName`)) ENGINE = MyISAM";
    if(!mysqli_query($connect,$sql))
    {
      $flag=1;
    }
    $sql="CREATE TABLE `$dbName`.`admin_login` ( `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `organization` VARCHAR(255) NOT NULL DEFAULT 'ADMIN' , PRIMARY KEY (`email`)) ENGINE = MyISAM";
    if(!mysqli_query($connect,$sql))
    {
      $flag=1;
    }
    $sql="INSERT INTO `admin_login`(`email`, `password`) VALUES ('admin','admin')";
    if(!mysqli_query($connect,$sql))
    {
      $flag=1;
    }
    $sql="CREATE TABLE `$dbName`.`student_login` ( `fname` VARCHAR(255) NOT NULL , `dob` DATE NOT NULL , `phone` VARCHAR(100) NULL DEFAULT NULL , `gender` VARCHAR(10) NULL DEFAULT NULL , `organization` VARCHAR(255) NOT NULL , `qualification` VARCHAR(255) NULL DEFAULT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`organization`, `email`)) ENGINE = MyISAM";
    if(!mysqli_query($connect,$sql))
    {
      $flag=1;
    }
    $sql="CREATE TABLE `$dbName`.`teacher_login` ( `fname` VARCHAR(255) NOT NULL , `dob` DATE NOT NULL , `phone` VARCHAR(100) NULL DEFAULT NULL , `gender` VARCHAR(10) NULL DEFAULT NULL , `organization` VARCHAR(255) NOT NULL , `qualification` VARCHAR(255) NULL DEFAULT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`organization`, `email`)) ENGINE = MyISAM";
    if(!mysqli_query($connect,$sql))
    {
      $flag=1;
    }
    $sql="CREATE TABLE `$dbName`.`temp_teacher` ( `fname` VARCHAR(255) NOT NULL , `dob` DATE NOT NULL , `phone` VARCHAR(100) NULL DEFAULT NULL , `gender` VARCHAR(10) NULL DEFAULT NULL , `organization` VARCHAR(255) NOT NULL , `qualification` VARCHAR(255) NULL DEFAULT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`organization`, `email`)) ENGINE = MyISAM";
    if(!mysqli_query($connect,$sql))
    {
      $flag=1;
    }
    if($flag==1)
    {
      echo "Table creation error";
    }
    else {
      echo "All tables ready and activated for use";
      header('Location:index1.php?success=1');
    }
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($connect);
mysqli_close($conn);
?>
