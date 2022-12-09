<?php  
 namespace admin\app\controller; //tên đường dẫn thư mục
 use admin\app\controller\Controller;

class DashboardController extends Controller {

    public function __construct()
    {
        parent::__construct();
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

}