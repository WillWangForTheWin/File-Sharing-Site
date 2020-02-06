<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
    //Code for printing out
    $pathway = sprintf("/srv/uploads/%s", $username);
    $userfiles = scandir($pathway);
    for ($i = 2; $i < count($userfiles); $i++) {
        echo "<h3>$userfiles[$i]</h3>";
        echo "<form action='Delete.php' method='POST'>
         <input type='hidden' name= 'deletedfile' value='$userfiles[$i]' />
         <input type='submit' value='Delete' />
         </form>
         
         <form action='View.php' method='POST'>
         <input type='hidden' name= 'viewfile' value='$userfiles[$i]' />
         <input type='submit' value='View' />
         </form>
         
         <form action='Share.php' method='POST'>
         User to Share with:
         <input type='text' name='shareuser' />
         <input type='hidden' name= 'sharefile' value='$userfiles[$i]' />
         <input type='submit' value='Share' />
         </form><br />
         ";
    }
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: Login_Page.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Sharing Site</title>
    <link rel="stylesheet" type="text/css" href="file_css.css" />
</head>

<body>
    <form enctype="multipart/form-data" action="Upload.php" method="POST">
        <p>
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
            <label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
        </p>
        <p>
            <input type="submit" value="Upload File" />
        </p>
    </form>
    <form method="POST">
        <input type="hidden" name="logout" value="test" />
        <input type="submit" value="Logout" />
    </form>
</body>

</html>