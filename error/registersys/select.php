<htmi>
<head>
<body>
<?php
require "RE.php";
$sql = "SELECT 
    course.Course_ID, 
    course.Course_Name,
    register_detail.grade, 
    register.term,
    student.Student_Fname, 
    student.Student_LName
FROM register
INNER JOIN register_detail 
    ON register.Register_Id = register_detail.Register_Id
INNER JOIN course 
    ON course.Course_ID = register_detail.Course_Id
INNER JOIN student 
    ON student.Student_Id = register.Student_Id;";  


$stmt = $conn->prepare($sql);
$stmt->execute();
?>
<table width="800" border="1">
          <tr>
              <th width="90">
                  <div align="Student_Id">รหัสผู้ใช้ </div>
              </th>
              <th width="140">
                  <div align="Student_Fname">ชื่อ </div>
              </th>
              <th width="120">
                  <div align="Student_LName">นามสกุล </div>
              </th>
              <th width="100">
                  <div align="Course_ID">รหัสวิชา </div>
              </th>
              <th width="50">
                  <div align="Program_Id">รหัสสาขา </div>
              </th>
              <th width="70">
                  <div align="Program_name">ชื่อสาขา</div>
              </th>
          </tr>

          <?php
          while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>

              <tr>
                  <td>
 <a href="detail.php?CustomerID=<?php echo $result['Student_Id']; ?>">
                      <?php echo $result["Student_Id"]; ?>
                  </td>
                  <td>
                      <?php echo $result["Student_Fname"]  ?>
                  </td>
                  <td>
                      <?php echo $result["Student_LName"]  ?>
                  </td>
                  <td><?php echo $result ["Course_ID"];?></div>
                  </td>
                  <td><?php echo  $result["Program_Id"];?></td>
                  <td><?php echo  $result["Program_name"];?></div>

          <?php
          }
          ?>

      </table>
</body>
</hdml>