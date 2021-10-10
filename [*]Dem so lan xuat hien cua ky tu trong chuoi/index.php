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
    <input type="text" name="input" placeholder="Enter character">
    <input type="submit" value="To Count">
</form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $input = $_POST["input"];
    $str = "hello every one i am eighteen years old";
    $arrStr = str_split($str);
    $count = 0;
    for ($i=0; $i<count($arrStr); $i++ ) {
        if ($input==$arrStr[$i]) {
            $count ++;
        }
} echo "There are ".$count." characters in string";
//var_dump($arrStr);
//echo strleN($str);

}


?>