<?php
$arr1=[1,3,5,7,9,12,15,18];
$arr2=[2,4,6,8,10,12,14,16];
$arr3=[];
for ($i=0;$i<count($arr1);$i++){
    array_push($arr3,$arr1[$i]);
}
for ($i=0;$i<count($arr2);$i++){
    array_push($arr3,$arr2[$i]);
}
var_dump($arr3);
