<?php  
    namespace app\controller; //tên đường dẫn thư mục
    use app\controller\Controller;

    class LoginController extends Controller
    { 
        //tên file và tên class phải giống nhau
        public function index()
        {   
            $this -> loadView("login/index_view");
        }
       
    }

