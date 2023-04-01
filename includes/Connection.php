<?php
class Connection
{
    private mysqli $con;
    public static Connection $obj;
    private string $servername = "localhost";
    private string $username = "admin";
    private string $password = "admin";
    private string $database = "postDb";

    function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password,$this->database);
        if ($this->con->connect_error) {
            die("Connection failed");
        }
    }

    static function getConnection(): Connection
    {
        if (!isset(self::$obj)) {
            self::$obj = new Connection();
        }
        return self::$obj;
    }

    public function get_con(): mysqli
    {
        return $this->con;
    }

    public function close_connection(): void
    {
        mysqli_close($this->con);
    }
}


