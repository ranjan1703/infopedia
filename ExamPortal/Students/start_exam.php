<?php
include_once("dbconnect.php");
session_start();
$TOT="";
if(!isset($_SESSION['CATEGORY']))
{
  header('Location:studLogin.php');
}
else{
  $CAT=($_SESSION['CATEGORY']);
  if(isset($_SESSION['QUESTNO']))
  {
    $x=$_SESSION['QUESTNO'];
  }
  else{$x=0;}
    $sqlT="SELECT `questno` FROM `$CAT`";
    $rslT=mysqli_query($connect,$sqlT);
    $TOT=mysqli_num_rows($rslT);
?>
<html>
<head>
  <meta http-equiv="refresh" content = "1" />
  <title><?php echo $CAT; ?> Commenced</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//goo.gl/mTc43h" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script>
  /*function showQuest()
  {
    document.getElementById("question").innerHTML=ques[x];
    document.getElementById("1").innerHTML=op1[x];
    document.getElementById("2").innerHTML=op2[x];
    document.getElementById("3").innerHTML=op3[x];
    document.getElementById("4").innerHTML=op4[x];
    var ele=document.getElementsByName('marked');
    for(i=0;i<ele.length;i++)
    {
      if(ele[i].value==res[x])
      {
        ele[i].checked=true;
      }
    }
  }*/
  function confirmExit()
  {
    if(confirm("Are you sure?\nFurther responses will be blocked for <?php echo $CAT; ?>")==true){
      return true;
    }
    else {
      return false;
    }
  }
  </script>
  <style>
  #topBar{
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    overflow: hidden;
    height: 100px;
    background-color: #BB8FCE;
  }
  #timer{
    width: 500px;
    color: #A93226;
    font-size: 50px;
    font-family:AR DELANEY;
    text-align: center;
    margin-top: 20px;
    float: right;
    border-right: 6px solid #4A235A;
    border-left: 6px solid #4A235A;
    background-color: #5499C7;
    margin-right: 10px;
  }
  #dispQuest{
    position: sticky;
    background-color: #ECF0F1;
    width: 80%;
    height: 85%;
    top: 15%;
    left: 10%;
    border: 2px solid red;
  }
  #question{
    font-size: 25px;
    font-family: Georgia;
    background-color: white;
    border: 10px solid white ;
    width: 95%;
    height: 80%;
    text-align: left;
    border-radius: 5px;
    }
  #questChoice{
    font-size: 20px;
    line-height: 40px;
    font-family: "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
    text-align: center;
  }
  .choiceButs{
    font-size: 20px;
    border-color: #CC66CC;
    border-radius: 10px;
    transition-duration: 0.5s;
  }
  .choiceButs:hover{
    background-color: #F44336;
    color: #FAFAFA;
  }
  </style>
</head>
<?php
if (isset($_POST['finish'])) {
  unset($_SESSION['QUESTNO']);
}
if(isset($_POST['prev']))
{
  if($x>0)
  {
    $x=$x-1;
    $_SESSION['QUESTNO']=$x;
  }
}
if(isset($_POST['next']))
{
  if($x<$TOT-1)
  {
    $x=$x+1;
    $_SESSION['QUESTNO']=$x;
  }
}

$timerM;$timerS;
$currentTime=strtotime(date("h:i:sa"));
$timerM=floor(($_SESSION['TIMER']-$currentTime)/60);
$timerS=floor(($_SESSION['TIMER']-$currentTime)%60);
if(isset($_SESSION['TIMER'])){
if(($timerM==0 && $timerS==0) || isset($_POST['finish']))
{
  header('Location:prepareData.php?given=1');
}}

$sql="SELECT `questno`,`quest`,`opt1`,`opt2`,`opt3`,`opt4` FROM `$CAT` LIMIT $x,1";
$rslt=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($rslt);
$x=$row["questno"];
?>
<body>
  <div id="topBar" align="center">
  <div id="timer" align="left"><?php echo "Timer:- $timerM:";printf("%02d\n",$timerS ); ?> mins</div>
  </div>

<div id="dispQuest" align="center">
<div style="width:100%; height:60%;" align="center">
<p id="mainQuest">
<h3>Question: <?php echo $x." of ".$TOT;?></h3><br/>
<div id="question" style="overflow:scroll;"><?php echo $row["quest"];?></div>
</p>
</div>
<div style="width:100%; height:40%; margin-top:-20px;">
<form id="choices" action="#" method="post">
<p id="questChoice"><b>
<div style="float:left; width:50%; font-size: 20px; " align="center">
<input class="option-input radio" type="radio" name="marked" value="1"/><?php echo $row["opt1"];?><br/><br/><br/>
<input class="option-input radio" type="radio" name="marked" value="2"/><?php echo $row["opt2"];?><br/><br/><br/>
</div>
<div style="float:left; width:50%; font-size: 20px; text-align:left;" align="center">
<input class="option-input radio" type="radio" name="marked" value="3"/><?php echo $row["opt3"];?><br/><br/><br/>
<input class="option-input radio" type="radio" name="marked" value="4"/><?php echo $row["opt4"];?><br/><br/><br/>
</div>
</b></p>
<div id="buttonSet">
<button class="choiceButs" form="choices" type="submit" name="prev">Previous</button>&nbsp;&nbsp;
<button class="choiceButs" form="choices" type="reset" name="">Unmark</button>&nbsp;&nbsp;
<button class="choiceButs" form="choices" type="submit" name="next">Next</button><br/><br/>
<button class="choiceButs" form="choices" type="submit" name="finish" style="width:100%; height:30px; border-radius:10px; background-color:#B3B6B7;">Submit and Exit</button>
</div>
</form>
</div>
</div>
</body>
</html>
<?php
}
?>
