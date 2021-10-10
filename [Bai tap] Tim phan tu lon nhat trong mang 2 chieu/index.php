<?php
$array = [
    [2, 4, 6, 8, 0], [1, 3, 5, 7, 9]
];
$max = $array[0][0];
$a = 0;
$b = 0;
for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array[$i]); $j++) {
        if ($array[$i][$j] > $max) {
            $max = $array[$i][$j];
            $a = $i;
            $b = $j;
        }
    }
}
var_dump($array);
echo "<br/>";
echo "Phần tử thứ ".$b." của mảng thứ ".$a." là phần tử lớn nhất. Có giá trị là: ".$max;