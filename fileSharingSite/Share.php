    <?php
    session_start();
    $userfrom = $_SESSION['user'];
    $userto = $_POST['shareuser'];
    $file = $_POST['sharefile'];

    $path_from = sprintf("/srv/uploads/%s/%s", $userfrom, $file);
    $path_to = sprintf("/srv/uploads/%s/%s", $userto, $file);

    if (copy($path_from, $path_to)) {
        header("Location: FileShare.php");
        exit;
    } else {
        echo "File Failed to Share. Try Again";
    }
    ?>