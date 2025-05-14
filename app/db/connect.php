<?php
class Database
{
    private \mysqli $conn;

    public function __construct(array $db)
    {
        $this->conn = mysqli_init();
        mysqli_options($this->conn, MYSQLI_OPT_CONNECT_TIMEOUT, $db['timeout'] ?? 5);
        if (!mysqli_real_connect(
            $this->conn,
            $db['host'],
            $db['user'],
            $db['pass'],
            $db['name']
        )) {
            throw new \RuntimeException('DB connection failed: ' . mysqli_connect_error());
        }
    }

    public function init(): \mysqli
    {
        return $this->conn;
    }
}
