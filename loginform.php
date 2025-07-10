<?php
include 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login form</h1>
    <form action="" method="POST">
        Email:
        <input type="email" name="Email" id="">
        <br> <br>

        Password:
        <input type="password" name="Pass" id="">
        <br> <br>
        <input type="submit" value="Submit" name="Submit">

    </form>

    <?php
    if (isset($_POST['Submit'])) {
        $Email = $_POST['Email'];
        $Password= md5($_POST['Pass']);
        $sql = "SELECT * FROM reg WHERE Email='$Email' and Password='$Password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            echo "<script>alert('Login Successful')</script>";
            echo "<script>location.href='welcome.php'</script>";
        }
        else {
            echo "<script>alert('Invalid Login')</script>";
        }
    } 
    ?>
</body>
</html>