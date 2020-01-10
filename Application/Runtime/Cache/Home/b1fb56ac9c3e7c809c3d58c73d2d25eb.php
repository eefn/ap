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
<link href="/ap/Public/Home/css/insidepublic_1.css" rel="stylesheet"/>

<div class="container top">
    <h3><a href="<?php echo U('Home/Index/index');?>">首页</a>
 &gt; <a href="<?php echo U('Home/News/news');?>">装修课堂</a>  &gt;  <a href="<?php echo U('Home/News/news_more/id/'.$news_cat['id']);?>"><?php echo ($news_cat["name"]); ?></a>     &gt; <strong><?php echo ($news["title"]); ?></strong></h3>
  
    <div class="clearfix"></div>
</div>

<div class="cases_details_ads"><a href="#"><img src="/ap/Public/Home/picture/cases_details_ads.jpg" alt="" /></a></div>

<div class="container cases_details">
    <div class="cases_details_left">    
        <div class="cases_details_title"><?php echo ($news["title"]); ?></div>
        <div class="cases_details_title_detaileds">     
            <span><i><?php echo ($news["click"]); ?></i>人气</span>
        </div>
        <div class="cases_details_show"><p class="MsoNormal" align="center" style="text-align:center;">
	<br />
</p>
<p class="MsoNormal">
	&nbsp;
</p>
<?php echo (html_entity_decode($news["content"])); ?>
<p class="MsoNormal">
	&nbsp;
</p>
<p class="MsoNormal">
	<br />
</p></div>


    </div>
        <div class="cases_details_right" style="position: relative">
        <p id="placeholder" style="position:absolute;left:0;top:-16px;"></p>
        <div class="cases_baojia">
            <h3><img src="/ap/Public/Home/picture/cases_baojia.jpg" alt="" /></h3>
            <form id="cases_baojia">
                <input type="hidden" name="house_id" value="<?php echo ($house["id"]); ?>">
                <select name="level" class="level">
                    <option value="">装修档次</option>
                    <option value="豪华装修">豪华装修</option>
                    <option value="精品装修">精品装修</option>
                    <option value="简单装修">简单装修</option>
                </select>
                <input name="area" class="areas" placeholder="建筑面积" value="" maxlength="20" type="number" />
                <input name="guestbook_name" class="realname" placeholder="输入您的称呼" value="" maxlength="20" type="text" />                
                <input name="phone" class="telephone" placeholder="输入号码，报价结果将发送到手机" value="" maxlength="11" type="text" />
                <button type="button" id="button">快速报价</button>
            </form>
            <p>我们承诺：绝不产生任何费用，为了您的利益以及我们的口碑，您的隐私将被严格保密。</p>
        </div>
        
        <div class="decorate_tag_list">

            <div class="lable">
                <h2>装修前-准备阶段</h2>
                <div class="lable-1">
                    <a href="#"><i class="hover1"></i>房产</a>
                    <a href="#"><i class="hover2"></i>收房</a>
                    <a href="#"><i class="hover3"></i>设计</a>
                    <a href="#"><i class="hover4"></i>预算</a>
                    <a href="#"><i class="hover5"></i>合同</a>
                </div>
            </div>
            <div class="lable">
                <h2>装修中-施工阶段</h2>
                <div class="lable-2">
                    <a href="#"><i class="hover6"></i>材料</a>
                    <a href="#"><i class="hover7"></i>拆改</a>
                    <a href="#"><i class="hover8"></i>水电</a>
                    <a href="#"><i class="hover9"></i>防水</a>
                    <a href="#"><i class="hover10"></i>泥瓦</a>
                    <a href="#"><i class="hover11"></i>木工</a>
                    <a href="#"><i class="hover12"></i>油漆</a>
                    <a href="#"><i class="hover13"></i>安装收尾</a>
                </div>
            </div>
            <div class="lable">
                <h2>装修后-入住阶段</h2>
                <div class="lable-3">
                    <a href="#"><i class="hover14"></i>软装</a>
                    <a href="#"><i class="hover15"></i>入住</a>
                </div>
            </div>

        </div>


    </div>
    <div class="clearfix"></div>
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
    //Ajax留言
    $('#cases_baojia #button').click(function(){
        var guestbook_name=$('#cases_baojia .realname').val();
        var phone=$('#cases_baojia .telephone').val();
        var level=$('#cases_baojia .level').val();
        var area=$('#cases_baojia .areas').val();
        $.ajax({
            type:'post',
            url:"<?php echo U('Home/Anli/guestbook');?>",
            data:'guestbook_name='+guestbook_name+'&phone='+phone+'&level='+level+'&area='+area,
            dataType:"text",
            success:function(z){
                if(z==1){
                    alert('报价成功');
                    $('#placeholder').html('报价成功!!');
                    $('#placeholder').fadeIn(100);
                    $('#placeholder').fadeOut(5000);
                    $('#cases_baojia .areas').val('');
                }else{
                    alert(z);
                }
            }
        })
        return false;
    })
</script>