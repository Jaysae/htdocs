<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    echo $_POST["name"];
    $con = mysqli_connect("localhost", "root", "", "test");
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    $result = mysqli_query($con, "UPDATE table_test SET value='" . $_POST["name"] . "' WHERE id=1;");
    mysqli_close($con);
    ?>
</body>

</html>