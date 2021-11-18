<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <?php
    require '../class/category.php';
    include './add.php';
    ?>
    <div class="container">
        <form action="" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <h4>Add Vegetable</h4>

                    <div class="row">
                        <div class="col-md-8">
                            <?php
                            if ($error != false) {
                            ?>
                                <p style="color : red;"><?= $error ?></p>
                            <?php } ?>
                            <label for="form">Vegetable Name:</label>
                            <input class="form-control" name="NameVege" type="text" placeholder="Orange" required>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="form">Unit:</label>
                                    <input type="text" id="form1" name="Unit" class="form-control" placeholder="Kg" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="form">Amount:</label>
                                    <input type="number" id="form1" name="Amount" class="form-control" placeholder="20" min="1" max required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Image:</label>
                                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" placeholder="Orange.jpg" required>
                            </div>
                            <input type="submit" name="AddVegetable" value="Add" class="btn btn-primary">
                        </div>
                        <div class="col-md-4">
                            <label for="form">Category Name:</label>
                            <select class="form-control" name="NameCategory">
                                <?php
                                $listcategory = category::getAll();
                                while ($row = mysqli_fetch_assoc($listcategory)) {
                                ?>
                                    <option value="<?= $row['CategoryID'] ?>"><?= $row['Name'] ?></option>
                                <?php } ?>
                            </select>
                            <label for="form">Price:</label>
                            <input class="form-control" type="number" name="Price" placeholder="5000" min="1" required>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>