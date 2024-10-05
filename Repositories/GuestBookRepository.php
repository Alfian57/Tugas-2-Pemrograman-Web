<?php

namespace Repositories;

use Core\Database;
use PDO;

class GuestBookRepository
{
    private PDO $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllWithUser()
    {
        $stmt = $this->db->prepare('SELECT * FROM guest_books JOIN users ON guest_books.user_id = users.id');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($user_id, $comment): void
    {
        $stmt = $this->db->prepare('INSERT INTO guest_books(`user_id`, `comment`) VALUES(:user_id, :comment)');
        $stmt->execute([
            'user_id' => $user_id,
            'comment' => $comment
        ]);
    }
}
