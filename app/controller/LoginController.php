<?php  
    namespace app\controller; //tên đường dẫn thư mục
    use app\controller\Controller;

    class LoginController extends Controller
    { 
        //tên file và tên class phải giống nhau
        public function index()
        {   
            $message = '';
            if(isset($_SESSION["error"]))
            {
                $message = $_SESSION["error"];
            }

            $this -> loadView('login/form_view',[
                'title'=>'form login',
                'message' =>$message]);
        }

        public function handleLogin()
        {
           
            if(isset($_POST['btnLogin']))
            {
                $userName = strip_tags($_POST["email"]?? '');
                $password = strip_tags($_POST["password"]?? '');
                if(!empty($userName) && !empty($password))
                {
                    // call data form database check request userName
                    if($userName == "admin" && $password == "123")
                    {
                        // xoa bo session
                        if(isset($_SESSION["error"]))
                        {
                            unset($_SESSION["error"]);
                        }
                        $_SESSION['userName'] = $userName;
                        return redirect("home","index");
                    }
                    else{
                        $_SESSION["error"] = "Tai khoan khong ton tại";
                        return redirect("login","index",[
                         'state' => "fail",
                        ]);
                    }
                   
                    // luu thong tin va session va chuyen trang
                }
                else{
                    // Báo lỗi
                    // tao session 
                    $_SESSION["error"] = "vui long nhap du lieu";
                   return redirect("login","index",[
                    'state' => "fail",
                   ]);
                }
            }
        }

        public function logout()
        {
                unset($_SESSION["userName"]);
                $_SESSION["error"] = "đăng xuất thành công";
                header("Location:".$_SERVER['HTTP_REFERER']);
        }
    }

