<?php
session_start(); // Start the session

// Database connection
$con = mysqli_connect("localhost", "root", "", "blood");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    if ($type == "Admin") {
        $query = "SELECT * FROM admin WHERE email = ? AND password = ?";
    } elseif ($type == "User") {
        $query = "SELECT * FROM register WHERE email = ? AND password = ?";
    } elseif ($type == "Doctor") {
        $query = "SELECT * FROM doctors WHERE email = ? AND password = ?";
    } elseif ($type == "Hospital") {
        $query = "SELECT * FROM hospital WHERE email = ? AND password = ?";
    } else {
        header("Location: login.php?st=fail");
        exit();
    }

    // Prepare and execute the query
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $rows = mysqli_num_rows($result);

        if ($rows > 0) {
            $row = mysqli_fetch_assoc($result);

            // Set session variables based on user type
            $_SESSION['email'] = $email;

            if ($type == "Admin") {
                $_SESSION['usertype'] = 'Admin';
                $_SESSION['aid'] = $row['id'];
                header("Location: admin/index.php");
            } elseif ($type == "User") {
                $_SESSION['usertype'] = 'User';
                $_SESSION['uid'] = $row['id'];
                $_SESSION['sname'] = $row['name'];
                header("Location: user/index.php");
            } elseif ($type == "Doctor") {
                $_SESSION['usertype'] = 'Doctor';
                $_SESSION['did'] = $row['id'];
                $_SESSION['dname'] = $row['name'];
                header("Location: doctor/index.php");
            } elseif ($type == "Hospital") {
                $_SESSION['usertype'] = 'Hospital';
                $_SESSION['hid'] = $row['id'];
                $_SESSION['hname'] = $row['name'];
                header("Location: hospital/index.php");
            }
        } else {
            header("Location: login.php?st=fail");
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
}
mysqli_close($con);
?>
