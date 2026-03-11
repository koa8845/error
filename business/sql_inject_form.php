<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Test SQL injection</h1>
    <form action="select_injection.php" method="GET">
        <input type="text" placeholder="Enter Customer ID" name="CustomerrID">
        <br><br>
        <input type="submit">
</body>
<?php
require "connect.php";
$sql = "
SELECT *
FROM customer
JOIN country on customer.CountryCode = country.CountryCode";  


$stmt = $conn->prepare($sql);
$stmt->execute();
?>
<table width="800" border="1">
          <tr>
              <th width="90">
                  <div align="center">รหัสผู้ใช้ </div>
              </th>
              <th width="100">
                  <div align="center">ประเทศ</div>
              </th>
              <th width="50">
                  <div align="center">อีเมล์ </div>
              </th>
          </tr>

          <?php
          while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>

              <tr>
                  <td>

                      <?php echo $result["CustomerID"]; ?>

                  </td>
                  <td><?php echo  $result["CountryName"];?></td>
                  <td><?php echo  $result["Email"];?></div>
                  </td>

              </tr>

          <?php
          }
          ?>
</html>