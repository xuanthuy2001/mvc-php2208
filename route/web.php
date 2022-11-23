<?php  
    // mọi thứ đều phải chạy từ file index.php
    if(!defined("APP_PATH"))
    {
        die("can not access");
    }
    // file được tạo ra với mục đích tiếp nhận các request  từ phía clien gửi lên 
    // index.php?c=login&m=index
    // c: tên controller 
    // m: phương thức
    // sử dụng kỹ thuật lazy loading : tên file và tên class giống nhau
    // trong 1 file chỉ chứa 1 class để sd lazy loading

    $c = ucfirst($_GET["c"] ?? "login" ); // controller mac dinh la login
    // ucfirst viét hoa chữ cái đầu tiên của chuỗi
    $m = $_GET["m"] ?? "index";

    $nameController = "{$c}Controller"; // chính la tên control
    $fileController = "{$c}Controller.php";  // chính la tên file
    // full path file controller 
    $fullPathController = NAMESPACE_CONTROLLER.$fileController;
    
    $fullRealPath = str_replace("\\" , "/", $fullPathController);
    if(file_exists($fullRealPath))
    {
    // tự động khởi tạo đối tượng 
        $controller =  NAMESPACE_CONTROLLER.$nameController;
        // echo $controller;
        // die();
        // app\controller\loginController
        $obj= new $controller; // new app\controller\loginController
        // tự động gọi phương thức class 
        $obj -> $m();
   }
   else{
    exit('not found ' . $fullPathController);
   }
    // làm thế nào để khởi tạo đối tượng controller

