<?php
$fullNameErr = "";
$passwordErr = "";
$RePasswordErr = "";
$emailErr = "";
$dobErr = "";

function getDayOfMonth($month, $year) {
    if (!($month >= 1 && $month <= 12)) {
        return 0;
    }
    if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || month == 12) {
        return 31;
    }
    if ($month == 2) {
        if ($year % 400 == 0 || $year % 4 == 0 && year % 100 != 0) {
            return 29;
        }
        return 28;
    }
    return 30;
}

function validation() {
    $fullName = htmlspecialchars($_POST['fullName']);
    $password = htmlspecialchars($_POST['password']);
    $rePassword = htmlspecialchars($_POST['rePassword']);
    $dob = htmlspecialchars($_POST['dob']);
    $email = htmlspecialchars($_POST['email']);
    global $fullNameErr;
    global $passwordErr;
    global $rePasswordErr;
    global $emailErr;
    if (preg_match("/[0-9]+/", $fullName)) {
        $fullNameErr = $fullNameErr . "Tên không được chứa số<br>";
    }
    if (preg_match("/[!@#$%^&*()_+-=,\.<>?]+/", $fullName)) {
        $fullNameErr = $fullNameErr . "Tên không được chứa ký tự đặc biệt<br>";
    }
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/", $password)) {
        $passwordErr = $passwordErr . "Mật khẩu không hợp lệ.<br>";
    }
    if ($password != $rePassword) {
        $rePasswordErr = $rePasswordErr . "Hai mật khẩu không giống nhau.<br>";
    }
    if (!preg_match("/\b[A-Za-z0-9._]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/", $email)) {
        $emailErr = $emailErr . "Tên không hợp lệ.<br>";
    }
}

if (isset($_POST['submit'])) {
    validation();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="post">
            <label>Họ tên: </label>
            <input type="text" name="fullName"><br>
            <?php echo $fullNameErr ?? "" ?>
            <label>Mật khẩu: </label>
            <input type="password" name="password"><br>
            <label>Nhập lại mật khẩu: </label>
            <input type="password" name="rePassword"><br>
            <label>Ngày tháng năm sinh: </label>
            <input type="date" name="dob"><br>
            <label>Email: </label>
            <input type="email" name="email"><br>
            <input type="submit" name="submit" value="submit">
        </form>
    </body>
</html>
