<?php
if (isset($_POST['lobtn']))
{
    require 'dbconnect.php';

    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if (empty($email) || empty($password))
    {
        // header("Location:../login.php?erroreayushmptyflields");
        echo "<script>alert('There an empty fields ');
        document.location='../register.php'</script>";
        exit();
    }
    else
    {
        $sql = "SELECT * FROM login_signup WHERE uname=? OR email=?; ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location:../login.php?error==sqlerror");
            //     echo "<script>alert('There an empty fields ');
            // document.location='../register.php'</script>";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $email, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result))
            {
                $pwdCheck = password_verify($password, $row["pwd"]);
                if ($pwdCheck == false)
                {
                    header("Location:../login.php?error=wronayushgpwd");
                    echo ($pwdCheck);
                    // echo "<script>alert('wrong pwd ');
                    // document.location='../register.php'</script>";
                    exit();
                }
                elseif ($pwdCheck == true)
                {
                    session_start();
                    $_SESSION['userId'] = $row['userid'];
                    $_SESSION['userfname'] = $row['fname'];
                    $_SESSION['userlname'] = $row['lname'];
                    $_SESSION['username'] = $row['uname'];
                    // echo "<script>alert('login Succes ');
                    // document.location='../login.php'</script>";
                    header("Location:../index.html?loginsuucess");
                    exit();
                }
                else
                {
                    // echo "<script>alert('wrong pwd ');
                    // document.location='../register.php'</script>";
                    header("Location:../login.php?wrongpwd");
                    exit();
                }
            }
            else
            {
                header("Location:../login.php?nouserindb");
                //         echo "<script>alert('there is nouser with this emial ');
                // document.location='../register.php'</script>";
                exit();
            }
        }
    }
}
else
{
    header("Location:../login.php?eeeee");
    exit();
}
?>
