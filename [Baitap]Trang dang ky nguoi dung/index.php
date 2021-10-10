<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        span {
            color: red;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px #ccc solid;
        }

        form {
            width: 550px;
        }
    </style>
</head>
<body>
<?php
//B3: Lay du lieu gui len tu form thong qua bien $_POST
//B4: Xu ly kiem tra khong de trong va mail
$nameErr = NULL;
$emailErr = NULL;
$phoneErr = NULL;
$name = NULL;
$email = NULL;
$phone = NULL;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $has_error = false;
    if (empty($name)) {
        $nameErr = "Bắt buộc";
        $has_error = true;
    }
    if (empty($email)) {
        $emailErr = "Bắt buộc";
        $has_error = true;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Bắt Buộc";
            $has_error = true;
        }
    }

    if (empty($phone)) {
        $phoneErr = " Bắt buộc";
        $has_error = true;
    }

    if ($has_error == false) {
        saveDataJSON("users.json", $name, $email, $phone);
        $name = NULL;
        $email = NULL;
        $phone = NULL;
    }
}
//Ham luu du lieu vao file json
function loadRegistrations($filename)
{
//    lay du lieu tu file json
    $jsondata = file_get_contents($filename);
//    chuyen doi tu dang json sang mang du lieu
    $arr_data = json_decode($jsondata, true);
    return $arr_data;
}

function saveDataJSON($filename, $name, $email, $phone)
{
    try {
        $contact = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        );
        // chuyển đổi dữ liệu json thành mảng
        $arr_data = loadRegistrations($filename);
        // Đẩy dữ liệu người dùng vào mảng
        array_push($arr_data, $contact);
        // Chuyển đổi mảng đã cập nhật thành JSON
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        // ghi dữ liệu json vào tệp users.json
        file_put_contents($filename, $jsondata);
        echo "Lưu dữ liệu thành công!";
    } catch (Exception $e) {
        echo 'Lỗi: ', $e->getMessage(), "\n";
    }
}

?>
<!--B1: tao giao dien form dang ky
B2: Trong the form xac dinh thuoc tinh method la POST-->

<form action="" method="post">
    <fieldset style="width: 350px">
        <legend>Register</legend>
        <label for="name">Full Name: </label><br>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>"
               placeholder="Nguyễn Văn A"><span> * <?php echo $nameErr; ?></span><br>
        <label for="email">Email: </label><br>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>"
               placeholder="abc@gmail.com"><span> * <?php echo $emailErr; ?></span><br>
        <label for="phone">Phone: </label><br>
        <input type="number" name="phone" id="phone" value="<?php echo $phone; ?>"
               placeholder="0977460093"><span> * <?php echo $phoneErr; ?></span><br>
        <input type="submit" value="Register">
    </fieldset>
</form>

<?php
$registrations = loadRegistrations('users.json');
?>
<h2>Registration list</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php foreach ($registrations as $registration): ?>
        <tr>
            <td><?= $registration['name']; ?></td>
            <td><?= $registration['email']; ?></td>
            <td><?= $registration['phone']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>