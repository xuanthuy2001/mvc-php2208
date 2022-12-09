<?php  
    namespace admin\app\controller; //tên đường dẫn thư mục
    use admin\app\controller\Controller;
    use admin\app\model\Login;
    class LoginController extends Controller
    { 
        protected $loginModel;
        public function __construct()
        {
            // bắt buộc phải có parent::__construct()
            parent::__construct();
            $this->loginModel = new Login;
        }
        //tên file và tên class phải giống nhau
        public function index()
        {   
           
            $this -> loadView("login/index_view");
        }
        public function handleLogin()
        {
           
           if(isset($_POST["btnLogin"])) {
            $username = trim(strip_tags($_POST["email"])) ?? '';
            $password = trim(strip_tags($_POST["password"])) ?? '';
            if(empty($username) || empty($password))
            {
                $_SESSION["error_login"] = "Vui lòng nhập dl";
                return    redirect("login","index",[
                    'state' => "fail"
                ]);
            }
            else{
                if(isset($_SESSION["error_login"])){
                    unset($_SESSION["error_login"]);
                }
                $infoUser = $this->loginModel->loginUser($username, $password);
                if(empty($infoUser)){
                    //user khong ton tai
                $_SESSION["fail_login"] = "Tài khoản không tồn tại";
                    return    redirect("login","index",[
                        'state' => "fail_login"
                    ]);
                }
                else{
                    // co ton tai
                    if(isset($_SESSION["fail_login"])){
                        unset($_SESSION["fail_login"]);
                    }
                    // lưu thông tin user vao session
                    $_SESSION['user_id']    = $infoUser['id'];
                    $_SESSION['username']   = $infoUser['username'];
                    $_SESSION['email']      = $infoUser['email'];
                    $_SESSION['phone']      = $infoUser['phone'];
                    $_SESSION['role_id']    = $infoUser['role_id'];
                    return    redirect("dashboard","index");
                }
            }
           
           }
        } 
        public function logout(){
            if(isset($_POST["logout"]))
            {
                   unset($_SESSION['user_id']);
                   unset($_SESSION['username']);
                   unset($_SESSION['email']);
                   unset($_SESSION['phone']);
                   unset($_SESSION['role_id']);
                   return    redirect("login","index",[
                    'message' => "success"
                   ]);
            }
        }
    }

