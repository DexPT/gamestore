<?php

require_once("base.php");

class User extends Base
{
    public function getUser()
    {
        return $this->getAll("users", "user_id, name, address, birth_date, email, is_admin, password");
    }

    public function getUserById($id)
    {
        return $this->getId("users", "user_id, name, address, birth_date, email, is_admin, password", "user_id", $id);
    }

    public function insertUser($username, $name, $address, $birth_date, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $this->insert("users", "username, name, address, birth_date, email, password", "'{$username}','{$name}', '{$address}', '{$birth_date}', '{$email}', '{$hashedPassword}'");
    }

    public function updateUser($id, $username, $name, $address, $birth_date, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $this->update("users", "username = '{$username}', name = '{$name}', address = '{$address}', birth_date = '{$birth_date}', email = '{$email}', password = '{$hashedPassword}'", "user_id = {$id}");
    }

    public function deleteUser($id)
    {
        return $this->delete("users", "user_id = {$id}");
    }

    public function getByEmail($email)
    {
        $query = $this->db->prepare("
            SELECT user_id, name, username, email, password
            FROM users
            WHERE email = ?
        ");
        $query->execute([$email]);
        return $query->fetch();
    }

    public function getUserInfo($userId)
    {
        $query = $this->db->prepare("SELECT username, email FROM users WHERE user_id = ?");
        $query->execute([$userId]);
        return $query->fetch();
    }

    public function getUserOrders($userId)
    {
        $query = $this->db->prepare("SELECT * FROM orders WHERE user_id = ?");
        $query->execute([$userId]);
        return $query->fetchAll();
    }
}
