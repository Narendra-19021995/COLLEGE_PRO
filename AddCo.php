<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sonoo";
$con = mysqli_connect($servername, $username, $password, $dbname);
?>

<?php
$query = "select id from empdetail order by id desc ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['id'] + 1;

// if (empty($lastid)) {
//     $number = "CO.";
// } else {
//     $idd = str_replace("CO.", "", $lastid);
//     $id = str_pad($idd + 1, 0, 0, STR_PAD_LEFT);
//     $number = "CO." . $id;
// }
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $ename = $_POST['ename'];
    $esal = $_POST['esal'];

    if (!$con) {
        die("Connection Failed" . mysql_connect_error());
    } else {
        $sql = "insert into empdetail(id,ename,esal)VALUES('" . $id . "', '" . $ename . "', '" . $esal . "')";
        if (mysqli_query($con, $sql)) {
            echo "Record Added";
        } else {
            echo "Record Failed TO Adds";
        }
    }
}
?>

<?php
//require 'profile.php';
?>
<div class="container mt-(-10)">
    <center>
        <div class="form-group">
            <div class="content">

                <head class="header">
                    <p class="text-uppercase font-weight-bold h1">Add CO</p>
                </head>
            </div>
            <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
                <div class="field_wrapper">
                    <div>

                        <input type="text" class="form-control-lg" name="field_name[]" id="id"
                            value="<?php echo $lastid; ?>" readonly disabled>
                        <input type="text" class="form-control-lg" name="field_name[]" id="ename" value="">
                        <input type="text" class="form-control-lg" name="field_name[]" id="esal" value="">
                        <input type="submit" value="ADD" name="field_name[]" class="btn btn-success">
                        <a href="javascript:void(0);" class="add_button" title="Add field"><i
                                class="material-icons">&#xe148;</i></a>
                    </div>
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3 ">
            </form>

        </div>
    </center>

</div>
<script type="text/javascript">
$(document).ready(function() {
    var maxField = 7; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML =
        '<div><input type="text" class="form-control-lg" name="field_name[]" id="id" value="<?php echo $lastid; ?>" readonly><input type="text" class="form-control-lg" name="field_name[]" id="ename" value=""><input type="text" class="form-control-lg" name="field_name[]" id="esal" value=""><input type="submit" value="ADD" name="field_name[]" class="btn btn-success"><a href="javascript:void(0);" class="remove_button"><i class="material-icons">&#xe872;</i></a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function() {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>