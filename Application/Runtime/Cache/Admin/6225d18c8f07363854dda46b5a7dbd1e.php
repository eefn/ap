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
</style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>设计师信息</h5>
                        <small><a href="<?php echo U('Admin/Designer/designer_list');?>" style="color:#ccc;margin-left:10px"><i class="fa fa-list"></i>设计师列表</a></small>
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
                        <form method="post" class="form-horizontal" action="<?php echo U('Admin/Designer/designer_edit');?>" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo ($designer["id"]); ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">名称</label>

                                <div class="col-sm-3">
                                    <input type="text" name="designer_name" value="<?php echo ($designer["designer_name"]); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">图片</label>

                                <div class="col-sm-10">
                                    <input type="file" name="image" id="upload">
                                    <img src="/ap/Public/<?php echo ($designer["image"]); ?>" alt="" id="img">
                                    <p>图片大小为382*394</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">等级</label>

                                <div class="col-sm-2">
                                   <select class="form-control" name="lv_id">
                                        <?php if(is_array($designer_lv)): foreach($designer_lv as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($v['id']) == $designer['lv_id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                                   </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">人气</label>

                                <div class="col-sm-3">
                                    <input type="text" name="click" value="<?php echo ($designer["click"]); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">价格</label>

                                <div class="col-sm-3">
                                    <input type="text" name="price" value="<?php echo ($designer["price"]); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">爱好</label>

                                <div class="col-sm-3">
                                    <input type="text" name="hobby" value="<?php echo ($designer["hobby"]); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">门店</label>

                                <div class="col-sm-3">
                                    <input type="text" name="store" value="<?php echo ($designer["store"]); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">服务中心</label>

                                <div class="col-sm-3">
                                    <input type="text" name="service_center" value="<?php echo ($designer["service_center"]); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">毕业学校</label>

                                <div class="col-sm-3">
                                    <input type="text" name="school" value="<?php echo ($designer["school"]); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否王牌</label>

                                <div class=" checkbox i-checks col-sm-10">
                                <label>
                                    <input type="radio"  value="1" id="optionsRadios1" name="is_king" <?php if(($designer['is_king']) == "1"): ?>checked<?php endif; ?>>是</label>
                                 <label>
                                <input type="radio" value="0" id="optionsRadios2" name="is_king" <?php if(($designer['is_king']) == "0"): ?>checked<?php endif; ?>>否</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">入职时间</label>

                                <div class="col-sm-3">
                                    <input type="date" name="jointime" value="<?php echo (date('Y-m-d',$designer["jointime"])); ?>"  class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">描述</label>

                                <div class="col-sm-3">
                                    <script id="editor" type="text/plain" name="description" style="width:1024px;height:500px;"><?php echo ($designer["description"]); ?></script>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">排序</label>

                                <div class="col-sm-3">
                                    <input type="text" name="ord"  value="<?php echo ($designer["ord"]); ?>" class="form-control">
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
                                    <label>设计师名：</label>
                                    <input type="email" placeholder="请输入设计师名" class="form-control">
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
 <script type="text/javascript" charset="utf-8" src="/ap/Public/Admin/abc/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ap/Public/Admin/abc/ueditor.all.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/ap/Public/Admin/abc/lang/zh-cn/zh-cn.js"></script>
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
<!--编辑文本-->
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

</script>
<script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
      $('#loading-example-btn').click(function(){
        location.reload();
       })
      laydate({elem:"#date",event:"focus"});
    </script>
</body>
</html>