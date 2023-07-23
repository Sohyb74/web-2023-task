<?php
if (isset($_GET['id'])) {
    include('db/connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM books WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["delete"] = "Book Deleted Successfully!";
        if (isset($_SESSION['user'])) {
            header("Location:index.php");
        } else {
            header("Location:index_admin.php");
        }
    } else {
        die("Something went wrong");
    }
} 
else {
    echo "Book does not exist";
}
