<?php
require_once('pdo/database.php');
require_once('model/user.php');

class UserPDO
{
    private array $data = array();

    // Return 1 user from database
    public function read($id_user): ?User
    {
        $MySQLQuery = 'SELECT * FROM user WHERE id_user = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_user]);
        $user = null;
        if (array_key_exists($id_user, $this->data)) {
            $user = $this->data[$id_user];
        } else {
            $user = $this->returnUsers($stmt->fetchAll())[0];
        }
        return $user;
    }

    // Return 1 user id from database
    public function getId(string $login, string $pwd): int
    {
        $MySQLQuery = 'SELECT * FROM user WHERE login = ? AND password = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([
            $login,
            $pwd
        ]);
        $user = $stmt->fetch();
        return $user ? $user['id_user'] : 0;
    }

    // Return all pools in $rows and update $data
    private function returnUsers(array $rows): array
    {
        $users = [];
        foreach ($rows as $row) {
            $id_user = $row['id_user'];
            $login = $row['login'];
            $pwd = $row['password'];
            $user = new User($login, $pwd, $id_user);
            $users[] = $user;
            $this->data[$id_user] = $user;
        }
        return $users;
    }
}
