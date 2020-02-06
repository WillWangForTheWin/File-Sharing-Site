<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Sharing Site</title>
    <link rel="stylesheet" type="text/css" href="login_css.css" />
</head>

<body>
    <h1>
        Welcome to Our File Sharing Site
    </h1>
    <form name="input" method="POST">
        <label>Username: <input type="text" name="username"></label>
        <input type="submit" value="Login">
    </form>

    <?php
    session_start();
    if (isset($_POST["username"])) {
        $username = $_POST["username"];
        $allowed_names = fopen("/var/fileshare/user.txt", "r");
        while (!feof($allowed_names)) {
            $h = trim(fgets($allowed_names));
            if ($username == $h) {
                $_SESSION['user'] = $username;
                header("Location: FileShare.php");
            }
        }
        echo "<br>The username you entered was not valid";
    }
    ?>
</body>

</html>