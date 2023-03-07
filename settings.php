<?php
ob_start();
session_start();

if (isset($_SESSION['session'])) {
    $name = $_SESSION['session']['name'];
    $email = $_SESSION['session']['email'];
    ?>
    <h2>Settings</h2>
    <a href="/">Home</a>
    <a href="settings.php">Settings</a>
    <a href="logout.php">Logout</a>
    <form action="settings.php" method="post">
        <label>
            Email:
            <input type="text" name="name" value="<?php echo $email; ?>" disabled/>
        </label>
    </form>
    <button id="edit">Edit</button>
    <?php
} else {
    header("Location: /");
} ?>
<script>
    document.querySelector("#edit").addEventListener("click", edit);

    function edit() {
        document.querySelector("input[name='name']").disabled = false;
        document.querySelector("#edit").innerHTML = "Save";
    }
</script>
