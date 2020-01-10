<?php if (!defined('THINK_PATH')) exit();?>﻿<!Doctype html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="zh-CN" />
    <title>AP精品大作</title>
    <meta name="keywords" content="长沙装修公司排名,榜，装饰公司，全包装修报价,小户型装修,装修报价表，长沙装修公司，装修公司，苹果装饰，长沙苹果装饰,十大装修公司" />
    <meta name="description" content="湖南苹果装饰专业从事家居装饰设计，家庭装修设计，装饰装修工程施工，室内设计服务。服务电话：400-0731-889" />
    <link href="/ap/Public/Home/css/public.css" rel="stylesheet"/>


<script src="/ap/Public/Home/js/jquery.js"></script>
<script src="/ap/Public/Home/js/public.js"></script>
<script src="/ap/Public/Home/js/uaredirect.js"></script>

    <script type="text/javascript">uaredirect("/Mobile");</script>

    <script language="javascript" type="text/javascript">var def = 1;</script>
    

    <!--[if (gte IE 6)&(lte IE 8)]>
      <script type="text/javascript" src="/ap/Public/Home/js/selectivizr.js"></script>
      <noscript><link rel="stylesheet" href="/ap/Public/Home/css/75deba04cb8c4e53ad136a736768ecf9.css" /></noscript>
    <![endif]-->

    <script type="text/javascript" src="/ap/Public/Home/js/jquery.lazyload.js"></script>
    <script type="text/javascript" charset="utf-8">
      jQuery(function() {
          jQuery(".lazy").lazyload({
              placeholder: "/Content/web/images/lazy.png",
              effect: "fadeIn"
           });
      });
    </script>
    
</head>
<body>

    

 <!--页面头部-->

<div class="header">
    <!-- <div class="header_top">
        <div class="container">
            <div class="header_city">您的当前位置 <strong>长沙</strong></div>
            <div class="header_tel"><i></i>24小时热线 : 400-0731-889</div>
            <div class="clearfix"></div>
        </div>
    </div> -->
    <div class="header_logo_menu">
        <div class="container">
            <div class="logo"><a href="<?php echo U('Home/Index/index');?>"><img src="/ap/Public/Home/picture/logo.png" alt="苹果装饰全国官网,长沙装修,装饰设计,别墅装修,苹果装饰装修公司" /><img src="/ap/Public/Home/picture/logob.png" /></a></div>
            <div class="header_menu">
                <dl>
                    <?php if(is_array($nav_list)): foreach($nav_list as $key=>$value): ?><dd <?php if(($key) == "0"): ?>id="h_first"<?php endif; ?>>
                            <a href="<?php echo U($value['url']);?>"><?php echo ($value["name"]); ?></a>
                            <?php if(($value['son']) != ""): ?><div class="sub_menu">
                                    <?php if(is_array($value['son'])): foreach($value['son'] as $key=>$v): ?><p><a href="<?php echo U($v['url'].'/id/'.$v['id']);?>"><?php echo ($v["name"]); ?></a></p><?php endforeach; endif; ?>
                                </div><?php endif; ?>
                            <?php if(($value['name']) == "设计团队"): ?><div class="sub_menu">
                                    <?php if(is_array($value['son'])): foreach($value['son'] as $key=>$v): if(is_array($designer_lv)): foreach($designer_lv as $key=>$val): if(($val['name']) == $v['name']): ?><p><a href="<?php echo U('Home/Designer/designer/id/'.$val['id']);?>"><?php echo ($v["name"]); ?></a></p><?php endif; endforeach; endif; endforeach; endif; ?>
                                </div><?php endif; ?>
                             <?php if(($value['cat']) != ""): ?><div class="sub_menu">
                                    <?php if(is_array($value['cat'])): foreach($value['cat'] as $key=>$v): ?><p><a href="<?php echo U('Home/News/news_more/id/'.$v['id']);?>"><?php echo ($v["name"]); ?></a></p><?php endforeach; endif; ?>
                                </div><?php endif; ?>
                            <?php if(($value['about']) != ""): ?><div class="sub_menu">
                                    <?php if(is_array($value['about'])): foreach($value['about'] as $key=>$v): ?><p><a href="<?php echo U('Home/About/page/id/'.$v['id']);?>"><?php echo ($v["name"]); ?></a></p><?php endforeach; endif; ?>
                                </div><?php endif; ?>
                        </dd><?php endforeach; endif; ?>
                </dl>
            </div>
            <div class="clearfix"></div>
        </div>
        
    </div>


</div>
<script language="javascript" type="text/javascript">




