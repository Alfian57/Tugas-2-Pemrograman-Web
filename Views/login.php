<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tugas 2 - Alfian Gading</title>
    <link rel="stylesheet" href="/assets/css/login.css">
</head>

<body>
    <form action="/authenticate" method="POST">
        <?php if (isset($_SESSION['flash_message'])) : ?>
            <div class="flash-message error"><?= $_SESSION['flash_message'] ?></div>
            <?php unset($_SESSION['flash_message']); ?>
        <?php endif; ?>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" autofocus required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>

</html>