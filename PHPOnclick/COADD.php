 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sonoo";
$con = mysqli_connect($servername, $username, $password, $dbname);
?>


<script>
function myFunction(){
<?php
$query = "select id from empdetail order by id desc ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['id'] + 1;
$empid = $lastid;
?>
}
</script>





<?php
require 'profile.php'
?>
<div class="container" onload="myFunction();"> 
 <div class="col-sm-12 ml-5 ">
            <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" class="col-sm-5" method="post">
                <div align="left">
                    <h3>Add Co</h3>
                </div>
                <div align="left">
                    <label for="left">CONO</label>
                    <input type="text" class="form-control" name="id" id="id" value="<?php echo "CO".$empid; ?>" readonly>
                </div>

                <div align="left">
                    <label for="left">Course Name</label>
                    <input type="text" class="form-control" name="ename" id="ename" value="" required>
                </div>

                <div align="left">
                    <label for="left">Course ID</label>
                    <input type="text" class="form-control" name="esal" id="esal" value="" required>
                </div>

                <div align="left">
                    <input type="submit" value="ADD" name="submit" class="btn btn-success mt-3">
                </div>
            </form>
      
      </div>
    </div>

<?php
if(isset($_POST['submit']))
{
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $ename = $_POST['ename'];
    $esal = $_POST['esal'];

    if (!$con) 
    {
        die("Connection Failed" . mysql_connect_error());
    }
     else 
     {
        $sql = "insert into empdetail(id,ename,esal)VALUES('$id', '$ename', '$esal')";
        if (mysqli_query($con, $sql))
        {
           // echo "<script>alert('Record Added Successfully.');window.locate='coadd.php'</script>";
        } 
        else
        {

            echo "Record Failed TO Adds";
        }
     }
}
}
?>

