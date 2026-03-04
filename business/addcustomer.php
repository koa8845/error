<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add Customer</h1>
    <form action="addcustomer.php" method="POST">

    <input type="text" placeholder="Enter Customer ID" name="customerID">
    <br> <br>
    <input type="text" placeholder="Name" name="Name">
    <br> <br>
    <input type="text" placeholder="Birthdate" name="Birthdate">
    <br> <br>
    <input type="text" placeholder="Email" name="Email">
    <br> <br>
    <input type="text" placeholder="Country code" name="Country code">
    <br> <br>
    <input type="number" placeholder="OutStanding debt" name="OutStandingdebt">
    <input type="submit">
</body>
</html>
<?php
    require 'connect.php' ;
    $sql_select = "select * from country";
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();
    $sql_insert = "INSERT into customer
                                    values (:CustomerID, :Name, :Birthdate, :Email, :OutStandingdebt)";
$stmt = $conn->prepare($sql_insert);
$stmt->bindParam(':Customer ID' , $_POST['Customer ID']);           
$stmt->bindParam(':Name' , $_POST['Name']);  
$stmt->bindParam(':Birthdate' , $_POST['Birthdate']);  
$stmt->bindParam(':Email' , $_POST['Email']); 
$stmt->bindParam(':OutStanding debt' , $_POST['OutStanding debt']); 
if ($stmt->extract()):
    $message = 'Suscessfully add new customer';
endif;
echo $message;

$conn = null;
?>