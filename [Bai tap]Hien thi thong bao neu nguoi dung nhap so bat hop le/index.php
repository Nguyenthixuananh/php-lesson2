<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="number" name="inp1" placeholder="number1">
    <input type="number" name="inp2" placeholder="number2">
    <button type="submit">Calculator</button>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = $_POST["inp1"];
    $num2 = $_POST["inp2"];
    function calculator($num1, $num2)
    {
        if ($num2 == 0) {
            throw new Exception("Xảy ra ngoại lệ: / by zero");
        } else if ($num1 == null or $num2 == null) {
            throw new Exception("Chưa nhập đủ dữ liệu");
        }
    }

    try {
        calculator($num1, $num2);
        echo "Tổng " . $num1 . "+" . $num2 . "=" . ($num1 + $num2) . "<br>";
        echo "Hiệu " . $num1 . "-" . $num2 . "=" . ($num1 - $num2) . "<br>";
        echo "Tích " . $num1 . "*" . $num2 . "=" . ($num1 + $num2) . "<br>";
        echo "Thương " . $num1 . "/" . $num2 . "=" . ($num1 / $num2) . "<br>";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
