<?php
$dirname = getcwd();
require $dirname . "/components/header.php";
$name = $email = $body = '';
$name_error = $email_error = $body_error = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $name_error = "Name is required";
    } else {
        $name = htmlspecialchars($_POST['name']);
    }
    if (empty($_POST['email'])) {
        $email_error = "Email is required";
    } else {
        $email = htmlspecialchars($_POST['email']);
    }
    if (empty($_POST['body'])) {
        $body_error = "Body is required";
    } else {
        $body = htmlspecialchars($_POST['body']);
    }
    $validate_success = empty($name_error) && empty($body_error) && empty($email_error);
    if ($validate_success) {
        $sql = "INSERT INTO feedback(name, email, body) VALUES (?, ?, ?)";
        try {
            $statement = $connection->prepare($sql);
            $statement->bindParam(1, $name);
            $statement->bindParam(2, $email);
            $statement->bindParam(3, $body);
            $statement->execute();
            echo "Inserted feedback";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="mb-3">
            <input type="text"
                   class="form-control"
                   name="name"
                   placeholder="What is your name?">
            <p><?php echo $name_error ?? "" ?></p>
        </div>
        <div class="mb-3">
            <input type="email"
                   class="form-control"
                   name="email"
                   placeholder="Enter your email">
            <p><?php echo $email_error ?? "" ?></p>
        </div>
        <div class="mb-3">
    <textarea
            class="form-control"
            name="body"
            placeholder="Enter your feedback"
            rows="2"></textarea>
            <p><?php echo $body_error ?? "" ?></p>
        </div>
        <div class="mb-3">
            <input type="submit"
                   class="btn btn-primary"
                   name="submit"
                   value="Send">
        </div>
    </form>
<?php include $dirname . '/components/footer.php'; ?>