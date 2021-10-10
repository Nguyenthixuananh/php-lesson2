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
    <input type="number" name="X" placeholder="X">
    <input type="submit" value="Delete X">
</form>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arr = [2, 4, 6, 8, 10, 1, 3, 5, 7, 9];
    $numberX = $_POST["X"];
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i]==$numberX) {
            $index_del = $i;
            echo $numberX . " is in array and in index " . $index_del . "<br/>";
            array_push($arr, 0);
            array_splice($arr, $i, 1);
        }
    }
    echo "After delete X: ";
    var_dump($arr);


}
?>

