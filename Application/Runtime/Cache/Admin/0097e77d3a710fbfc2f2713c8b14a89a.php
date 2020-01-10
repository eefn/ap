<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:44 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>房屋管理</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <style>
      th{
        text-align: center;
      }
    </style>

</head>

<body class="gray-bg">

    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>所有房屋</h5>
                        <div class="ibox-tools">
                            <a href="<?php echo U('Admin/House/house_add');?>" class="btn btn-primary btn-xs">添加房屋</a>
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
                                        <th>展示图</th>
                                        <th>房屋名</th>
                                        <th>风格</th>
                                        <th>户型</th>
                                        <th>大小</th>
                                        <th>设计师</th>
                                        <th>总价</th>
                                        <th><i class="fa fa-clock-o"></i>添加时间</th> 
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
    <script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/Public/Admin/js/content.min.js?v=1.0.0"></script>
    <script src="/Public/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
      $.ajax({
        type:'get',
        url:"<?php echo U('Admin/House/ajaxHouse');?>",
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
                url:"<?php echo U('Admin/House/ajaxHouse');?>",
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
    </script>

    <script>
      $(document).ready(function(){$("#loading-example-btn").click(function(){btn=$(this);simpleLoad(btn,true);simpleLoad(btn,false)})});function simpleLoad(btn,state){if(state){btn.children().addClass("fa-spin");btn.contents().last().replaceWith(" Loading")}else{setTimeout(function(){btn.children().removeClass("fa-spin");btn.contents().last().replaceWith(" Refresh")},2000)}};
       $('#loading-example-btn').click(function(){
        location.reload();
       })
    </script>
    </body>

<!-- Mirrored from www.zi-han.net/theme/hplus/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:44 GMT -->
</html>