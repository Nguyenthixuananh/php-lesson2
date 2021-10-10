<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $size = $_POST['size'];
    $sum = 0;

    $array = [];
    for ($i = 0; $i < $size; $i++) {
        $array[$i] = [];
        for ($j = 0; $j < $size; $j++) {
            $array[$i][$j] = $_POST['item-' . $i . '-' . $j];
        }
    }

    echo "tong duong cheo chinh: ";
    for ($i = 0; $i < $size; $i++) {
        $sum += $array[$i][$i];
    }
    echo $sum;
    echo '<form action="index.php"><input type="submit"  value="Home">';
}