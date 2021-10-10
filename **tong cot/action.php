<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    $rows = $_POST['rows'];
    $cols = $_POST['cols'];
    $key = $_POST['key'];
    $sum = 0;

    $array = [];
    for ($i = 0; $i < $rows; $i++) {
        $array[$i] = [];
        for ($j = 0; $j < $cols; $j++) {
            $array[$i][$j] = $_POST['item-' . $i . '-' . $j];
        }
    }
    if ($key< $cols && $key>=0){
        for($i=0;$i<$rows;$i++){
            $sum += $array[$i][$key];
        }
        echo "Sum of column no.".$key." is: ".$sum;
    }else{
        echo "ERROR!!";
    }
    echo '<form action="index.php"><input type="submit" value="Home">';
}