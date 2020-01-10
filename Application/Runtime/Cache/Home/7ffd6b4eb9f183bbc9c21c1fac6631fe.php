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
<div class="cases_banner">
    <div class="container">
        <div class="cases_box">
            <div class="top top_line">
                <h3><a href="<?php echo U('Home/Index/index');?>">首页</a> &gt; <strong>装修案例</strong>                </h3>
                <span>眼见为实，触动你的灵感</span>
                <div class="clearfix"></div>
            </div>
            <div class="cases_chacked">
                <dl>
                    <dt>风格</dt>
                    <dd>
                    <a href=""  class="hover" style_id="0">不限</a>
                    <?php if(is_array($style)): foreach($style as $key=>$value): ?><a href="javascript:void(0)" style_id="<?php echo ($value['id']); ?>"><?php echo ($value["style_name"]); ?></a><?php endforeach; endif; ?>
                    </dd>
                </dl>
                <dl>
                    <dt>预算</dt>
                    <dd>
					<a href=""  class="hover" budget_id="0">不限</a>
					<?php if(is_array($budget)): foreach($budget as $key=>$value): ?><a href="javascript:void(0)" budget_id="<?php echo ($value['id']); ?>"><?php echo ($value["budget_name"]); ?></a><?php endforeach; endif; ?>
                	</dd>
                </dl>
                <dl>
                    <dt>户型</dt>
                    <dd>
					<a href=""  class="hover" type_id="0">不限</a>
					<?php if(is_array($type)): foreach($type as $key=>$value): ?><a href="javascript:void(0)" type_id="<?php echo ($value['id']); ?>"><?php echo ($value["type_name"]); ?></a><?php endforeach; endif; ?>
                	</dd>
                </dl>
                <div class="cases_search">
                    <form action="" method="get">
                        <input name="Search_Keyword" placeholder="案例搜索" value="" name="search" id="search"/>
                        <button type="submit" id="button">搜索</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<dl class="cases_sort container">
    <dt><a href="javascript:void(0)" hot_now="1">最热</a><a href="javascript:void(0)" hot_now="0">最新</a></dt>
    <dd>已为您推荐<strong>158</strong>套案例</dd>
</dl>
<div class="cases_list"></div>
<script>
	//初始化
	$.ajax({
        type:'get',
        url:"<?php echo U('Home/Anli/ajaxAnli');?>",
        dataType:'html',
        success:function(z){
          $('.cases_list').html(z);
        }
      })
	//ajax分页
    $(document).on('click','.pags a',function(){
        var url=$(this).attr('href');
        $.ajax({
          type:'get',
          url:url,
          dataType:'html',
          success:function(z){
            $('.cases_list').html(z);
          }
        })
        return false;
    })
    //ajax搜索框
    $(document).on('click','#button',function(){
	  var value=$('#search').val();
	  var style_id=$('.cases_chacked dl dd .hover').attr('style_id');
	  var budget_id=$('.cases_chacked dl:nth-child(2) dd .hover').attr('budget_id');
	  var type_id=$('.cases_chacked dl:nth-child(3) dd .hover').attr('type_id');
	  $.ajax({
	    type:'get',
	    url:"<?php echo U('Home/Anli/ajaxAnli');?>",
	    data:'search='+value+"&style_id="+style_id+"&budget_id="+budget_id+"&type_id="+type_id,
	    dataType:'html',
	    success:function(z){
	      $('.cases_list').html(z);
	    }
	 })
	  return false;
	})
	//buy,addtime的ajax查询
	$(document).on('click','.cases_sort a',function(){
	  var hot_now=$(this).attr('hot_now');
	  var value=$('#search').val();
	  var style_id=$('.cases_chacked dl dd .hover').attr('style_id');
	  var budget_id=$('.cases_chacked dl:nth-child(2) dd .hover').attr('budget_id');
	  var type_id=$('.cases_chacked dl:nth-child(3) dd .hover').attr('type_id');
	  $.ajax({
	    type:'get',
	    url:"<?php echo U('Home/Anli/ajaxAnli');?>",
	    data:"hot_now="+hot_now+"&search="+value+"&style_id="+style_id+"&budget_id="+budget_id+"&type_id="+type_id,
	    dataType:'html',
	    success:function(z){
	      $('.cases_list').html(z);
	    }
	 })
	  return false;
	})
	//ajax导航
	$('.cases_chacked dl dd a').click(function(){
		$(this).addClass('hover').siblings('a').removeClass('hover');
		var style_id=$('.cases_chacked dl dd .hover').attr('style_id');
		var budget_id=$('.cases_chacked dl:nth-child(2) dd .hover').attr('budget_id');
		var type_id=$('.cases_chacked dl:nth-child(3) dd .hover').attr('type_id');
		$.ajax({
			type:'get',
			url:"<?php echo U('Home/Anli/ajaxAnli');?>",
			data:"style_id="+style_id+"&budget_id="+budget_id+"&type_id="+type_id,
			dataType:'html',
			success:function(z){
				$('.cases_list').html(z);
			}
		})
		return false;
	})
</script>

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