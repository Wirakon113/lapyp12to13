<?php
require('dbconnect.php'); // Connect to the database
$sql = "SELECT * FROM employee"; // Query to select all employee data
$result = mysqli_query($con, $sql); // Execute the query
$count = mysqli_num_rows($result); // Count the number of rows returned
$order = 1; // Initialize row numbering
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>รายชื่อพนักงานทั้งหมด</title>
  <style>
    body {
        font-family: 'Prompt', sans-serif;
        background-color: #f9fafb;
        color: #333;
        margin: 0;
        padding: 20px;
    }
    .table-container {
        background: #fff;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .btn {
        border-radius: 50px;
    }
    .btn-edit {
        background-color: #ffc107;
        color: white;
    }
    .btn-delete {
        background-color: #dc3545;
        color: white;
    }
  </style>
</head>
<body>
<div class="container">
  <h1>รายชื่อพนักงานทั้งหมด</h1>

  <!-- Employee Table -->
  <div class="table-container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>คำนำหน้า</th>
          <th>ชื่อ</th>
          <th>นามสกุล</th>
          <th>วันเกิด</th>
          <th>ที่อยู่ปัจจุบัน</th>
          <th>ทักษะความสามารถ</th>
          <th>เบอร์โทรศัพท์</th>
          <th>จัดการ</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($count > 0) {
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo htmlspecialchars($order++); ?></td>
              <td><?php echo htmlspecialchars($row["emp_title"]); ?></td>
              <td><?php echo htmlspecialchars($row["emp_name"]); ?></td>
              <td><?php echo htmlspecialchars($row["emp_surname"]); ?></td>
              <td><?php echo htmlspecialchars($row["emp_birthday"]); ?></td>
              <td><?php echo htmlspecialchars($row["emp_adr"]); ?></td>
              <td><?php echo htmlspecialchars($row["emp_skill"]); ?></td>
              <td><?php echo htmlspecialchars($row["emp_tel"]); ?></td>
              <td>
                <a href="editform.php?emp_id=<?php echo $row['emp_id']; ?>" class="btn btn-edit btn-sm">แก้ไข</a>
                <a href="delete.php?emp_id=<?php echo $row['emp_id']; ?>" class="btn btn-delete btn-sm" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบข้อมูลนี้?');">ลบ</a>
              </td>
            </tr>
          <?php }
        } else { ?>
          <tr>
            <td colspan="9" class="text-center">ไม่มีข้อมูลพนักงาน</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <div class="btn-container text-center mt-4">
    <a href="insertform.php" class="btn btn-success">กรอกข้อมูลพนักงาน</a>
    <a href="login.php" class="btn btn-primary">เข้าสู่ระบบ</a>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
