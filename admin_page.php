<?php
session_start();
require("dbconnect.php");
if ($_SESSION['emp_level'] != "a") {
  echo "<center>หน้าสำหรับผู้ดูแลระบบ <a href=login.php>กรุณาเข้าสู่ระบบก่อน</a></center>";
  exit();
}
if (!$_SESSION["emp_id"]) {
  header("location:login.php");
} else {

  $sqllogin = "SELECT * FROM employee WHERE emp_id='" . $_SESSION["emp_id"] . "'";
  $result = mysqli_query($con, $sqllogin);
  $row = mysqli_fetch_assoc($result);

?>
  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <style>
      body {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        font-family: 'Arial', sans-serif;
        color: #f1f1f1;
      }

      .container {
        margin-top: 50px;
        padding: 40px;
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        max-width: 80%;
        margin-left: auto;
        margin-right: auto;
      }

      h2 {
        color: #4e73df;
        font-size: 2.5rem;
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
      }

      p {
        font-size: 1.2rem;
        color: #4e73df;
        text-align: center;
        margin-bottom: 30px;
      }

      .table {
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      }

      .table thead {
        background-color: #4e73df;
        color: white;
        font-size: 1.1rem;
      }

      .table tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1);
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .btn {
        font-size: 1.1rem;
        padding: 10px 20px;
        border-radius: 25px;
        text-align: center;
        transition: all 0.3s ease;
      }

      .btn-danger {
        background-color: #e74a3b;
        border-color: #e74a3b;
      }

      .btn-danger:hover {
        background-color: #c0392b;
        border-color: #c0392b;
      }

      .btn-success {
        background-color: #28a745;
        border-color: #28a745;
      }

      .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
      }

      .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
      }

      .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
      }

      .logout-icon {
        font-size: 1.4rem;
        margin-left: 10px;
      }

      .card {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }

      .alert {
        margin-top: 30px;
        padding: 15px;
        font-size: 1.1rem;
        border-radius: 8px;
      }

      .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border-color: #bee5eb;
      }
    </style>

    <title>Admin Panel</title>
  </head>

  <body>
    <div class="container">
      <h2>ยินดีต้อนรับผู้ดูแลระบบ</h2>
      <p><i class='bx bx-user-voice'></i> สวัสดีคุณ <?php echo $row["emp_title"];
                                                    echo $row["emp_name"];
                                                    echo "&nbsp";
                                                    echo $row["emp_surname"]; ?> 
        <a href="logout.php" class="btn btn-danger btn-sm">
          <i class='bx bx-lock-open bx-flashing logout-icon'></i> Log Out
        </a>
      </p>

      <div class="card">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>คำนำหน้า</th>
              <th>ชื่อ</th>
              <th>สกุล</th>
              <th>วันเกิด</th>
              <th>ที่อยู่ปัจจุบัน</th>
              <th>ทักษะความสามารถ</th>
              <th>เบอร์โทรศัพท์</th>
              <th>แก้ไข</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $row["emp_title"]; ?></td>
              <td><?php echo $row["emp_name"]; ?></td>
              <td><?php echo $row["emp_surname"]; ?></td>
              <td><?php echo $row["emp_birthday"]; ?></td>
              <td><?php echo $row["emp_adr"]; ?></td>
              <td><?php echo $row["emp_skill"]; ?></td>
              <td><?php echo $row["emp_tel"]; ?></td>
              <!--แก้ไขข้อมูล-->
              <td><a href="editformdata.php?emp_id=<?php echo $row["emp_id"] ?>" class="btn btn-success">แก้ไข</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="alert alert-info">
        <p>โปรดตรวจสอบข้อมูลของผู้ใช้อย่างรอบคอบก่อนทำการแก้ไข</p>
      </div>
      
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
  <?php  } ?>

  </html>
