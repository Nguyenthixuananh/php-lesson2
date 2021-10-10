

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
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $size = $_REQUEST['size'];
}
?>
<form action="tinh-tong-duong-cheo-chinh.php" method="post">
    <table style="border: 1px">
        <?php for ($i = 0; $i < $size; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < $size; $j++): ?>
                    <td>
                        <label>
                            <input type="text" name="item-<?php echo $i . '-' . $j ?>" value="">
                        </label>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
        <input type="hidden" name="size" value="<?php echo $size?>">
    </table>
    <button type="submit">Sum</button>
</form>
</body>
</html>