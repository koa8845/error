<?php

require('connect.php');


$sql = "delete from customer where CustomerID = :customerID";
$stml = $conn->prepare($sql);
$stml->binParam(':customerID' ,$_GET['CustomerID']);
 
if($stml->execute()){
    $message = "Successfully delete customer".$_GET['CustomerID'].".";
}else{
    $message = "fail to delete customer information.";
}
echo $message;
$conn = null;
