<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Exercise</title>
</head>
<body>
<h2>Hiển thị thông báo nếu người dùng nhập vào chỉ số không hợp lệ</h2>
<?php
$array = [];
for ($i = 0; $i < 100; $i++) {
    array_push($array, rand(0, 99));
}
foreach ($array as $value) {
    echo $value . " ";
}

?>
<form action="" method="post">
    Enter position (from 0 to 100):<br>
    <label>
        <input type="number" name="key">
    </label>
    <br>
    <button type="submit">Find</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_POST['key'];
    try {
        if ($key < 0 || $key >= 100) {
            throw new Exception("Not valid position!");
        }
        echo "Number at position " . $key . " is: ";
        echo $array[$key];
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}

?>
<br>

</body>
</html>