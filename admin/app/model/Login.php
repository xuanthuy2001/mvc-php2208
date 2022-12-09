<?php  
    namespace admin\app\model;
    use database\Database as Model;
    use \PDO;
    class Login extends Model {
        public function __construct (){
            // chay được cả 2 thằng __construct cả trong file đã ễtnt
            parent::__construct();
        }
        public function  loginUser($username , $password) {
            // sd thu vien PDO de lay du lieu ra
            $dataUser = [];
            $sql = "SELECT * FROM  `users` as `u` WHERE `u`.`username` = :user and `u`. `password` = :pass and `u`.`status` = 1 limit 1";
            // :user va :pass = tham sos truyen vao cau lenh sql
            $stmp = $this -> db -> prepare($sql);
            // kiem tra cau lenh sql co dung cau truc hay khong
            if($stmp){
                // xu ly tiep
                // kiem tra tinh hop le chuoi cau lenh sql neu co
                // neu co tham so truyen vao thi minh kiem tra
                $stmp -> bindParam(':user', $username , PDO::PARAM_STR);
                // PARAM_STR : kiem tra tham so truyen vao sql co cau rang buoc kieu string
                $stmp -> bindParam(':pass', $password , PDO::PARAM_STR);
                //  thực thi
                if($stmp -> execute()){
                    // thuc thi thanh cong
                    // lay dl ve vi cau lenh selec thuc thi luon tra ve data
                    if($stmp -> rowCount() > 0){
                        // co dara tra ve
                        $dataUser = $stmp->fetch(PDO::FETCH_ASSOC);
                        // fetch : lay ra signle row
                        // fetchall: lay ra nhieu dl
                        // PDO::FETCH_ASSOC
                        // tra dl ve duoi dang mang:
                        //  key cua mang la cac cot trong table
                    }
                    $stmp  -> closeCursor();
                    // thuc thi xong - de neu con lenh sql tiep theo thi lai thuc thi tiep
                }
            }
            return $dataUser;
            
        }
    }
