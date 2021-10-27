<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
  <div class='container col-md-4 mt-4'>
    <div class='card'>
      <div class='card-header bg-primary text-white'>
        Login
      </div>
      <div class='card-body'>
        <form action="" method="post" role="form">
          <div class='form-group'>
            <label>Email</label>
            <input type="text" name='email' class='form-control'>
          </div>
          <div class='form-group'>
            <label>Password</label>
            <input type="password" name='password' class='form-control'>
          </div>

          <button type="submit" class='btn btn-success' name='submit'>Login</button>

      </div>


      </form>
      <?php
      include('koneksi.php');

      if (isset($_POST['submit'])) {
        // $email = $_POST['email'];

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $data = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE email='$email'")
          or die(mysqli_error($koneksi));
        $row = mysqli_fetch_assoc($data);
        if ($password == $row['password']) {
          session_start();
          $_SESSION['email'] = $email;
      ?>
          <script>
            window.location = 'dashboard.php';
          </script>
        <?php
        } else {
        ?>
          <script>
            alert('Password tidak cocok.')
            window.location = 'login2.php'
          </script>
        <?php
        }
        ?>

      <?php
      }
      ?>

    </div>
  </div>



</body>

</html>