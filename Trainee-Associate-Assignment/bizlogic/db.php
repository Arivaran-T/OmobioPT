<?php
class DbConnect
{
    private $server = 'localhost';
    private $dbname = 'exam';
    private $user = 'root';
    private $pass = '';
    public function connect()
    {
        global $server, $user, $user, $pass, $dbname;
        try {
            $conn = new mysqli($server, $user, $pass, $dbname);
            return $conn;
        } catch (\Exception $e) {
            echo "Database Error: " . $e->getMessage();
        }
    }
}
