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
    <style type="text/css">
            #upload{
                position: absolute;
                z-index: 2;
                width:146px;
                height:106px;
                opacity:0;
            }
            #img{
                width:146px;
                height:106px;
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
                        <h5>房屋信息</h5>
                        <small><a href="<?php echo U('Admin/House/house_list');?>" style="color:#ccc;margin-left:10px"><i class="fa fa-list"></i>房屋列表</a></small>
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
                        <form action="<?php echo U('Admin/House/house_edit');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo ($house["id"]); ?>" name="id">
                            <input type="hidden" value="<?php echo ($house["house_name"]); ?>" name="old_name">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">房屋名</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="house_name" value="<?php echo ($house["house_name"]); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">风格</label>
                                <div class="col-sm-2">
                                   <select class="form-control" name="style_id">
                                        <?php if(is_array($style)): foreach($style as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($v['id']) == $house['style_id']): ?>selected<?php endif; ?>><?php echo ($v["style_name"]); ?></option><?php endforeach; endif; ?>
                                   </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">户型</label>
                                <div class="col-sm-2">
                                   <select class="form-control" name="type_id">
                                        <?php if(is_array($type)): foreach($type as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($v['id']) == $house['type_id']): ?>selected<?php endif; ?>><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
                                   </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">预算</label>
                                <div class="col-sm-2">
                                   <select class="form-control" name="budget_id">
                                        <?php if(is_array($budget)): foreach($budget as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($v['id']) == $house['budget_id']): ?>selected<?php endif; ?>><?php echo ($v["budget_name"]); ?></option><?php endforeach; endif; ?>
                                   </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">设计师</label>
                                <div class="col-sm-2">
                                   <select class="form-control" name="designer_id">
                                        <?php if(is_array($designer)): foreach($designer as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($v['id']) == $house['designer_id']): ?>selected<?php endif; ?>><?php echo ($v["designer_name"]); ?></option><?php endforeach; endif; ?>
                                   </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">主材价格</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="main_price" value="<?php echo ($house["main_price"]); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">辅材价格</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="auxiliary_price" value="<?php echo ($house["auxiliary_price"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">工程造价</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="engineering" value="<?php echo ($house["engineering"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">瓷砖品牌</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="vitrolite_brand" value="<?php echo ($house["vitrolite_brand"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">地板品牌</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="floor_brand" value="<?php echo ($house["floor_brand"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">橱柜品牌</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="cupboard_brand" value="<?php echo ($house["cupboard_brand"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">门品牌</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="door_brand" value="<?php echo ($house["door_brand"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">五金品牌</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="hardware_brand" value="<?php echo ($house["hardware_brand"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">洁具品牌</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="clean_brand" value="<?php echo ($house["clean_brand"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">吊顶品牌</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="top_brand" value="<?php echo ($house["top_brand"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">总价</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="all_price" value="<?php echo ($house["all_price"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">人气</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="buy" value="<?php echo ($house["buy"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">大小</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="size" value="<?php echo ($house["size"]); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">描述</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="description" value="<?php echo ($house["description"]); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">排序</label>

                                <div class="col-sm-3">
                                    <input type="number" class="form-control" name="ord" value="<?php echo ($house["ord"]); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">展示图</label>
        
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="upload">
                                    <img src="/ap/Public/<?php echo ($house["image"]); ?>" class="" alt="" id="img">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">房屋描述</label>
                                <div class="col-sm-10">
                                   <script id="editor" type="text/plain" name="content"  style="width:800px;height:200px;"><?php echo (html_entity_decode($house["content"])); ?></script>
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
                                    <label>房屋名：</label>
                                    <input type="email" placeholder="请输入房屋名" class="form-control">
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