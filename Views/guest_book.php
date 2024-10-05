<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="/assets/css/guest_book.css">
</head>

<body>
    <div class="container">
        <h1>Buku Tamu</h1>

        <?php if (isset($_SESSION['flash_message'])) : ?>
        <div class="flash-message"><?= $_SESSION['flash_message'] ?></div>
        <?php unset($_SESSION['flash_message']); ?>
        <?php endif; ?>

        <form class="guest-book-form" action="/guest-books" method="POST">
            <div class="form-group">
                <label for="comment">Komentar:</label>
                <textarea id="comment" name="comment" placeholder="Tulis komentar Anda" required></textarea>
            </div>
            <button type="submit">Kirim</button>
        </form>

        <h2>Daftar Buku Tamu</h2>
        <table class="guest-book-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Komentar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guestBooks as $guestBook) : ?>
                <tr>
                    <td><?= $guestBook['name'] ?></td>
                    <td><?= $guestBook['email'] ?></td>
                    <td><?= $guestBook['comment'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>