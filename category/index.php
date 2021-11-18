<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <?php
    include './add.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="./index.php" method="POST">
                    <h4>Add Category</h4>
                    <div class="form-outline">
                        <label class="form-label" for="typeText">Name:</label>
                        <input type="text" name="NameCate" id="typeText" class="form-control"/>
                    </div>
                    <div class="form-outline">
                        <label class="form-label" for="typeText">Description</label>
                        <input type="text" name="Des" id="typeText" class="form-control" />
                    </div>
                    <br>
                    <input type="submit" name="AddCategory" value="Add" class="btn btn-primary">
                    <?php if($error != false) { ?>
                    <label class="form-label" for="typeText"><?= $error ?></label>
                    <?php } ?>
                </form>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <h3>Category</h3>
                </div>
                <div class="row">
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:10%">#</th>
                                <th style="width:38%">Name</th>
                                <th style="width:52%" class="text-center">Description</th>
                            </tr>
                        </thead>
                        <?php
                        $liscategory = category::getAll();
                        if ($liscategory != null) {
                            $stt = 1;
                            while ($category = mysqli_fetch_assoc($liscategory)) {
                        ?>
                                <tbody>
                                    <tr>
                                        <td data-th="STT" class="text-center"><?= $stt++ ?></td>
                                        <td data-th="Price"><?= $category['Name'] ?></td>
                                        <td data-th="Subtotal"><?= $category['Description'] ?></td>
                                    </tr>
                                </tbody>
                        <?php }
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>