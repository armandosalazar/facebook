<?php
ob_start(); // Activa el almacenamiento en búfer de la salida, para que no se envíe nada al navegador hasta que se llame a la función ob_end_flush(), para la advertencia de headers enviados
session_start(); // Si no uso esta función no puedo acceder a los valores

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
    <style>
        body {
            font-family: -apple-system, system-ui;
        }
    </style>
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
        <label>
            <textarea name="post" cols="30" rows="5"></textarea>
        </label>
        <input type="submit">
    </form>
</div>
<div>
    <h2>People</h2>
    <?php
    $people = array(
        array(
            "name" => "John",
            "email" => "john@email.com",
        ),
        array(
            "name" => "Jane",
            "email" => "jane@email.com"
        ),
        array(
            "name" => "Jack",
            "email" => "jack@email.com"
        ),
    );
    foreach ($people as $person) {
        echo "<h3>{$person['name']}</h3>";
        echo "<p>{$person['email']}</p>";
    }
    ?>
</div>
<div class="chat">
    <h2>Chat</h2>
    <input type="text">
    <input type="submit">
</div>
<button onclick="window.location='/login.php'">Login</button>
<button onclick="window.location='/clear-post.php'">Clear post</button>
</body>

</html>

<?php
if (isset($_POST["post"]) && !empty($_POST["post"])) {
    $post = $_POST["post"];
    $img_name = $_FILES["image"]["name"];
    $tmp_img_name = $_FILES["image"]["tmp_name"];
    $folder = "uploads/";

    move_uploaded_file($tmp_img_name, $folder . $img_name);

    if (!isset($_SESSION["posts"]))
        $_SESSION["posts"] = array();


    $_SESSION["posts"][] = array(
        "image_url" => $folder . $img_name,
        "post" => $post,
    );
}
if (!isset($_SESSION["posts"]))
    $_SESSION["posts"] = array();

$posts = $_SESSION["posts"];
foreach ($posts as $post) {
    echo "<h3>$post[post]</h3>";
    if ($post["image_url"] == "uploads/")
        continue;
    else
        echo "<img src='$post[image_url]' width='500' alt='image of post'>";
}
?>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .chat {
        width: 300px;
        height: 300px;
        border: 1px solid black;
        overflow: auto;
        position: absolute;
        bottom: 0;
        right: 0;
    }
</style>

<script !src="">
    const ws = new WebSocket("ws://localhost:8080/daemon.php");
    ws.onopen = function () {
        console.log("Connected to server");
    };
    ws.onmessage = function (e) {
        console.log(e.data);
        const chat = document.querySelector(".chat");
        const p = document.createElement("p");
        p.innerHTML = e.data;
        chat.appendChild(p);
    };
    ws.onclose = function () {
        console.log("Disconnected from server");
    };
    ws.onerror = function (e) {
        console.log(e);
    };
    document.querySelector("input[type='submit']").addEventListener("click", function (e) {
        e.preventDefault();
        const input = document.querySelector("input[type='text']");
        const message = input.value;
        ws.send(message);
        input.value = "";
    });
</script>
