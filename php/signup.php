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

    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($repassword) || empty($gender))
    {

        // header("Location:../register.php?error=emptyfields&fname=" . $firstname . "&lname=" . $lastname . "&uname=" . $username . "&email=" . $email );
        echo "<script>alert('There an empty fields');
        document.location='../register.php'</script>";
        exit();

    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^\d{10}+$/", $mobile) && !preg_match("/^[a-zA-Z0-9]+$/", $username))
    {
        // header("Location:../register.php?error=invaliderere&fname=" . $firstname . "&lname=" . $lastname . "&uname=" . $username . "&email=" . $email );
        echo "<script>alert('There an empty fields ');
        document.location='../register.php'</script>";
        exit();

    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<script>alert('There an empty fields ');
        document.location='../register.php'</script>";
        exit();
    }

    elseif (!preg_match("/^[a-zA-Z0-9]+$/", $username))
    {
        echo "<script>alert('There an empty fields ');
        document.location='../register.php'</script>";
        exit();
    }
    elseif ($password !== $repassword)
    {
        echo "<script>alert('There an empty fields ');
        document.location='../register.php'</script>";
        exit();
    }

    else
    {
        $sql = "SELECT uname FROM login_signup WHERE uname=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            // header("Location:../register.php?error=sqltterror");
            // echo '<script>alert("Sql Error Occurred");</script>';
            // exit();
            echo "<script>alert('There an empty fields ');
        document.location='../register.php'</script>";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0)
            {
                // header("Location:../register.php?error=usertaken&fname=" . $firstname . "&lname=" . $lastname . "&email=" . $email);
                // echo '<script>alert("Username or mobile already taken");</script>';
                // exit();
                echo "<script>alert('There an empty fields ');
                document.location='../register.php'</script>";
                exit();
            }
            else
            {
                $sql = "INSERT INTO login_signup(fname,lname,email,uname,pwd,gender) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    // header("Location:../register.php?error=sqlrrerror");
                    // echo '<script>alert("Sql Error Occurred");</script>';
                    // exit();
                    
                }
                else
                {
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $username, $hashedpwd, $gender);
                    mysqli_stmt_execute($stmt);
                    header("Location:../index.html");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location:../register.php");
    exit();
}