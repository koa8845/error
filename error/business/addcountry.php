<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add Country</h1>
    <form action="addcountry.php" method="POST">
        <input type="text" placeholder="Enter Country Code" name="CountryCode">
        <br><br>
        <input type="text" placeholder="Enter Country name" name="Countryname">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
if (!empty($_POST['CountryCode']) && !empty($_POST['Countryname'])):
    require 'connect.php';
    
    $sql_insert = "insert into Country values (:CountryCode, :Countryname)";
    
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);           
    $stmt->bindParam(':Countryname', $_POST['Countryname']);  

    if ($stmt->execute()):
        $message = 'Successfully added new country';
    else:
        $message = 'Failed to add new country';
    endif;
    
    echo $message;

    $conn = null;
endif;
?>