$(function () {
    $(window).on('scroll', function () {
        var $scroll = $(this).scrollTop();
        if ($scroll >= 200) {
            $(".header_logo_menu").addClass("header_logo_menu_hover");
            //$(".header_logo_menu .logo").find("img").attr("src", "/Content/web/images/logo_b.png");
            $(".header_logo_menu .logo").find("a").html('<img src="/ap/Public/Home/picture/logo_b.png" alt="苹果装饰全国官网,长沙装修,装饰设计,别墅装修,苹果装饰装修公司" />');
            //$("body").css("background-position", "center 650px");

        } else {
            $(".header_logo_menu").removeClass("header_logo_menu_hover");
            //$(".header_logo_menu .logo").find("img").attr("src", "/Content/web/images/logo.png");
            $(".header_logo_menu .logo").find("a").html('<img src="/ap/Public/Home/picture/logo.png" alt="苹果装饰全国官网,长沙装修,装饰设计,别墅装修,苹果装饰装修公司" /><img src="/ap/Public/Home/picture/logob.png" />');
            //$("body").css("background-position", "center 720px");

        }
    });

});
</script>
<link href="/ap/Public/Home/css/insidepublic.css" rel="stylesheet"/>  


<div class="vr_banner">
    <div class="container">
        <div class="vr_liucheng">
            <h3>服务流程<i>Service Process</i></h3>
            <dl><dd><i style="background: url('/ap/Public/Home/images/liucheng_list_dd.png') no-repeat 0 center;"></i><p>在线预约</p></dd><dd><i></i><p>验房量房</p></dd><dd><i></i><p>设计报价</p></dd><dd><i></i><p>精算签约</p></dd><dd><i></i><p>工地施工</p></dd><dd><i></i><p>验收结算</p></dd><dd><i></i><p>售后服务</p></dd></dl>
        </div>
        <div class="vr_box">
            <div class="top top_line">
                <h3>
                    <a href="/">首页</a>
 &gt; <strong>设计团队</strong>                </h3>
                <span>D E S I G N _ T E A M 个性化设计 为您出谋划策</span>
                <div class="clearfix"></div>
            </div>

            <div class="cases_chacked">
                <dl>
                    <dt>设计级别</dt>
                    <dd id="lv_cat">
                        <?php if(($get_id) == ""): ?><a href="#"  class="hover" lv_id="0">不限</a>
                            <?php if(is_array($designer_lv)): foreach($designer_lv as $key=>$v): ?><a href="#" lv_id="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a><?php endforeach; endif; ?>
                        <?php else: ?>
                            <a href="#" lv_id="0">不限</a>
                            <?php if(is_array($designer_lv)): foreach($designer_lv as $key=>$v): ?><a href="#" lv_id="<?php echo ($v["id"]); ?>" <?php if(($v['id']) == $get_id): ?>class="hover"<?php endif; ?>><?php echo ($v["name"]); ?></a><?php endforeach; endif; endif; ?>
                        
                    </dd>
                </dl>
                <dl>
                    <dt>擅长风格</dt>
                    <dd id="style_cat">
                        <a href="#"  class="hover" style_id="0">不限</a>
                        <?php if(is_array($designer_style)): foreach($designer_style as $key=>$v): ?><a href="#" style_id="<?php echo ($v["id"]); ?>"><?php echo ($v["style_name"]); ?></a><?php endforeach; endif; ?>
                    </dd>
                </dl>
         
                <div class="cases_search">
                        <input name="Search_Keyword" id="search" placeholder="设计师姓名" value="" /><button type="submit" id="sousuo">搜索</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container designers_list">



</div>
    
    
<!--页底-->

