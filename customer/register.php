<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <?php 
    include './saveRegister.php';
    ?>
    <div class="container">
        <form action="./register.php" method="POST">
            <h1>Register</h1>
            <!-- ID input -->
            <?php
            if ($error != false) {
            ?>
                <span style="color: red;"><?= $error ?></span>
            <?php } ?>
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example1">Your's Fullname:</label>
                <input type="text" id="form1Example1" name="fullname" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example2">Password:</label>
                <input type="password" id="form1Example2" name="passwd" class="form-control" />

            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example1">Address:</label>
                <input type="text" id="form1Example1" name="address" class="form-control" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example1">City:</label>
                <input type="text" id="form1Example1" name="city" class="form-control" />
            </div>

            <!-- Submit button -->
            <input type="submit" class="btn btn-primary" name="register" value="Register">
        </form>
    </div>
</body>

</html>