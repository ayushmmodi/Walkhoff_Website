<?php

if (isset($_POST["rebtn"]) == true) {
    $config = array(
        "digest_alg" => "sha512",
        "private_key_bits" => 512,
        "private_key_type" => OPENSSL_KEYTYPE_RSA
    );
    
    // Create the keypair  
    $res = openssl_pkey_new($config);
    // Get private key  
    openssl_pkey_export($res, $privkey);
    // Get public key  
    $pubkey = openssl_pkey_get_details($res);
    $pubkey = $pubkey["key"];
    
    
    require_once('database_connection.php');
    
    $fname  = $_POST['fname'];
    $lname  = $_POST['lname'];
    $email  = $_POST['email'];
    $uname  = $_POST['username'];
    $pwd    = $_POST['password'];
    $cfpwd  = $_POST['repassword'];
    $num    = $_POST['mobno'];
    $gender = $_POST['gender'];
    $dob    = $_POST['dob'];
    if ($pwd != $cfpwd) {
?>
<script>alert('Passwords did not match!');</script>
<?php
    } else {
        $sql = "SELECT * FROM users WHERE username='$uname' OR email='$email'";
        
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
?>
<script>alert('User already exist!');</script><?php
        } else {
            $sql1 = "INSERT INTO users(fname,lname,email,username,password,mobile,gender,dob) VALUES('$fname','$lname','$email','$uname','$pwd','$num','$gender','$dob')";
            
            $cmd = mysqli_query($conn, $sql1);
        }
        header("Location: ./index.php");
?>
<script>alert('User registered successfully!');</script><?php
        exit();
        
    }
}