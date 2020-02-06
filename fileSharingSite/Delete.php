    <?php
    session_start();
    $username = $_SESSION['user'];
    $filetoDelete = $_POST['deletedfile'];
    $deleteDir = sprintf("/srv/uploads/%s/%s", $username, $filetoDelete);
    if (unlink($deleteDir)) {
        header("Location: FileShare.php");
    } else {
        echo "Delete Failed";
    }
    ?>