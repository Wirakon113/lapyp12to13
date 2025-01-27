<?php
require('dbconnect.php'); // Connect to database
$sql = "SELECT * FROM employee"; // Query to select all employee data
$result = mysqli_query($con, $sql); // Execute the query

$count = mysqli_num_rows($result); // Count the number of rows returned by the query
$order = 1; // Initialize row numbering
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <title>รายชื่อพนักงานทั้งหมด</title>
  <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f9fafb;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .btn {
            border-radius: 50px;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .table-container {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 25px;
        }

        .table thead {
            background-color: #2c3e50;
            color: #fff;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .empty-table {
            text-align: center;
            color: #aaa;
            font-size: 1.2rem;
            padding: 50px 0;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .search-bar {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>
<body>

<div class="container">
  <h1>รายชื่อพนักงานทั้งหมด</h1>

  <!-- Search Form -->
  <form action="searchdata.php" method="POST" class="search-bar">
    <input type="text" name="namesearch" placeholder="กรอกชื่อพนักงานที่ต้องการค้นหา" class="form-control">
    <input type="submit" value="ค้นหาข้อมูลพนักงาน" class="btn btn-info">
  </form>

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
            </tr>
          <?php }
        } else { ?>
          <tr>
            <td colspan="8" class="text-center">ไม่มีข้อมูลพนักงาน</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <div class="btn-container">
    <a href="insertform.php" class="btn btn-success mt-4">กรอกข้อมูลพนักงาน</a>
  </div>
  <div class="btn-container">
    <a href="login.php" class="btn btn-primary mt-4">เข้าสู่ระบบ</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>
