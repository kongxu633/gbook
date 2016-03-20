<?php

    //出现登录框
    define('PAGE_PASS','jfbst');
    //提交正确密码
    define('ADMIN_PASS','admin');

    if(isset($_GET['pass']) && PAGE_PASS == $_GET['pass']){

        if(isset($_POST['password']) && ADMIN_PASS == $_POST['password']){

            $hostdir= dirname(__FILE__) . '/html/' ;
            //获取本文件目录的文件夹地址
            $filesnames = scandirs($hostdir);
            //获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames
            //print_r ($filesnames);
            foreach ($filesnames as $key => $value) {
                # code...
                if (strpos($value,'.html')) {
                    # code...
                    echo '<a href="./html/'.$value.'" target="_blank">'.$value.'</a><br>';
                }
            }
        }else {
            echo '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
                    <title>纺城微中介</title>
                    <link rel="stylesheet" href="./css/weui.min.css"/>
                </head>
                <body>
                <form action="?pass=jfbst" method="post">
                    <label for="password">查看密码:</label>
                    <input type="text" id="password" name="password">
                    <input type="submit">
                </form>
                </body>
                </html>
            ';
        }

    }else{
        die;
    }

    //兼容的scandir
    function scandirs($dir){
        $arr=array();
        if(!function_exists('scandir')){
            $handle=@opendir($dir);
            while(($arr[]=@readdir($handle)) !== false){
            }
            @closedir($handle);
            $arr=array_filter($arr);
        }else{
            $arr=@scandir($dir);
        }
        return $arr;
    }

?>