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
    echo "账号：" . "Jaysae777" . "<br>";
    echo "明文：" . "Jaysae" . "<br>";
    $md5 =  md5(time() . mt_rand(1, 1000000));
    $md5 = substr($md5, 4, 4) . substr($md5, 12, 4);
    echo "偏移：" . $md5 . "<br>";
    echo "密码：" . md5("Jaysae" . $md5) . "<br>";
    echo "头像：" . "/images/My Siner.jpg" . "<br>";
    ?>
</body>

</html>