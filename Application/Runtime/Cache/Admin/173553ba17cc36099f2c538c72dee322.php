<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:44 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>设计师风格管理</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/ap/Public/Admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/ap/Public/Admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/ap/Public/Admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="/ap/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/ap/Public/Admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <style>
      th{
        text-align: center;
      }
      .page a{
          display: inline-block;
          width: 35px;
          height: 35px;
          border: 1px solid skyblue;
          line-height: 35px;
          text-align: center;
          margin: 0;
      }
      .page a:hover{
        background: skyblue;
        color:#fff;
      }
      .page a.num{
        margin-right:3px;
      }
      .page a.next{
        margin-left:-3px;
      }
      .page span.current{
        display: inline-block;
        width: 35px;
        height: 35px;
        border: 1px solid skyblue;
        line-height: 35px;
        text-align: center;
        background: skyblue;
        color:#fff;
        margin-right:3px;
      }
    </style>
 
</head>

<body class="gray-bg">

    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>所有设计师风格</h5>
                        <div class="ibox-tools">
                            <a href="<?php echo U('Admin/Designer/designer_style_add');?>" class="btn btn-primary btn-xs">添加设计师风格</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row m-b-sm m-t-sm">
                            <div class="col-md-1">
                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> 刷新</button>
                            </div>
                            <div class="col-md-11">
                             <!-- <form action="<?php echo U('Admin/Blog/blog_list');?>" method="get"> -->
                                <div class="input-group">
                                  <input type="text" placeholder="请输入名称" class="input-sm form-control" name="search" id="search"> 
                                  <span class="input-group-btn">
                                  <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> 
                                  </span>
                                </div>
                            <!-- </form> -->
                            </div> 
                            
                        </div>

                        <div class="project-list">
                            <table class="table table-hover" style="text-align:center">
                                  <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>设计师名称</th>
                                      <th>设计师风格</th>
                                      <th>是否显示</th>
                                      <th>操作</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                      
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="/ap/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/ap/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/ap/Public/Admin/js/content.min.js?v=1.0.0"></script>
    <script src="/ap/Public/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
      $.ajax({
        type:'get',
        url:"<?php echo U('Admin/Designer/ajaxDesigner_style');?>",
        dataType:'html',
        success:function(z){
          $('.table tbody').html(z);
        }
      })
       $(document).keypress(function (e) {
          if (e.keyCode == 13){
            $('#search').trigger('blur');
          }
        });
       $('#search').keyup(function(){
          var value= $(this).val();
              $.ajax({
                type:'get',
                url:"<?php echo U('Admin/Designer/ajaxDesigner_style');?>",
                data:'search='+value,
                dataType:'html',
                success:function(z){
                  $('.table tbody').html(z);
                }
              })
             })
       $(document).on('click','.page a',function(){
         var url=$(this).attr('href');
             $.ajax({
              type:'get',
              url:url,
              dataType:'html',
              success:function(z){
                $('.table tbody').html(z);
              }
             })
             return false;
         })

       $(document).on('click','.click',function(){
          var value=$(this).attr('value');
          var is_show=$(this).attr('is_show');
          var i=$(this).siblings('.count').text();
          var i=i-1;
             $.ajax({
              type:'get',
              url:"<?php echo U('Admin/Designer/click');?>",
              data:'click='+value+'&is_show='+is_show,
              dataType:'html',
              success:function(z){
                console.log(z);
               if(z==1){
                  $('.click').eq(i).html('<img src="/ap/Public/Admin/img/yes.gif">');
                  $('.click').eq(i).attr('is_show','1'); 
               }else if(z==0){ 
                $('.click').eq(i).html('<img src="/ap/Public/Admin/img/no.gif">');
                $('.click').eq(i).attr('is_show','0');
               }
               
              }
             })
             return false;
         })
    </script>
    <script>
           $(document).on('click','.del',function(){
              var del_id=$(this).attr("del_id");
            var tr=$(this).parent('td').parent('tr');
              swal({
                  title: "您确定要删除这条信息吗",
                  text: "删除后将无法恢复，请谨慎操作！",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#1647a1",
                  confirmButtonText: "确定",
                  cancelButtonText: "取消",
                  closeOnConfirm: false,
                  closeOnCancel: false
              }, function(isConfirm) {
                  if (isConfirm) {
                      $.ajax({
                        type:'post',
                        url:"<?php echo U('Admin/Designer/designer_style_del');?>",
                        data:"del_id="+del_id,
                        dataType:'text',
                        success:function(z){
                          if(z){
                            swal("删除成功！", "您已经永久删除了这条信息。", "success");
                            tr.remove();
                          }else{
                            swal("删除失败！", "请联系管理员。", "error");
                          }
                        }
                      })
                      
                  } else {
                      swal("已取消", "您取消了删除操作！", "error")
                  }
              })
          });

       $(document).ready(function(){$("#loading-example-btn").click(function(){btn=$(this);simpleLoad(btn,true);simpleLoad(btn,false)})});function simpleLoad(btn,state){if(state){btn.children().addClass("fa-spin");btn.contents().last().replaceWith(" Loading")}else{setTimeout(function(){btn.children().removeClass("fa-spin");btn.contents().last().replaceWith(" Refresh")},2000)}};
       $('#loading-example-btn').click(function(){
        location.reload();
       })
    </script>
    </body>

<!-- Mirrored from www.zi-han.net/theme/hplus/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:44 GMT -->
</html>