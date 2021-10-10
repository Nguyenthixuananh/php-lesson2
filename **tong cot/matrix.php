<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $rows = $_REQUEST['rows'];
    $cols = $_REQUEST['cols'];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Sum of Column</title>
</head>
<body>
<h2>Sum of Column</h2>

<form action="action.php" method="post">
    <input type="hidden" name="rows" value="<?php echo $rows?>">
    <input type="hidden" name="cols" value="<?php echo $cols?>">
    <table style="border: 1px solid">
        <?php for ($i = 0; $i < $rows; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < $cols; $j++): ?>
                    <td>
                        <label>
                            <input type="text" name="item-<?php echo $i . '-' . $j ?>"
                                   value="<?php echo rand(1,10)?>">
                        </label>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    Enter column want to sum:<br>
    <label>
        <input type="text" name="key" value="">
    </label><br>
    <button type="submit">Find Sum</button>
</form>

</body>
</html>