<div class="footer">
    <div class="footer_menu">
        <dl id="f_first">
            <dt>
                <a href="<?php echo U('Home/Anli/anli');?>">一站式家装服务高品质家装品牌</a>
            </dt>
            <dd>
                <a href="<?php echo U('Home/Anli/anli');?>" rel="nofollow"><span class="org">6</span>大国家专利成就工程标杆</a>
                <a href="<?php echo U('Home/Anli/anli');?>" rel="nofollow"><span class="org">15</span>年来专注家装服务质量提升</a>
                
                <a href="<?php echo U('Home/Anli/anli');?>" rel="nofollow"><span class="org">500000</span>客户已安心住进新家</a>
		<a href="<?php echo U('Home/Anli/anli');?>" rel="nofollow"><span class="org">2000</span>名资深设计大咖专属服务</a>
            </dd>
        </dl>
        <dl>
            <dt>
                苹果装饰
            </dt>
            <dd>
                <a href="<?php echo U('Home/About/page');?>">关于我们</a>
                <a href="<?php echo U('Home/About/page/id/3');?>">品牌历程</a>
                <a href="<?php echo U('Home/About/page/id/4');?>">加入我们</a>
            </dd>
        </dl>
        <dl>
            <dt>
                免费服务
            </dt>
            <dd>
                <a href="<?php echo U('Home/Designer/designer');?>">免费验房</a>
                <a href="<?php echo U('Home/Designer/designer');?>">免费量房</a>
                <a href="<?php echo U('Home/Designer/designer');?>">免费报价</a>
                <a href="<?php echo U('Home/Designer/designer');?>">免费参观专利工地</a>
            </dd>
        </dl>
        <dl>
            <dt>
                <a  rel="nofollow">装修知识</a>
            </dt>
            <dd>
                <a href="<?php echo U('Home/News/news');?>">装修知识</a>
                <a href="<?php echo U('Home/News/news_more/id/8');?>">装修设计</a>
                <a href="<?php echo U('Home/News/news_more/id/10');?>">装修风水</a>
                <a href="<?php echo U('Home/News/news_more/id/9');?>">装修日记</a>
            </dd>
        </dl>
        <dl class="last_box">
            <dt>
                咨询热线
            </dt>
            <p class="org">666-666-666</p>
            <p class="two">周一至周日&nbsp;&nbsp;9:00-21:00</p>
            <a href="#">

                <div class="button">在线咨询</div>
            </a>
        </dl>
        <div class="clearfix"></div>
    </div>
</div>



            
        <div class="float_bottom_close"><i></i><img src="/ap/Public/Home/picture/bottom_close.png"></div>
        <script>
            $(document).ready(function () {


                

                $('.float_bottom').on('click', function () {
                    $('.float_bottom').removeClass('in');
                    $('.float_bottom_close').css('display', 'block');
                });

                $('.float_bottom_close').on('click', 'img', function () {
                    $('.float_bottom').addClass('in');
                    $('.float_bottom_close').css('display', 'none');
                });

                $(window).scroll(function () {
                    if ($(window).scrollTop() >= 200) {
                        if ($(".float_bottom").is('.on')) {
                            $(".float_bottom").removeClass('on');
                            $(".float_bottom_close").css('display', 'block');
                        }

                    } else {
                        if ($(".float_bottom").is('.in')) {

                        }
                        else {
                            $(".float_bottom").addClass('on').removeClass('in');
                            $(".float_bottom_close").css('display', 'none');
                        }
                    };


                });

            });
        </script>
        <!--底部浮动-->
<script language="javascript" src="/ap/Public/Home/js/lsjs.js"></script>
   


    <div style="display:none">
        <script src="/ap/Public/Home/js/z_stat.js" language="JavaScript"></script>
    </div>
</body>
</html>

<script>
    $('.cases_chacked dl dd a').click(function(){
        $(this).addClass('hover').siblings('a').removeClass('hover');
        return false;
    })
</script>
<script>
        
        $.ajax({
            type:'get',
            url:"<?php echo U('Home/Designer/ajaxdesigner');?>",
            data:'style_id='+$('#style_cat').find('.hover').attr('style_id')+'&lv_id='+$('#lv_cat').find('.hover').attr('lv_id'),
            dataType:'html',
            success:function(z){
                $('.designers_list').html(z);
            }
        })

        $('.cases_chacked dl dd a').click(function(){
            var style=$('#style_cat').find('.hover').attr('style_id');
            var lv=$('#lv_cat').find('.hover').attr('lv_id');
            //console.log(style);
            //alert(lv);
            $.ajax({
                type:'get',
                url:"<?php echo U('Home/Designer/ajaxdesigner');?>",
                data:'style_id='+style+'&lv_id='+lv,
                dataType:'html',
                success:function(z){
                    //console.log(z);
                    $('.designers_list').html(z);
                }
            })
            return false;
        })

        $(document).on('click','.designers_list .pags ul li a',function(){
            var url=$(this).attr('href');
            $.ajax({
            type:'get',
            url:url,
            data:'',
            dataType:'html',
            success:function(z){
              $('.designers_list').html(z);
            }
          })
            return false;
        })

        $('#search').keypress(function(e){
            if(e.keyCode==13){
              $('#sousuo').trigger('click');
            }
        })

        $('#sousuo').click(function(){
            var value=$('#search').val();
            var style=$('#style_cat').find('.hover').attr('style_id');
            var lv=$('#lv_cat').find('.hover').attr('lv_id');
              $.ajax({
              type:'get',
              url:"<?php echo U('Home/Designer/ajaxdesigner');?>",
              data:'style_id='+style+'&lv_id='+lv+'&search='+value,
              dataType:'html',
              success:function(z){
                $('.designers_list').html(z);
              }
            })
        })
    </script>