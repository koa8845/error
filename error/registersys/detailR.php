<html> 
<head>
<title> Display Selected Student Information</title>
</head>
<body>

<?php
    $strStudentID = ""; 
    
    if (isset($_GET["Student_Id"])) 
    {
        $strStudentID = $_GET["Student_Id"];
    }
    
    echo $strStudentID;

    require "RE.php"; 
    
    $sql = "SELECT * FROM student WHERE Student_Id = ?"; 
    $params = array($strStudentID);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
?>
<table width="300" border="1">
  <tr>
    <th width="325">รหัสนักศึกษา</th>
    <td width="240"><?php echo htmlspecialchars($result["Student_Id"]); ?></td>
  </tr>

  <tr>
    <th width="130">ชื่อ</th>
    <td><?php echo htmlspecialchars($result["Student_Fname"]); ?></td>
  </tr>
  
  <tr>
    <th width="130">grade</th>
    <td><?php echo htmlspecialchars($result["grade"]); ?></td>
  </tr>

  <tr>
    <th width="130">term</th>
    <td><?php echo htmlspecialchars($result["term"]); ?></td>
  </tr>

  <tr>
    <th width="130">รหัสวิชา</th>
    <td><?php echo htmlspecialchars($result["Course_ID"]); ?></td>
  </tr>
  
  <tr>
    <th width="130">ชื่อวิชา</th>
    <td><?php echo htmlspecialchars($result["Course_Namet"]); ?></td>
  </tr>
</table>

<?php
    } 
    $conn = null;
?>
</body>
</html>