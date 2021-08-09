<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sonoo";
$con = mysqli_connect($servername, $username, $password, $dbname);
?>

<?php
$query = "select id from empdetail order by id desc";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['id'];

if (empty($lastid)) {
    $number = "CO.";
} else {
    $idd = str_replace("CO.", "", $lastid);
    $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
    $number = "CO." . $id;
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $ename = $_POST['ename'];
    $esal = $_POST['esal'];

    if (!$con) {
        die("Connection Failed" . mysql_connect_error());
    } else {
        $sql = "insert into empdetail(id,ename,esal)VALUES('$id', '$ename', '$esal')";
        if (mysqli_query($con, $sql)) {
            echo "Record Added";
        } else {
            echo "Record Failed TO Adds";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="Bootstrap\js\icon.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <div class="row">
        <div class="col-sm-4">
            <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post">
                <div align="left">
                    <h3>Auto NO in Php</h3>
                </div>
                <div align="left">
                    <label for="left">Employee No</label>
                    <input type="text" class="form-control" name="id" id="id" value="<?php echo $id; ?>" readonly>
                </div>

                <div align="left">
                    <label for="left">Employee Name</label>
                    <input type="text" class="form-control" name="ename" id="ename" value="">
                </div>

                <div align="left">
                    <label for="left">Employee Salary</label>
                    <input type="text" class="form-control" name="esal" id="esal" value="">
                </div>

                <div align="left">
                    <input type="submit" value="ADD" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</body>

</html>