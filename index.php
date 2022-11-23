<?php  
    // auto start session all app
    // kiểm tra trạng thái của session nếu trạng thái là none thì khởi tạo 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
  
    require_once __DIR__ .'/vendor/autoload.php';
    
    if(file_exists(__DIR__.'/route/web.php')) 
    {
        require __DIR__.'/route/web.php';
    }
    else{
        echo "đang bảo trì";
    }

