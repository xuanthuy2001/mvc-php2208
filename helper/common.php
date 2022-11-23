<?php  
    // những hàm tiện ích được xử dụng bất kỳ đâu  autoload
    if(!function_exists('getUserName'))
    {
        function getUserName()
        {
            $user =$_SESSION['userName'] ?? null;
            return  $user;
        }
    }
    if(!function_exists('asset')) // kiem tra ham do da ton tai hay chua
    {
        function asset($pathFile, $isAdmin = false)
        {
            // goi duong dan file ngoai view 
            // load moi thu trong thu muc public
            if($pathFile)
            {
                if($isAdmin)
                {
                    if(file_exists(PATH_PUBLIC_ADMIN.$pathFile))
                    {
                        return PATH_PUBLIC_ADMIN.$pathFile;
                    }
                }
                else{
                    if(file_exists(PATH_PUBLIC.$pathFile))
                    {
                        return PATH_PUBLIC.$pathFile;
                    }
                }

                
            }
        }
    }

    if(!function_exists('route'))
    {
        //render url routing
        function route($c, $m, $param=[])
        {
            $p = '';
           if(!empty($param))
           {
                foreach($param as $key => $item)
                {
                    $p .= empty($p) ? "{$key}={$item}" :"&{$key}={$item}";
                }
           }
            //index.php?c=home&m=index&age=20&name=teo
            // ['age'=>20, 'name'=>'teo']
            return empty($p) ? APP_PATH."?c={$c}&m={$m}" : APP_PATH."?={$c}&m={$m}&{$p}";
        }
        
    }
    if(!function_exists('redirect'))
        {
            function redirect($c,$m,$param = [])
            {
                $p = '';
                if(!empty($param))
                {
                     foreach($param as $key => $item)
                     {
                         $p .= empty($p) ? "{$key}={$item}" :"&{$key}={$item}";
                     }
                }
                $linkRedirect = empty($p) ? APP_PATH."?c={$c}&m={$m}" : APP_PATH."?c={$c}&m={$m}&{$p}";
                header("Location:".$linkRedirect);
            }
        }
        