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
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-login {
      width: 100%;
      max-width: 500px;
      padding: 30px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-login h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #50e7d4;
    }

    .form-control {
      border-radius: 10px;
    }

    .btn {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      font-size: 16px;
    }

    .btn-success {
      background-color: #50e7d4;
      border: none;
    }

    .btn-warning {
      background-color: #f1c40f;
      border: none;
    }

    .btn-info {
      background-color: #17a2b8;
      border: none;
    }

    .btn:hover {
      opacity: 0.9;
    }

    .form-text {
      text-align: center;
      margin-top: 20px;
    }
  </style>
  <title>เข้าสู่ระบบจัดการข้อมูลพนักงาน</title>
</head>

<body>
  <div class="form-login">
    <h2><i class='bx bxs-user-pin' style='color:#50e7d4'></i> เข้าสู่ระบบจัดการข้อมูลพนักงาน</h2>
    <form method="POST" action="chk.php">
      <div class="mb-3">
        <label for="username" class="form-label">ชื่อเข้าระบบ</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">รหัสผ่าน</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-success">เข้าสู่ระบบ</button>
      <button type="reset" class="btn btn-warning">ล้างข้อมูล</button>
      <a href="index.php" class="btn btn-info">กลับหน้าหลัก</a>
    </form>
    <p class="form-text">หากคุณยังไม่ได้สมัครสมาชิก <a href="#">คลิกที่นี่</a> เพื่อสมัครสมาชิก</p>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
