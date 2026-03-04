<?php
    require 'connect.php';
    $sql_select = "SELECT * FROM country";
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
</head>
<body>
    <h1>Add Customer</h1>
    <form action="addcustomer.php" method="POST">
        <input type="text" placeholder="Enter Customer ID" name="customerID"><br><br>
        <input type="text" placeholder="Name" name="Name"><br><br>
        <input type="text" placeholder="Birthdate" name="Birthdate"><br><br>
        <input type="text" placeholder="Email" name="Email"><br><br>
        <input type="number" placeholder="OutStanding debt" name="OutStandingdebt"><br><br>
        
        <select name="CountryCode">
            <?php while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?php echo $cc["CountryCode"]; ?>">
                    <?php echo $cc["CountryName"]; ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <input type="submit" value="Submit" name="submit" />
    </form>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $sql_insert = "INSERT INTO customer VALUES (:CustomerID, :Name, :Birthdate, :Email, :OutStandingdebt, :CountryCode)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindParam(':CustomerID', $_POST['customerID']);          
        $stmt->bindParam(':Name', $_POST['Name']);  
        $stmt->bindParam(':Birthdate', $_POST['Birthdate']);  
        $stmt->bindParam(':Email', $_POST['Email']); 
        $stmt->bindParam(':OutStandingdebt', $_POST['OutStandingdebt']); 
        $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
        
        if ($stmt->execute()):
            $message = 'Successfully added new customer';
            echo "<h3>" . $message . "</h3>";
        endif;
    }

    $conn = null;
?>