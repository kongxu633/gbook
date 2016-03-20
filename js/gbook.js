function showToast() {
    var $toast = $('#toast');
    if ($toast.css('display') != 'none') {
        return;
    }

    var $loadingToast = $('#loadingToast');
    if ($loadingToast.css('display') != 'none') {
        $loadingToast.hide();
    }

    $toast.show();
    setTimeout(function () {
        $toast.hide();
    }, 1000);
}
function showLoadingToast() {
    var $loadingToast = $('#loadingToast');
    if ($loadingToast.css('display') != 'none') {
        return;
    }
    $loadingToast.show();
}

function mysubmit(){
    if($('#con').val()==""){
        $('#dialog').show();
    }
    else{

        $('#mysubmit').removeAttr('href');
        $('#mysubmit').addClass('weui_btn_disabled');
        $('#myform').submit();
    }
}



//document.querySelector('.weui_uploader_input').addEventListener('change', function () {
$(".weui_uploader_input").on('change',function(){
    //正在处理图片
    showLoadingToast();


    lrz(this.files[0])
        .then(function (result) {

            var clearBase64 = result.base64.substr(result.base64.indexOf(',') + 1);
            $.ajax({

                type: "POST",
                url: "upload.php",
                data: { base64_string:clearBase64 },
                dataType:"json",
                success: function(data){
                    if (0 == data.status) {
                        alert(data.content);
                        return false;
                    }else{

                        var picstr = '<p><a href="../'+data.url+'" target="_blank">'+data.url+'</a><img src="../'+data.url+'" width="200"></p>';
                        var nowstr = $('#pics').val();
                        $('#pics').val(nowstr + picstr);

                        var attstr= '<li class="weui_uploader_file" style="background-image:url('+data.url+')"></li>';
                        $(".weui_uploader_files").append(attstr);
                        return false;
                    }
                },
                beforeSend: function () {
                    //准备上传
                },
                complete :function(XMLHttpRequest, textStatus){
                    showToast();
                },
                error:function(XMLHttpRequest, textStatus, errorThrown){ //上传失败
                    //alert(XMLHttpRequest.status);
                    //alert(XMLHttpRequest.readyState);
                    alert(textStatus);
                }
            });

        })
        .catch(function (err) {
            // 处理失败会执行
        })
        .always(function () {
            // 不管是成功失败，都会执行
        });
});