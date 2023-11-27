<?php

session_start();

if(isset($_SESSION['user'])) header('location: dashboard.php');
    $err_message = '';

    if ($_POST) {
        include('database/connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = 'SELECT * FROM users WHERE users.email= "' . $username . '" AND users.password= "' . $password . '"';
        $stmt = $conn->prepare($query);
        $stmt->execute();


        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0];
            $_SESSION['user'] = $user;
            header('location: dashboard.php');
        } else{
            $err_message = 'Help';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>IMS Login - Inventory Management System</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body id="loginBody">
<div class="container">
    <?php if (!empty($err_message)) { ?>
        <div id="errorMessage">
            <strong>Error:</strong><p> <?php echo $err_message ?> </p>
        </div>
    <?php } ?>
    <div class="loginHeader"><a href="login.php">
            <h1> IMS</h1>
            <p>Inventory Management System</p>
        </a>
    </div>
    <div class="loginBody">

        <form action="login.php" method="POST">
            <div class="loginInputsContainer">
                <label for="">Username</label>
                <input placeholder="username" name="username" type="text"/>
            </div>
            <div class="loginInputsContainer">
                <label for="">Password</label>
                <input placeholder="password" name="password" type="password"/>
            </div>
            <div class="loginButtonContainer">
                <button>login</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>