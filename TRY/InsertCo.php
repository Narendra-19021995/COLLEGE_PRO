<?php

//insert.php

$connect = new PDO("mysql:host=localhost;dbname=coposmap", "root", "");

$query = "
INSERT INTO codata 
(s_name, Co_no, co_name) 
VALUES (:s_name, :Co_no, :co_name)
";

for($count = 0; $count<count($_POST['hidden_s_name']); $count++)
{
 $data = array(
  ':s_name' => $_POST['hidden_s_name'][$count],
  ':Co_no' => $_POST['hidden_Co_no'][$count],
  ':co_name' => $_POST['hidden_co_name'][$count]
 );
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

?>