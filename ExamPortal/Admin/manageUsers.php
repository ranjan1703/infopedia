<?php
include_once("dbconnect.php");
session_start();
if($_SESSION['aname'])
{
 ?>
<html>
<head>
  <title>Users Manager</title>
  <script>
  function ask()
  {
    if(confirm("Are you sure?\nThe user will have to register again!")==true)
    {
      var x=prompt("Please type 'CONFIRM' to proceed");
      if(x=="CONFIRM")
      {
        alert("User will be removed.")
        return true;
      }
      else {
        return false;
      }
    }
    else {
      return false;
    }
  }
  </script>
  <style>
  #cat_field{
  margin-top: 5px;
  width: 90%;
  border: 4px solid;
  }
  #cat_tab{
    width: 90%;
  }
  #students,#teachers{
    float: left;
    width: 50%;
    height: 50%;
    overflow: scroll;
  }
  #overlay1,#overlay2{
    position: fixed;
    width: 300px;
    height: 150px;
    left: 30%;
    background-color: rgba(253, 254, 254,1);
    box-shadow: 10px 10px 50px 20px black;
    border-radius:10% 0px 10% 0px;
  }
  button{
    cursor: pointer;
  }
  th{
    font-size: 25px;
    text-align: center;
  }
  p{
    text-align: center;
    font-size: 30px;
  }
  option,select{
    width: 100px;
    font-size:15px;
  }
  legend{
    font-size: 20px;
    font-style: italic;
    font-weight: bold;
  }
  body{
    height: 90%;
  }
  </style>
</head>
<body>
  <div style="float:left; position:fixed; margin-top:40px;">
    <?php include_once("backtoCC.php");?>
  </div>
  <div style="width:100%; height:20px; background-color:white;"></div>
  <hr style="width:200px">
  <p><b>Manage Users</b></p>
  <hr style="width:200px">
  <br/><br/>
  <div align="center">
    <form action="" method="post">
      <input type="text" name="searchBar" placeholder="Enter search keyword" style="width:50%; height:30px;"/><br/><br/>
      <button type="submit" name="search">Search</button>
      <?php
      include_once("filterOptions.php");
       ?>
     </form>
   </div>
   <div id="students">
     <fieldset id="cat_field">
       <legend>Students</legend>
        <?php
        include_once("dispStudentUsers.php"); ?>
      </fieldset>
    </div>
    <div id="teachers">
     <fieldset id="cat_field">
       <legend>Teachers</legend>
       <?php
       include_once("dispTeacherUsers.php"); ?>
     </fieldset>
    </div> 
    <?php
    include_once("overlays.php"); ?>
  </body>
</html>
<?php
}
else
{
  header('Location:adminLogin.php');
}
 ?>
