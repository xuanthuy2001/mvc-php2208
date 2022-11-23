<?php  
  namespace app\controller; //tên đường dẫn thư mục

  use app\controller\Controller;
  class AboutController  extends Controller
  { //tên file và tên class phải giống nhau
      public function index()
      {
          // load header
          $this  -> loadHeaders(['title' => "trang chu"]);
          $this -> loadView('about/index_view');
          $this -> loadFooter();
      }
  }