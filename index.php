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
    <title>Document</title>
</head>

<body>
    <div>
        <h2>New post</h2>
        <form action="/" method="post">
            <input type="file" name="image" accept="image/*">
            <input type="text" name="post" require>
            <input type="submit">
        </form>
    </div>
    <button onclick="window.location='/login.php'">Login</button>
</body>

</html>

<?php
if (isset($_POST["post"]) && !empty($_POST["post"])) {
    $post = $_POST["post"];
    var_dump($_POST);
    var_dump($_FILES);
    $target_dir="uploads/";
    $target_file = $target_dir . basename($_FILES['image']);
    if (getimagesize($_FILES["image"]["tmp_name"]))
        echo "PPP";
    echo "<h2>$post</h2>";
}
?>