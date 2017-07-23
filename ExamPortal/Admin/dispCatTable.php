<?php
if(isset($_SESSION['aname']))
{
include_once("dbconnect.php");
if(isset($_POST['search']))
{
  $srch=$_POST['searchBar'];
  $sql="SELECT * FROM `category` WHERE `catName` LIKE '%$srch%'";
}
else
{
  $sql="SELECT * FROM `category`";
}

$rslt=mysqli_query($connect,$sql);
if(mysqli_num_rows($rslt)>0)
{
  $sql1="SELECT * FROM `category` WHERE `status`='1'";
  $rslt1=mysqli_query($connect,$sql1);
  $act=mysqli_num_rows($rslt1);
  echo "Active Categories: $act";
  $sql1="SELECT * FROM `category` WHERE `status`='0'";
  $rslt1=mysqli_query($connect,$sql1);
  $inact=mysqli_num_rows($rslt1);
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inactive Categories: $inact<br/><br/>";
?>
  <table cellspacing="10" cellpadding="10" border="2" id="cat_tab" align="center" rules="all">
    <tr>
      <th colspan="3" align="center">Categories</th>
      <th colspan="3" align="center">Options</th>
      <th align="center">Status</th>
    </tr>
  <?php
  $n=1;
  while ($row=mysqli_fetch_assoc($rslt)) {
    ?>
    <script>
    function ask(){
      if(confirm("Are you sure?\nAll questions will be deleted with it.")==true){
        return true;
      }
      else {
        return false;
      }
    }
    </script>
    <tr>
      <form action="optCat.php" method="post" id="opt_buts">
      <td colspan="3" align="center">
        <h3><?php echo $row["catName"]?></h3>
      </td>
      <td colspan="3" align="center">
          <button type="submit" class="opt_but" id="editCat" name="editCat<?php echo $n ?>" style="background-color:#3663A6; color:white; border-radius:20%; font-size:16px;" form="opt_buts">Edit</button>
        <br/><br/>
          <button type="submit" name="delete<?php echo $n ?>" form="opt_buts" id="submit" style="background-color:#F71D16; color:white; border-radius:20%; font-size:16px;" class="opt_but" onclick="JavaScript:return ask();" >Delete</button>
      </form>
      </td>
      <td align="center">
        <form id="statChnge" method="post" action="ChangeStatus.php">
        <button type="submit" form="statChnge" name="status<?php echo $n ?>" id="status<?php echo $n ?>">
          <?php if($row["status"]==1)
          {
            echo "Active";
            ?>
            <script>
            document.getElementById('status<?php echo $n ?>').style.color="#10FB00";
            </script>
            <?php
          }
          else{
            echo "Inactive";
            ?>
            <script>
            document.getElementById('status<?php echo $n ?>').style.color="#FB0000";
            </script>
            <?php
          }
          ?>
        </button>
        </form>
      </td>
    </tr>
      <?php
      $n=$n+1;
  }?>
</table><?php
}
else {
  echo "No Categories available";
}
}
else
{
  header('Location:adminLogin.php');
}
 ?>
