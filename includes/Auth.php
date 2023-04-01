<?php
session_start();

class Auth
{
    public static function setSession(int $id, string $name): void
    {
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
    }

    public static function register(string $name, string $email, string $password, string $confirmPassword): array
    {
        require('Validator.php');
        require('Connection.php');
        $validator = new Validator();
        $errors = [];
        if ($error = $validator->notNull('Name', $name)) {
            $errors[] = $error;
        }
        if ($error = $validator->isEmail('Email', $email)) {
            $errors[] = $error;
        }
        if ($error = $validator->notNull('Password', $password)) {
            $errors[] = $error;
        }
        if ($error = $validator->notNull('Confirm Password', $confirmPassword)) {
            $errors[] = $error;
        }
        if ($error = $validator->compare('Password', $password, 'Confirm Password', $confirmPassword)) {
            $errors[] = $error;
        }

        if (count($errors) != 0) {
            return ['errors' => $errors];
        }
        $conObj = Connection::getConnection();
        $con = $conObj->get_con();
        $query = "Insert into users (name,email,password) values('" . $name . "','" . $email . "','" . password_hash($password, PASSWORD_BCRYPT) . "')";
        try {
            if ($con->query($query)) {
                self::setSession($con->insert_id, $name);
                return ['message' => "User created successfully"];
            } else {
                return ['errors' => ["User creation failed"]];
            }
        } catch (Exception $ex) {
            return ["errors" => ["User already exists"]];
        }
    }

    public static function login(string $email, string $password): array
    {
        require('Validator.php');
        require('Connection.php');
        $validator = new Validator();
        $errors = [];
        if ($error = $validator->isEmail('Email', $email)) {
            $errors[] = $error;
        }
        if ($error = $validator->notNull('Password', $password)) {
            $errors[] = $error;
        }
        if (count($errors) != 0) {
            return ['errors' => $errors];
        }

        $conObj = Connection::getConnection();
        $con = $conObj->get_con();
        $query = "select id,name,password from users where email like '$email'";
        $result = $data = $con->query($query);
        if ($result->num_rows > 0) {
            $details = $result->fetch_assoc();
            if (password_verify($password, $details['password'])) {
                self::setSession($details['id'], $details['name']);
                return ['message' => "User Found"];
            } else {
                return ['errors' => ["Invalid credentials"]];
            }
        } else {
            return ['errors' => ["User Not found"]];
        }
    }


    public static function loggedIn(string $type): void
    {
        if ($type == 'auth') {
            if (!isset($_SESSION['id'])) {
                header("Location: /");
            }
        }
        if ($type == 'noAuth') {
            if (isset($_SESSION['id'])) {
                header("Location: /");
            }
        }
    }
}
