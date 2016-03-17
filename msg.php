<?php
    $con = $_POST['con'];
    $pics = $_POST['pics'];


    $savename = $filename = date("Ymd").".html";
    $savepath = 'html/'.$savename; 


    $nowtime = date("Y-m-d H:i:s");
    $html = '<p>'.$nowtime.'</p>'.'<p>'.$con.'</p>'.$pics.'<hr>';

    $file = file_put_contents($savepath,  $html, FILE_APPEND);


    // if($file){
    //     echo '{"status":1,"content":"上传成功","url":"'.$savepath.'"}';
    // }else{
    //     echo '{"status":0,"content":"上传失败"}';
    // } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>留言板</title>
    <link rel="stylesheet" href="./css/weui.min.css"/>
</head>
<body>

    <!--BEGIN dialog2-->
    <div class="weui_dialog_alert" id="dialog2" style="display: none;">
        <div class="weui_mask"></div>
        <div class="weui_dialog">
            <div class="weui_dialog_hd"><strong class="weui_dialog_title">弹窗标题</strong></div>
            <div class="weui_dialog_bd">弹窗内容，告知当前页面信息等</div>
            <div class="weui_dialog_ft">
                <a href="javascript:;" class="weui_btn_dialog primary">确定</a>
            </div>
        </div>
    </div>
    <!--END dialog2-->

    <div class="weui_msg">
        <div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg"></i></div>
        <div class="weui_text_area">
            <h2 class="weui_msg_title">操作成功</h2>
            <p class="weui_msg_desc">感谢您的留言，我们会尽快与您联系！</p>
        </div>
        <div class="weui_opr_area">
            <p class="weui_btn_area">
                <a href="javascript:self.location=document.referrer;" class="weui_btn weui_btn_primary">确定</a>
            </p>
        </div>
    </div>
</body>
</html>