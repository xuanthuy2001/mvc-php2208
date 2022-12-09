<?php  
    namespace admin\app\model;

    use database\Database as Model;
    use \PDO;
    class Role extends Model {
        public function __construct (){
            // chay được cả 2 thằng __construct cả trong file đã extent
            parent::__construct();
        }
       
        public function checkExistNameRole($name, $id =0)
        {
            $flagCheck = false;
            if($id == 0){
                $sql = "SELECT `id`,`name` FROM `role` AS `r` WHERE `r`.`name` = :nameRole LIMIT 1"; 
            }
            else{
                // loai chu chinh no , chi kiem tra dl con lai  => chuc nang update
                $sql = "SELECT `id`,`name` FROM `role` AS `r` WHERE `r`.`name` = :nameRole AND `r`.`id` != :id LIMIT 1"; 
            }
            $stmt = $this -> db ->prepare($sql);
            if($stmt){
                $stmt -> bindParam(':nameRole',$name, PDO::PARAM_STR);
                if($id !== 0){
                    $stmt -> bindParam(':id',$id, PDO::PARAM_INT);
                }
                if($stmt -> execute()){
                    if($stmt->rowCount()){
                        $flagCheck = true;
                    }
                    $stmt -> closeCursor();
                }
            }
            return $flagCheck ;
        }
        
        public function insertRole($name, $des){
            $status = 1;
            $createdAt = date('Y-m-d H:i:s');
            $updatedAt = null;
            $deleteAt = null;
            $flagCheck = false;
            $sql = "INSERT INTO `roles`(`name`,`description`,`status`,`created_at`,`updated_at`,`deleted_at`) VALUES (:nameRole, :description, :status,:created_at,:updated_at,:deleted_at)";
            $stmt  = $this -> db -> prepare($sql);
            if($stmt){
                $stmt -> bindParam(':nameRole', $name, PDO::PARAM_STR);
                $stmt -> bindParam(':description', $des, PDO::PARAM_STR);
                $stmt -> bindParam(':status', $status, PDO::PARAM_INT);
                $stmt -> bindParam(':created_at', $createdAt, PDO::PARAM_STR);
                $stmt -> bindParam(':updated_at', $updatedAt, PDO::PARAM_STR);
                $stmt -> bindParam(':deleted_at', $deleteAt, PDO::PARAM_STR);
            }
            if($stmt -> execute()){
                $flagCheck = true;
                $stmt -> closeCursor();
            }

            return $flagCheck;
        }
    }
    
