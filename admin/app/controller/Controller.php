<?php  
    namespace admin\app\controller;
    class Controller{
        protected $rootPathView;
        public function __construct()
        {
            $this -> rootPathView = ADMIN_PATH_APP_VIEW;
        }
        public function __call($name, $arguments)
        {
            exit("not found request:" . $name);
        }
        protected function loadView($path , $data =[]) //từ controller load view
        {   
            // load view vao controller hay dau do
            // $path : Dường dẫn đến file view 
            // $data : dữ liệu gửi ra ngoài view 
            extract($data);
            // Biến key của mảng thành 1 biến ngoài view
                // ["name" => "teo"]
                //  => ngoài view :$name = teo 
            require $this -> rootPathView . $path .'.php';
            // require app/view/login/formLogin.php';
        }

        protected function getSessionUserName()
        {
            $user =  $_SESSION['userName'];
            return $user;
        }

        protected function loadHeaders($header = []) {
            return  $this-> loadView('partials/header_view',$header);
        }
        protected function loadFooter($footer = []) {
            return  $this-> loadView('partials/footer_view',$footer);
        }
    }

