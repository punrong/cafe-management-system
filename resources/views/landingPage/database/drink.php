<?php
header('Access-Control-Allow-Origin: *');

$connection = mysqli_connect("localhost", "root", "", "cafe_shop");
$sql = "SELECT * FROM drinks";

$result = mysqli_query($connection, $sql);

while($row = mysqli_fetch_array($result)){
    echo $row . '<br>';
}

