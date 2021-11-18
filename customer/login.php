<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <?php
    include "../customer/checkLogin.php";
    ?>
    <div class="container">
        <form action="./login.php" method="POST">
            <h1>Login</h1>
            <!-- ID input -->
            <?php
            if ($error != false) {
            ?>
                <span style="color: red;"><?= $error ?></span>
            <?php } ?>
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example1">Your's ID:</label>
                <input type="text" id="form1Example1" name="nameid" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example2">Password:</label>
                <input type="password" id="form1Example2" name="passwd" class="form-control" />
            </div>

            <!-- Submit button -->
            <div class="d-grid gap-2 d-md-block">
                <input type="submit" class="btn btn-primary" name="login" value="Login">
                <a class="btn btn-primary" href="./register.php" type="button">Register</a>
            </div>

        </form>
    </div>
</body>

</html>