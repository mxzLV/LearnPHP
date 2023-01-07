<?php
session_start();
if (isset($_POST['submit'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    echo $email;
    echo $password;
    if ($email == "syhanhcbq@gmail.com" && $password == "syhanh") {
        $_SESSION['email'] = $email;
        header('Location: /dashboard.php');
    } else {
        echo "Incorrect email/password";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="">Email</label><br>
        <input type="email" name="email" id=""><br>
        <label for="">Password</label><br>
        <input type="password" name="password" id=""><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>