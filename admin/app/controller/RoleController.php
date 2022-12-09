<?php  
   namespace admin\app\controller; //tên đường dẫn thư mục
   use admin\app\controller\Controller;
   use admin\app\model\Role;
  
  class RoleController extends Controller {
        protected $roleModel;

      public function __construct()
      {
          parent::__construct();
          $this -> roleModel = new Role;
      }
      public function index()
    {
      
        $header = [
            'title' => 'Dashboard page'
        ];
        $this -> loadHeaders($header);
         $this -> loadView("dashboard/index_view");
        $this -> loadFooter();

    }
      public function create(){
        return $this -> loadView('role/create_view');
      }

      public function store()
      {
         if(isset($_POST['save']))
            {
                $nameRole = trim(strip_tags($_POST['name'] ?? ''));
                $description = trim(strip_tags($_POST['description'] ?? ''));
                if(empty($nameRole)){
                    $_SESSION["errNameRole"] = "vui long nhap ten vai tro";
                    return redirect("dashboard" , "index",[
                        "state" => "error"
                    ]);
                }
                else{
                    if(isset($_SESSION["errNameRole"])){
                        unset($_SESSION["errNameRole"]);
                    }
                    // luu vao DB:
                    // kiem tra xem dl can luu da ton tai trong db chua: neu chua thi luu 
                    // neu co: bao loi
                    if($this -> roleModel->checkExistNameRole($nameRole)){
                        // nguoi dung nhap ten vai tro co roi
                        return  redirect('role','create');
                    }
                    else {
                        // chua co trong db
                        $insert = $this -> roleModel->insertRole($nameRole, $description);
                        if($insert){
                            return  redirect('role','index');
                        }
                        return  redirect('role','create');
                    }
                }
            }
    }
}