<?php
header('Access-Control-Allow-Origin: *');

$connection = mysqli_connect("localhost", "root", "", "cafe_shop");
$sql = "SELECT * FROM drinks WHERE status='Approved'";

$result = mysqli_query($connection, $sql);

$array = array();

$obj = array();

while($row = mysqli_fetch_array($result)){
    $obj['id'] = $row['id'];
    $obj['name'] = $row['name'];
    $obj['unitPrice'] = $row['unit_price'];
    $obj['type'] = $row['type'];
    $obj['temp'] = $row['temperature'];
    $obj['img'] = $row['image'];
    $array[] = $obj;
}

mysqli_close($connection);

echo json_encode($array);
