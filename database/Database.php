<?php  
    namespace database;
    use \PDO;
    use \PDOException;

    class Database {
            protected $db;
            public function __construct (){
                $this -> db = $this -> connection();
            }
            protected function connection(){
                // hàm tạo kn csdl
                try {
                    $dbh = new PDO(DB_CONNECTION.':host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
                    
                    return $dbh;
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }
            }

            protected function  disconnection() {
                // ngắt kết nối
                $this -> db = null;
            }
            public function __destruct()
            {
                // chạy cuối cùng 
                $this -> disconnection();
            }
    }
