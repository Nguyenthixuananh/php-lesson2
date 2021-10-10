<?php
$customerList = array(
    array("name"=> "Mai Văn Hoàn","birthday"=>"1983/08/20","address"=>"Hà Nội","image"=>"image/img1.png"),
    array("name"=> "Nguyễn Văn Nam","birthday"=>"198308/21","address"=>"Bắc Giang","image"=>"image/img2.png"),
    array("name"=> "Nguyễn Thái Hòa","birthday"=>"1983/08/22","address"=>"Nam Định","image"=>"image/img3.png"),
    array("name"=> "Trần Đăng Khoa","birthday"=>"1983/08/17","address"=>"Hà Tây","image"=>"image/img4.png"),
    array("name"=> "Nguyễn Đình Thi","birthday"=>"1983/08/19","address"=>"Hà Nội","image"=>"image/img5.png"),
);
function searchByDate($customers, $fromDate, $toDate)
{
    if (empty($fromDate) || empty($toDate)) {
        return $customers;
    }

    $filteredCustomers = [];
    foreach ($customers as $customer) {
        if (strtotime($customer['birthday']) < strtotime($fromDate))
            continue;
        if (strtotime($customer['birthday']) > strtotime($toDate))
            continue;
        $filteredCustomers[] = $customer;
    }
    return $filteredCustomers;
}
//Hàm empty() là một hàm chuyên kiểm tra dữ liệu rỗng trong php
//Hàm strtotime() sẽ phân tích bất kỳ chuỗi thời gian bằng
// tiếng anh thành một số nguyên chính là timestamp của thời gian đó.
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loc ds khach hang</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        caption {
            background-color: aqua;
        }
        form {
            text-align: right;
        }

    </style>
</head>
<body>
<?php
$fromDate = null;
$toDate = null;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_REQUEST["form"]))
        $fromDate = $_REQUEST["from"];
    if(isset($_REQUEST["to"]))
        $toDate = $_REQUEST["to"];
}
$filteredCustomers = searchByDate($customerList, $fromDate, $toDate);

?>
<!--Lấy $fromDate và $toDate từ form và gọi hàm lọc khách hàng.-->
<form method="get">
    Chọn ngày sinh từ: <input id="from" type="date" name="from" placeholder="yyyy/mm/dd"
                              value="<?php echo isset($fromDate) ? $fromDate : ''; ?>"/>
    đến: <input id="to" type="date" name="to" placeholder="yyyy/mm/dd"
                value="<?php echo isset($toDate) ? $toDate : ''; ?>"/>
    <input type="submit" id="submit" value="Lọc"/>
</form>
<table>
    <caption><h1>Danh sách khách hàng</h1></caption>
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Anh</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($customerList as $key=>$customer):?>
        <tr>
            <td><?php echo $key+1?></td>
            <td><?php echo $customer["name"]?></td>
            <td><?php echo $customer["birthday"]?></td>
            <td><?php echo $customer["address"]?></td>
            <td>
                <div class="image"><img style="width: 100px" src="<?php echo $customer['image']; ?>"/></div>
            </td>
        </tr>

    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>
