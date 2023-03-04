<?php
session_start(); // Si no uso esta funcion no puedo acceder a los valores

var_dump($_SESSION);
if (isset($_SESSION["session"])) {
    echo "<p>Successfully session!</p>";
} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
</head>

<body>
    <div>
        <?php
        $email = $_SESSION['session']['email'];
        ?>
        <h2>Welcome to Facebook <?php echo $email ?></h2>
        <a href="me.php">Profile</a>
        <a href="settings.php">Settings</a>
        <a href="logout.php">Logout</a>
        <h2>New post</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="text" name="post" require>
            <input type="submit">
        </form>
    </div>
    <div>
        <h2>People</h2>
    </div>
    <div>
        <h2>Chat</h2>
    </div>
    <button onclick="window.location='/login.php'">Login</button>
</body>

</html>

<?php
if (isset($_POST["post"]) && !empty($_POST["post"])) {
    $post = $_POST["post"];
    $img_name = $_FILES["image"]["name"];
    $tmp_img_name  = $_FILES["image"]["tmp_name"];
    $folder = "uploads/";

    move_uploaded_file($tmp_img_name, $folder . $img_name);

    if (!isset($_SESSION["posts"]))
        $_SESSION["posts"] = array();


    array_push($_SESSION["posts"], array(
        "image_url" => $folder . $img_name,
        "post" => $post,
    ));
}

$posts = $_SESSION["posts"];
foreach ($posts as $post) {
?>
    <h3><?php echo $post["post"] ?></h3>
    <img src="<?php echo $post["image_url"]?>" width="300">
<?php
}
?>