<?php
$organization="ADMIN";
session_start();
if(isset($_SESSION['aname']))
{
  ?>
<html>
<head>
  <title>Category Page</title>
  <script>
  var flag=1;
  function on() {
    document.getElementById("overlay").style.display = "block";
  }
  function off(){
    document.getElementById("overlay").style.display = "none";
  }
  function validate(){
    var name=document.getElementById('cat_name').value;
    if(name==""){
      alert("Category Name Required!");
      return false;
    }
    else {
      off();
      return true;
    }
  }
  </script>
  <style>
  #newCat{
    font-size: 20px;
    height: 50px;
    border-radius: 10px;
    border: none;
    transition-duration: 0.4s;
    color: white;
  }
  #newCat:hover{
    opacity: 0.8;
  }
  #overlay{
    position: fixed;
    display: none;
    width: 300px;
    height: 150px;
    top: 50%;
    left: 40%;
    background-color: rgba(253, 254, 254,1);
    box-shadow: 10px 10px 50px 20px black;
    border-radius:10% 0px 10% 0px;
  }
  #cat_field{
  margin-left: 10%;
  margin-top: 5px;
  width: 80%;
  height: 80%
  border: 2px solid;
  }
  #cat_tab{
    width: 80%;
  }
  #hints{
    width:80%;
    height:50px;
    background-color: #EC7063;
    color: #FDFEFE;
    text-align: left;
    margin-top: 5px;;
    margin-left: 10%;
    border-radius: 10px 10px 0px 0px;
  }
  .cat_disp{
    font-size: 20px;
    border: 0;
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
  </style>
</head>
<body>
  <div id="overlay" align="center">
    <br/><br/>
    <form id="ov_form" action="new_cat.php" method="post">
    Enter Category Name <span style="color:#FB0000">*</span>&nbsp;
    <input type="text" id="cat_name" name="cat_name" autocomplete="off" autofocus/>
    <br/><br/>
    <button type="submit" form="ov_form" name="done" value="<?php echo $organization; ?>" onclick="JavaScript:return validate();">Done</button>
    <button type="reset" form="ov_form" onclick="off();">Cancel</button>
    </form>
  </div>

  <div style="float:left; position:fixed; margin-top:40px;">
    <?php include_once("backtoCC.php");?>
  </div>
<div id="bod">
  <br/><br/>
  <hr style="width:200px">
  <p><b>Category Manager</b></p>
  <hr style="width:200px">
  <br/><br/>
  <div id="newCat" align="center">
    <button type="button" name="newCat" id="newCat" align="center" style="background-color:#37EA0A;" onclick="on();">Add New Category</button><br/><br/>
    <form action="" method="post">
    <input type="text" name="searchBar" placeholder="Enter search keyword" style="width:50%; height:30px;"/><br/><br/>
    <button type="submit" name="search">Search</button>
    </form>
  </div> 
<br/><br/><br/><br/><br/>
  <fieldset id="cat_field">
    <legend>Category list</legend>
    <?php
    include_once("dispCatTable.php");
      ?>
  </fieldset>
</div>
</body>
</html>
<?php
}
else {
header('Location:adminLogin.php');
}
?>
