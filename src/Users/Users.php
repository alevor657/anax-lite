<?php

namespace Alvo16\Users;

class Users implements \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\AppInjectableTrait;

    public function getUserData($name)
    {
        $this->app->db->connect();
        $data = $this->app->db->executeFetchAll("SELECT * FROM users WHERE username = '$name'");

        return $data[0];
    }

    public function register($data)
    {
        $this->app->db->connect();

        $isDataValid = self::checkRegisterData($data);

        $username = $data['uname'];
        $psw = $data['psw'];
        // $pswRepeat = $data['pswrepeat'];
        $admin = isset($data['admin']) ? 1 : 0;

        if ($isDataValid) {
            // Encrypt password
            $psw = self::encryptPassword($psw);

            // Push user to the database
            self::addUser($username, $psw, $admin);

            // Redirect to the profile page
            self::login($data);
            header("Location: " . $this->app->url->create('profile')); //profile
        } else {
            // Redirect to error message
            header("Location: " . $this->app->url->create('wrongFormData'));
        }
    }

    public function login($data)
    {
        $isValid = self::checkLoginData($data);
        $username = $data['uname'];

        if ($isValid) {
            $this->app->session->set("user", $username);
            $this->app->cookie->set($username, "testCookie!");
            header("Location: " . $this->app->url->create('profile'));
        } else {
            header("Location: " . $this->app->url->create('wrongFormData'));
        }
    }

    public function logout()
    {
        $this->app->session->destroy();
        header("Location: " . $this->app->url->create(''));
    }

    public function updateProfile($data)
    {
        $username = $data['uname'];
        $password = empty($data['psw']) ? null : $data['psw'];
        $id = $data['id'];
        $admin = isset($data['admin']) ? 1 : 0;

        $pswHash = self::encryptPassword($password);

        $this->app->db->connect();

        $prevUsername = $this->app->db->executeFetchAll(
            "SELECT username FROM users WHERE id = '$id'"
        )[0]->username;

        if (empty($password)) {
            $sql = "UPDATE users
            SET
                username = '$username',
                admin = '$admin'
            WHERE username = '$prevUsername'";
        } else {
            $sql = "UPDATE users
            SET
                username = '$username',
                password = '$pswHash',
                admin = '$admin'
            WHERE username = '$prevUsername'";
        }

        $this->app->db->execute($sql);

        // self::login($data);
    }

    private function checkRegisterData($data)
    {
        $this->app->db->connect();

        $username = $data['uname'];
        $psw = $data['psw'];
        $pswRepeat = $data['pswrepeat'];
        // $admin = isset($data['admin']) ? $data['admin'] : false;

        if ($psw !== $pswRepeat) {
            return false;
        }

        $temp = $this->app->db->executeFetchAll("SELECT * FROM users WHERE username='$username'");

        if ($temp) {
            return false;
        }

        return true;
    }

    private function checkLoginData($data)
    {
        $username = $data['uname'];
        $psw = $data['psw'];

        $this->app->db->connect();
        $hash = $this->app->db->executeFetchAll(
            "SELECT password FROM users WHERE username = '$username'"
        )[0]->password;

        if (!empty($hash)) {
            return self::verifyPassword($psw, $hash);
        } else {
            header("Location: " . $this->app->url->create('wrongFormData'));
        }
    }

    private function encryptPassword($psw)
    {
        return password_hash($psw, PASSWORD_DEFAULT);
    }

    private function verifyPassword($psw, $hash)
    {
        return password_verify($psw, $hash);
    }

    private function addUser($username, $psw, $admin)
    {
        $this->app->db->execute(
            "INSERT INTO users
            (
                username,
                password,
                admin
            )
            VALUES
            (
                '$username',
                '$psw',
                $admin
            )"
        );
    }

    public function removeUser($id)
    {
        $this->app->db->execute("DELETE FROM users WHERE id = '$id' LIMIT 1");
    }

    public function isAdmin($user = null)
    {
        $currentUser = isset($user) ? $user : $this->app->session->get('user');

        $this->app->db->connect();
        $res = $this->app->db->executeFetchAll("SELECT admin FROM users WHERE username = '$currentUser'")[0]->admin;

        return $res === 1 ? true : false;
    }

    public function getAllUsersData()
    {
        $this->app->db->connect();
        $sortSuffix = self::getSortingSuffix();
        $searchSuffix = self::getSearchSuffix();
        $res = $this->app->db->executeFetchAll("SELECT * FROM users" . ' ' . $searchSuffix . ' ' . $sortSuffix);
        // var_dump("SELECT * FROM users" . ' ' . $searchSuffix . ' ' . $sortSuffix);
        // exit;

        return $res;
    }

    private function getSortingSuffix()
    {
        // $suffix = isset($_GET['sort']) ? $_GET['sort'] : ;
        if (isset($_GET['sort'])) {
            return $suffix = "ORDER BY {$_GET['sort']} ASC";
        } else {
            return $suffix = "ORDER BY id ASC";
        }
    }

    private function getSearchSuffix()
    {
        if (isset($_GET['search'])) {
            return "WHERE username LIKE '%{$_GET['search']}%'";
        } else {
            return '';
        }
    }
}
