<?php

class Post
{
    public static function createPost(string $title, string $description): array
    {
        require('Validator.php');
        require('Connection.php');
        $validator = new Validator();
        $errors = [];
        if ($error = $validator->notNull('title', $title)) {
            $errors[] = $error;
        }
        if ($error = $validator->notNull('Description', $description)) {
            $errors[] = $error;
        }
        if (count($errors) != 0) {
            return ['errors' => $errors];
        }
        $conObj = Connection::getConnection();
        $con = $conObj->get_con();
        $id = $_SESSION["id"];
        $query = "Insert into posts (title, description, user_id) values('" . $title . "','" . $description . "'," . $id . ")";
        if ($con->query($query)) {
            return ['message' => "Post created successfully"];
        } else {
            return ['errors' => ["Post creation failed"]];
        }
    }


    public static function getAllPost(): bool|mysqli_result
    {
        require('Connection.php');
        $conObj = Connection::getConnection();
        $con = $conObj->get_con();
        $query = "SELECT u.name,p.title,p.description,p.created_at from users u,posts p WHERE u.id = p.user_id";
        return $con->query($query);

    }
}