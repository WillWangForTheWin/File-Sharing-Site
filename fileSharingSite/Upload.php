    <?php
    session_start();
    $filename = basename($_FILES['uploadedfile']['name']);
    if (!preg_match('/^[\w_\.\-]+$/', $filename)) {
        echo "Invalid filename";
        exit;
    }
    $username = $_SESSION['user'];
    if (!preg_match('/^[\w_\-]+$/', $username)) {
        echo "Invalid username";
        exit;
    }

    $full_path = sprintf("/srv/uploads/%s/%s", $username, $filename);
    $admin_path = sprintf("/srv/uploads/Admin/%s", $filename);
    if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path)) {
        copy($full_path, $admin_path);
        header("Location: FileShare.php");
        exit;
    } else {
        echo "File Failed to Upload. Try Again";
    }
    ?>