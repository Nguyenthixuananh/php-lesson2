<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            width: 100px;
            height: 100px;
        }
        td,tr{
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>
<form action="ma_tran.php"method="post">
    <label for="size">Tạo ma trận vuông</label><br>
    <input type="number" name="size" id="size" placeholder="Row = Col">
    <input type="submit" value="submit">
</form>
</body>
</html>