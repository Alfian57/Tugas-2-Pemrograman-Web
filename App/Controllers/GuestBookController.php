<?php

namespace App\Controllers;

use Repositories\GuestBookRepository;

class GuestBookController
{
    private $repository;

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['flash_message'] = 'You must login first';
            header('Location: /');
            return;
        }

        $this->repository = new GuestBookRepository();
    }

    public function index(): void
    {
        $guestBooks = $this->repository->getAllWithUser();
        require_once __DIR__ . '/../../Views/guest_book.php';
    }

    public function create(): void
    {
        $comment = $_POST['comment'];
        $userId = $_SESSION['user']['id'];

        if (empty($comment)) {
            $_SESSION['flash_message'] = 'Comment is required';
            header('Location: /guest-books');
            return;
        }

        $this->repository->create($userId, $comment);
        $_SESSION['flash_message'] = 'Comment has been added';
        header('Location: /guest-books');
    }
}
