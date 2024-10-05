<?php

namespace Repositories;

use Core\Database;
use PDO;

class UserRepository
{
    private PDO $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getUserByEmail(string $email)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }
}
