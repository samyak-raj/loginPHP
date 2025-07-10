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
    <h1>Registration form</h1>
    <form action="" method="POST">
        Name:
        <input type="text" name="Name" id="">
        <br> <br>

        Email:
        <input type="text" name="Email" id="">
        <br> <br>

        Password:
        <input type="password" name="Pass" id="">
        <br><br>

        Confirm Password:
        <input type="password" name="Cpass" id="">
        <br> <br>

        <input type="submit" value="Submit" name="Submit">
        <button><a href="loginform.php">Login</a></button>
        <?php
        if(isset($_POST['Submit'])) {
            $Name = $_POST['Name'];
            $Email= $_POST['Email'];
            $Password= $_POST['Pass'];
            $Cpassword= $_POST['Cpass'];


            if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Email is invalid')</script>";
            }
            
            else if ($Password !== $Cpassword) {
               echo "<script>alert('Passwrod and confirm password not match')</script>"; 
            }
            else {
                $sql = "SELECT * FROM reg WHERE Email='$Email'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num > 0) {
                    echo "<script>alert('Email already exists')</script>";
                }
                else {
                    $Pass = md5($Password);
                    $sql = "INSERT INTO reg VALUES('$Name', '$Email', '$Pass')";
                    $result = mysqli_query($conn, $sql);
        
                    if ($result) {
                        echo "<script>alert('registration successful!')</script>";
                    } else {
                        echo "Error occured: " . mysqli_error($conn);
                    }
                }

            }
        }
        
        
        ?>
    </form>
</body>
</html>