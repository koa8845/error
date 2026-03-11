<!DOCTYPE html>
<html lang="en">
<head>
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
              <th width="120">
                  <div align="center">วันเกิด </div>
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
                  <td><?php echo $result ["Birthdate"];?></div>
                  </td>
                  <td><?php echo  $result["CountryName"];?></td>
                  <td><?php echo  $result["Email"];?></div>
                  </td>

              </tr>

          <?php
          }
          ?>

      </table>
</body>
</html>