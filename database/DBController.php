<?php


class DBController
{
    //Database connection properties.
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'sanaa';
    protected $port = '3306';

    //connection property
    public $conn =null;


    //Call constructor
    public function __construct()
    {
        $this->conn = mysqli_connect([$this->host], [$this->user], [$this->password], [$this->database], [$this->port]);
        if ($this->conn->connect_error) {
            echo "Fail" . $this->conn->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }


    protected function closeConnection()
    {
        if ($this->conn != null) {
            $this->conn->close();
            $this->conn = null;
        }
    }
}
?>


