<?php
if (isset($_POST['rebtn']))
{

    require 'dbconnect.php';

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $repassword = $_POST['repwd'];
    $gender = $_POST['gender'];

                $sql = "INSERT INTO login_signup(fname,lname,email,uname,pwd,gender) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    // header("Location:../register.php?error=sqlrrerror");
                    // echo '<script>alert("Sql Error Occurred");</script>';
                    // exit();
                    echo "<script>alert('There an empty fields ');
                document.location='../register.php'</script>";
                exit();
                    
                }
                else
                {
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $username, $hashedpwd, $gender);
                    mysqli_stmt_execute($stmt);
                    header("Location:../index.html");
                    exit();
                }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location:../register.php");
    exit();
}

