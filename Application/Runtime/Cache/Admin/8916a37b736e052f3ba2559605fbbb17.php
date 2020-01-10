<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/form_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:15 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 基本表单</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/ap/Public/Admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/ap/Public/Admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/ap/Public/Admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/ap/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/ap/Public/Admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" href="/ap/Public/Admin/js/kindeditor/themes/default/default.css" />
      <script type="text/javascript" charset="utf-8" src="/ap/Public/Admin/abc/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ap/Public/Admin/abc/ueditor.all.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/ap/Public/Admin/abc/lang/zh-cn/zh-cn.js"></script>
    <style>
      #upload{
        position: absolute;
        z-index: 2;
        width:150px;
        height:150px;
        opacity:0;
      }
      #img{
        width:150px;
        height:150px;
        position:relative;
      }
      #editor{
        width: 100px;
        height:100px;
      }
</style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>文章信息</h5>
                        <small><a href="<?php echo U('Admin/about/about_list');?>" style="color:#ccc;margin-left:10px"><i class="fa fa-list"></i>文章列表</a></small>
                        <div class="ibox-tools"><button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> 刷新</button>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="<?php echo U('Admin/about/about_add');?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题</label>

                                <div class="col-sm-3">
                                    <input type="text" name="name" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">添加时间</label>

                                <div class="col-sm-3">
                                    <input type="date" name="addtime" value="" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">排序</label>

                                <div class="col-sm-3">
                                    <input type="number" name="ord" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">所属导航</label>

                                <div class="col-sm-2">
                                   <select class="form-control" name="nid">
                                    <?php if(is_array($nav)): foreach($nav as $key=>$value): ?><option value="<?php echo ($value["id"]); ?>"><?php echo ($value["name"]); ?></option><?php endforeach; endif; ?>
                                   </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                             <div class="form-group">
                                <label class="col-sm-2 control-label">内容</label>

                                <div class="col-sm-3" style="height: 400px;">
                                   <script id="editor" type="text/plain" name="content"  style="width:800px;height:200px;"></script>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">保存内容</button>
                                    <a class="btn btn-white" href="javascript:void(0)" onclick="history.go(-1)" >取消</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">登录</h3>

                            <p>欢迎登录本站(⊙o⊙)</p>

                            <form role="form">
                                <div class="form-group">
                                    <label>文章名：</label>
                                    <input type="email" placeholder="请输入文章名" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>密码：</label>
                                    <input type="password" placeholder="请输入密码" class="form-control">
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>登录</strong>
                                    </button>
                                    <label>
                                        <input type="checkbox" class="i-checks">自动登录</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/ap/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/ap/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/ap/Public/Admin/js/content.min.js?v=1.0.0"></script>
    <script src="/ap/Public/Admin/js/plugins/layer/laydate/laydate.js"></script>
    <script src="/ap/Public/Admin/js/plugins/iCheck/icheck.min.js"></script>
 <script charset="utf-8" src="/ap/Public/Admin/js/kindeditor/kindeditor-min.js"></script>
 <script charset="utf-8" src="/ap/Public/Admin/js/kindeditor/lang/zh_CN.js"></script>
<script>
    //做图片上传预览
          function getObjectURL(file) {
            var url = null ; 
            if (window.createObjectURL!=undefined) { // basic
              url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
              url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
              url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
          }
          $('#upload').change(function(){
            var url=getObjectURL(this.files[0]);
            if(url){
              $('#img').attr('src',url);
            }
          })
</script>
 <script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    
</script>
</body>
</html>