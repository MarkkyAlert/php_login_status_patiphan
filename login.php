<?php
    session_start();

    if (isset($_POST['username'])) {
        include('connection.php');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$passwordenc'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['id'];
            $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
            $_SESSION['userlevel'] = $row['userlevel'];

            if ($_SESSION['userlevel'] == 'a') {
                header('location: admin_page.php');
            }

            if ($_SESSION['userlevel'] == 'm') {
                header('location: user_page.php');
            }
        }

        else {
            echo "<script>alert('Username or password incorrect);</script>";
        }
    }

    else {
        header('location: index.php');
    }
?>