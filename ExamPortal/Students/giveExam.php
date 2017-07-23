<?php
session_start();
if(isset($_SESSION['fname']))
{
  $fname=$_SESSION['fname'];
  $email=$_SESSION['mail'];
  ?>
<html xmlns="http://www.w3.org/1999/html">
<head>
  <title>
    Exam Options
  </title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="vendor/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <script>
  function validate()
  {
    var opt=document.getElementById('categorySelect').value;
    if(opt=="Select Category" || opt=="No Category Available")
    {
      alert("Request cannot be processed");
      off();
      return false;
    }
    else {
      on();
      return true;
    }
  }
  function start()
  {
    if(confirm("The exam will end only when user prompts or time ends.")==true)
    {
      return true;
    }
    else {
      return false;
    }
  }
  function on() {
    document.getElementById("dispCatDet").style.display = "table";
  }
  function off(){
    document.getElementById("dispCatDet").style.display = "none";
  }
  </script>
  <style>
  #cat_select{
    margin-top: 5%;
  }
  #dispCatDet{
    position: relative;
    width:500px;
    height: 400px;
    top: 10%;
    left: 35%;
    background-color: rgba(253, 254, 254,1);
    box-shadow: 20px 15px 50px 10px #AAB7B8;
    border-radius:10% 10% 0px 0px;
  }
  #start{
    position: relative;
    font-size: 25px;
    border-radius: 5px;
    color: white;
    background-color: #3498DB;
    width: 100%;
    padding:15px;
    transition-duration: 1s;
  }
  #start:hover{
    background-color: #002DFF;
  }
  #catDet{
    font-size: 20px;
    padding: 10px 15px;
  }
  td,th{
    font-size: 30px;
  }
  select{
    font-size: 20px;
    width: 400px;
    height: 50px;
  }
  body{
    background-color: #D5F5E3;
  }
  </style>



</head>
<body>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    </div>
    <a href="dashstu.php">
      <div class="panel-footer">
        <span class="pull-right"></span>
        <span class="pull-left"><i class="fa fa-arrow-circle-left fa-3x"></i></span></a>
  <h1 style="text-align: center">NOTES WILL GO HERE</h1>
        <div class="clearfix"></div>
      </div>
      </div>
  <div <a id ="user" style="text-align: center"><?php echo "Welcome, $fname<br/>$email"; ?></a></div><br/>
  <form action="submit.php" method="post">
    <button type="submit" name="logout" style="float: right; color: #2b542c">Logout</button>
  </form>
  </div>
</nav>
<!--  <div id="user">--><?php //echo "Welcome, $fname<br/>$email"; ?><!--</div>-->
<!--  <form action="submit.php" method="get">-->
<!--    <input type="submit" name="logout" value="Logout"/>-->
<!--  </form>-->
<div id="cat_select" align="center">
  <form id="catDetailsShow" action="" method="post">
<select name="categorySelect" id="categorySelect">
  <?php
  include_once("catAvailable.php");
   ?>
 </select>
 <input type="submit" name="catDet" id="catDet" value="Go" onclick="JavaScript:return validate();"/>
 </form>
</div>
<br/><br/>

<?php
$host="localhost";
$username="root";
$password="";
$dbname="db_examportal";
$connect=mysqli_connect($host,$username,$password,$dbname);

$Catname="";$markPos="";$markNeg="";$totTime="";$totQuest="";
if(isset($_POST['categorySelect']))
{
  $Catname=$_POST['categorySelect'];
  $_SESSION['CATEGORY']=$Catname;
  $sql="SELECT * FROM `category` WHERE `catName`='$Catname'";
  $rslt=mysqli_query($connect,$sql);
  $row=mysqli_fetch_assoc($rslt);
  $markPos=$row["markQuestCorrect"];
  $markNeg=$row["markQuestIncorrect"];
  $totTime=$row["totTime"];

  $sql="SELECT `questno` FROM `$Catname`";
  $rslt=mysqli_query($connect,$sql);
  $totQuest=mysqli_num_rows($rslt);
?>
<input type="hidden" value="<?php echo $Catname;?>" name="cateGory"/>
<div id="dispCatDet" align="center"><br/><br/>
  <table cellspacing="10" cellpadding="10" align="center" rules="all">
    <th colspan="4" align="center"><?php echo $Catname;?></th>
    <tr>
      <td colspan="3">Total Questions :</td>
      <td>
        <?php
        echo $totQuest;
        ?>
      </td>
    </tr>
    <tr>
      <td colspan="3">
        Marks for each correct :
      </td>
      <td>
        <?php
        echo $markPos; ?>
      </td>
    </tr>
    <tr>
      <td colspan="3">
        Marks for each incorrect :
      </td>
      <td>
        <?php
        echo "-".$markNeg; ?>
      </td>
    </tr>
    <tr>
      <td colspan="3">
        Total Time (in mins) :
      </td>
      <td>
        <?php
        echo ((float)$totTime)/60; ?>
      </td>
    </tr>
</table>
<br/><br/>
<div align="center">
<form action="prepareData.php" method="post">
<input type="hidden" value="<?php echo $totQuest; ?>" name="total"/>
<button type="submit" name="start" value="<?php echo $Catname;?>" id="start" onclick="JavaScript:return start();">START</button>
</form>
<?php
}
else {
  include_once("analysis.php");
}
?>
</br>
</div>
</div>
<script src="/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
</body>
</html>
<?php
}
else {
  header('Location:studLogin.php');
} ?>
