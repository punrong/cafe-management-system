<?php
header('Access-Control-Allow-Origin: *');

$connection = mysqli_connect("localhost", "root", "", "cafe_shop");
$sql = "SELECT * FROM promotions WHERE status='Approved'";

$result = mysqli_query($connection, $sql);

$array = array();

$obj = array();

while($row = mysqli_fetch_array($result)){
    $obj['id'] = $row['id'];
    $obj['name'] = $row['name'];
    $obj['img'] = $row['image'];
    $obj['startDate'] = $row['start_date'];
    $obj['endDate'] = $row['end_date'];
    $obj['condition'] = $row['condition'];

    $array[] = $obj;
}

mysqli_close($connection);

echo json_encode($array);
