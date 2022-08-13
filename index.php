<?php
    session_start();
    require_once 'conn.php';

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $query = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($query);
        $result = mysqli_num_rows($query);

        if ($result) {
            $_SESSION['auth_email'] = $email;
            
            $_SESSION['auth_role_id'] = $user['role_id'];

            header ('Location: dashboard.php');
        } else {
            header('Location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Pharma Loging page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS File -->
    <link rel="stylesheet" href="css/style_login.css">

</head>

<body style="background-image: url('image/back_pharma.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;">

    <div class="login">

        <h1 class="text-center"> <span style="color:green;font-weight:bold">L</span>ogin</h1>
        
        <form class="needs-validation" action="" method="post">
            <div class="form-group">
                <label class="form-label" for="email"><strong>Email</strong> </label>
                <input class="form-control" type="email" id="email" required name="email" />
            </div>

            <div class="form-group">
                <label class="form-label" for="password"><strong> Password</strong> </label>
                <input class="form-control" type="password" id="password" required name="password" />
                
                <a href="#" style="text-align:right;">Forgot password?</a>
            </div>

            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" id="check">
                <label class="form-check-label" for="check"><strong> Remember me</strong> </label>
            </div>

            <input class="btn btn-success w-100" type="submit" value="SIGN IN" />
        </form>
    </div>
</body>

</html>