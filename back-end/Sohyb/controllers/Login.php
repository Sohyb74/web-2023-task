
 <?php
    function alert($message)
    {
        echo "<script>alert('$message');</script>";
    }
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        require_once "../database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            //if (password_verify($password, $user["password"])) 
            if ($password = $user["password"]) {
                session_start();
                $_SESSION["user"] = true;
                $_SESSION["name"] = $user["name"];
                header("Location:../index.php");
                die();
            } else {
                alert("Password does not match");
            }
        } else {
            alert("Email does not match");
        }
    }
    ?>