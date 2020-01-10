<?php if (!defined('THINK_PATH')) exit();?>﻿<!Doctype html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="zh-CN" />
    <title>AP精品大作</title>
    <meta name="keywords" content="长沙装修公司排名,榜，装饰公司，全包装修报价,小户型装修,装修报价表，长沙装修公司，装修公司，苹果装饰，长沙苹果装饰,十大装修公司" />
    <meta name="description" content="湖南苹果装饰专业从事家居装饰设计，家庭装修设计，装饰装修工程施工，室内设计服务。服务电话：400-0731-889" />
    <link href="/Public/Home/css/public.css" rel="stylesheet"/>


<script src="/Public/Home/js/jquery.js"></script>
<script src="/Public/Home/js/public.js"></script>
<script src="/Public/Home/js/uaredirect.js"></script>

    <script type="text/javascript">uaredirect("/Mobile");</script>

    <script language="javascript" type="text/javascript">var def = 1;</script>
    

    <!--[if (gte IE 6)&(lte IE 8)]>
      <script type="text/javascript" src="/Public/Home/js/selectivizr.js"></script>
      <noscript><link rel="stylesheet" href="/Public/Home/css/75deba04cb8c4e53ad136a736768ecf9.css" /></noscript>
    <![endif]-->

    <script type="text/javascript" src="/Public/Home/js/jquery.lazyload.js"></script>
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
            <div class="logo"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/picture/logo.png" alt="苹果装饰全国官网,长沙装修,装饰设计,别墅装修,苹果装饰装修公司" /><img src="/Public/Home/picture/logob.png" /></a></div>
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
            $(".header_logo_menu .logo").find("a").html('<img src="/Public/Home/picture/logo_b.png" alt="苹果装饰全国官网,长沙装修,装饰设计,别墅装修,苹果装饰装修公司" />');
            //$("body").css("background-position", "center 650px");

        } else {
            $(".header_logo_menu").removeClass("header_logo_menu_hover");
            //$(".header_logo_menu .logo").find("img").attr("src", "/Content/web/images/logo.png");
            $(".header_logo_menu .logo").find("a").html('<img src="/Public/Home/picture/logo.png" alt="苹果装饰全国官网,长沙装修,装饰设计,别墅装修,苹果装饰装修公司" /><img src="/Public/Home/picture/logob.png" />');
            //$("body").css("background-position", "center 720px");

        }
    });

});
</script>
<link href="/Public/Home/css/index.css" rel="stylesheet"/>
<!--滑动轮播图 -->
<style type="text/css">
    /* 本例子css */
        .slideBox{ width:100%; height:560px; overflow:hidden; position:relative; border:1px solid #ddd;  }
        .slideBox .hd{ height:15px; overflow:hidden; position:absolute;width: 100%;left:0; bottom:5px; z-index:2; }
        .slideBox .hd ul{ overflow:hidden;margin:0 auto; zoom:1; display: flex;width: 84px;justify-content:space-between;}
        .slideBox .hd ul li{ float:left;  width:15px; height:15px; border-radius: 50%; line-height:14px; text-align:center; background:rgba(255,255,255,.3); cursor:pointer; }
        .slideBox .hd ul li.on{ background:#fff; color:#fff; }
        .slideBox .bd{ position:relative; height:100%; z-index:0;   }
        .slideBox .bd li{ zoom:1; vertical-align:middle; }
        .slideBox .bd img{ width:1900px; height:560px; display:block;  }

        /* 下面是前/后按钮代码，如果不需要删除即可 */
        .slideBox .prev,
        .slideBox .next{ position:absolute; left:3%; top:50%; margin-top:-25px; display:block; width:32px; height:40px; background:url(/Public/Home/images/slider-arrow.png) -110px 5px no-repeat; filter:alpha(opacity=50);opacity:0.5;   }
        .slideBox .next{ left:auto; right:3%; background-position:8px 5px; }
        .slideBox .prev:hover,
        .slideBox .next:hover{ filter:alpha(opacity=100);opacity:1;  }
        .slideBox .prevStop{ display:none;  }
        .slideBox .nextStop{ display:none;  }
</style>
<div id="slideBox" class="slideBox">
            <div class="hd">
                <ul><li></li><li></li><li></li><li></li></ul>
            </div>
            <div class="bd">
                <ul>
                    <?php if(is_array($banner)): foreach($banner as $key=>$v): ?><li><a href="<?php echo U('Home/Anli/anli');?>" ><img src="/Public/<?php echo ($v["image"]); ?>" /></a></li><?php endforeach; endif; ?>
                </ul>
            </div>

            <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
            <a class="prev" href="javascript:void(0)"></a>
            <a class="next" href="javascript:void(0)"></a>

        </div>

    <!--轮播-->
    <script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js"></script>
    <script>
            jQuery(".slideBox").slide({mainCell:".bd ul",effect:"leftLoop",autoPlay:true,delayTime:1000});
        </script>



<!--案例部分 -->

<div class="cases">
    <div class="container">
        <div class="top">
            <h3>精品案例</h3><label>装修案例 眼见为实，触动你的灵感</label>
			<span class="cases_top">
				<a href="<?php echo U('Home/Anli/anli');?>">查看更多&nbsp;+</a>
			</span>
			<div class="clearfix"></div>
        </div>
        <div class="cases_list">
            <div class="cases_da">
<a href="<?php echo U('Home/Anli/anli_art/id/'.$house_lg['id']);?>" rel="nofollow"><img src="/Public/<?php echo ($house_lg["image"]); ?>" class="lazy" alt="<?php echo ($house_lg["house_name"]); ?>" style="width:594px;height:442px;" /><div><h3><?php echo ($house_lg["house_name"]); ?></h3><p>设计没有标准，用综合美学来诠释属于项目定位和客人喜好的住宅环境，用雅奢理念赋予对设计的一种追求和生活。在住宅项目上，兼顾实用的同时，赋予适合主人的审美</p><span>在线咨询</span></div></a>
            </div>
            <dl class="cases_xiao">
            <?php if(is_array($house_lt)): foreach($house_lt as $key=>$v): ?><dd><a href="<?php echo U('Home/Anli/anli_art/id/'.$v['id']);?>" ><img src="/Public/Thumb/<?php echo ($v["image"]); ?>" class="lazy" alt="<?php echo ($v["house_name"]); ?>" /><h4><?php echo ($v["house_name"]); ?></h4></a></dd><?php endforeach; endif; ?>

            </dl>
            <div class="clearfix"></div>
        </div>

        
    </div>
</div>


<!--服务流程-->
<div class="container serviceprocess">
    <div class="top">
        <h3>服务流程</h3><label>官网预约 先享服务后定装</label>
        <div class="clearfix"></div>
    </div>
    <div class="decoration-reference">
        <div class="flow-container">
            <!--在线预约-->
            <div class="flow-item">
                <a href="<?php echo U('Home/Designer/designer');?>" rel="nofollow">
                    <div class="flow-icon">
                        <div class="border-top"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                        <div class="border-right"></div>
                        <div class="animation-box">
                            <em class="deco-life-sofa flow-ui"></em>
                        </div>
                    </div>
                    <p>在线预约</p>
                </a>
            </div>
            <div class="flow-line">
                <div class="border-horizontal"></div>
            </div>
            <!--验房量房-->
            <div class="flow-item">
                <a href="<?php echo U('Home/Designer/designer');?>" rel="nofollow">
                    <div class="flow-icon">
                        <div class="border-horizontal border-top"></div>
                        <div class="border-horizontal border-bottom"></div>
                        <div class="border-left">
                            <div class="part-top">
                                <div class="border-vertical move-to-top"></div>
                            </div>
                            <div class="part-bottom">
                                <div class="border-vertical move-to-bottom"></div>
                            </div>
                        </div>
                        <div class="border-right">
                            <div class="part-top">
                                <div class="border-vertical move-to-bottom"></div>
                            </div>
                            <div class="part-bottom">
                                <div class="border-vertical move-to-top"></div>
                            </div>
                        </div>
                        <div class="animation-box">
                            <em class="deco-before-ruler1 flow-ui"></em>
                            <em class="deco-before-ruler2 flow-ui"></em>
                        </div>
                    </div>
                    <p>验房量房</p>
                </a>
            </div>
            <div class="flow-line"></div>
            <!--设计方案-->
            <div class="flow-item">
                <a href="<?php echo U('Home/Designer/designer');?>" rel="nofollow">
                    <div class="flow-icon">
                        <div class="border-top"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                        <div class="border-right"></div>
                        <div class="animation-box">
                            <em class="deco-design-ruler flow-ui"></em>
                            <em class="deco-design-pen flow-ui"></em>
                        </div>
                    </div>
                    <p>设计方案</p>
                </a>
            </div>
            <div class="flow-line"></div>
            <!--预算报价-->
            <div class="flow-item">
                <a href="<?php echo U('Home/Designer/designer');?>" class="fixed_bj" rel="nofollow">
                    <div class="flow-icon">
                        <div class="border-top"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                        <div class="border-right"></div>
                        <div class="animation-box">
                            <em class="deco-search flow-ui"></em>
                        </div>
                    </div>
                    <p>预算报价</p>
                </a>
            </div>
            <div class="flow-line"></div>
            <!--签订合同-->
            <div class="flow-item">
                <a href="<?php echo U('Home/Designer/designer');?>" rel="nofollow">
                    <div class="flow-icon">
                        <div class="border-top"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                        <div class="border-right"></div>
                        <div class="animation-box">
                            <em class="deco-purchase-basket flow-ui"></em>
                        </div>
                    </div>
                    <p>签订合同</p>
                </a>
            </div>
            <div class="flow-line"></div>
            <!--施工阶段-->
            <div class="flow-item">
                <a href="<?php echo U('Home/Designer/designer');?>" rel="nofollow">
                    <div class="flow-icon">
                        <div class="border-top"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                        <div class="border-right"></div>
                        <div class="animation-box">
                            <em class="deco-working flow-ui"></em>
                            <span class="wall flow-ui-plus"><em></em></span>
                        </div>
                    </div>
                    <p>施工阶段</p>
                </a>
            </div>
            <div class="flow-line"></div>
            <!--验收结算-->
            <div class="flow-item">
                <a href="<?php echo U('Home/Designer/designer');?>" rel="nofollow">
                    <div class="flow-icon">
                        <div class="border-top"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                        <div class="border-right"></div>
                        <div class="animation-box">
                            <em class="deco-check-paper flow-ui"></em>
                            <em class="deco-check-symbol flow-ui"></em>
                        </div>
                    </div>
                    <p>验收结算</p>
                </a>
            </div>
            <div class="flow-line"></div>
            <!--售后服务-->
                
                <div class="flow-item">
                    <a href="<?php echo U('Home/Designer/designer');?>" rel="nofollow">
                        <div class="flow-icon">
                            <div class="border-top"></div>
                            <div class="border-bottom"></div>
                            <div class="border-left"></div>
                            <div class="border-right"></div>
                            <div class="animation-box">
                                <em class="deco-prepare-wrench flow-ui"></em>
                                <em class="deco-prepare-hammer flow-ui"></em>
                            </div>
                        </div>
                        <p>售后服务</p>
                    </a>
                </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<!--设计团队-->
<div class="container designer">
    <div class="top">
        <h3>设计团队</h3>
        <label>设计精英倾心服务 帮您实现理想家</label>
        <span>
            <a href="<?php echo U('Home/Designer/designer');?>">查看全部设计师&nbsp;+</a>
        </span>
        <div class="clearfix"></div>
    </div>


    <div class="designer_left">
        <dl>
            <?php if(is_array($designer)): foreach($designer as $key=>$v): ?><dd><a href="<?php echo U('Home/Designer/designer_art/id/'.$v['id']);?>" ><img src="/Public/<?php echo ($v["image"]); ?>" class="lazy" alt="<?php echo ($v["designer_name"]); ?>" /><h4 class="ds_names"><?php echo ($v["designer_name"]); ?></h4></a></dd><?php endforeach; endif; ?>

        </dl>
        <div class="clearfix"></div>
        <div class="designer_left_yy">
            <a href="<?php echo U('Home/Designer/designer');?>" rel="nofollow">
                <img src="/Public/Home/picture/ds_reserve.png" alt="预约设计师" />
            </a>
        </div>
    </div>
    <div class="designer_right">

<div class="designer_headlines">
<a href="<?php echo U('Home/Designer/designer_art/id/'.$designer_king['id']);?>" rel="nofollow"><img src="/Public/<?php echo ($designer_king["image"]); ?>" class="lazy" alt="<?php echo ($designer_king["designer_name"]); ?>" /><i></i>
<div>
<h3><?php echo ($designer_king["designer_name"]); ?></h3><p>设计职位：<?php echo ($designer_king["l_name"]); ?></p><p>入行时间：<?php echo (date('Y',$designer_king["jointime"])); ?></p><p>擅长风格：<?php echo (html_entity_decode($designer_king["description"])); ?></p><span>预约设计师</span></div>
</a></div>
<div class="swiper-container">
<div class="swiper-wrapper">
<div class="swiper-slide"><a href="<?php echo U('Home/Anli/anli_art/id/'.$designer_king['h_id']);?>" ><img src="/Public/<?php echo ($designer_king['h_image']); ?>" class="lazy" alt="<?php echo ($designer_king['h_name']); ?>" /><div class="silder_text"><h5><?php echo ($designer_king['h_name']); ?></h5><p>&nbsp; &nbsp; &nbsp; <?php echo ($designer_king["h_description"]); ?></p></div></a></div>
</div>
<div class="swiper-pagination"></div>
</div>
<div class="clearfix"></div>
<div class="designer_left_yy"><a href="<?php echo U('Home/Designer/designer');?>"><img src="/Public/Home/picture/ds_reserve_2.png" alt="专属设计师" /><span><i>→</i></span></a></div>

 
    </div>

    <div class="clearfix"></div>
        
    
</div>

<!--装修课堂-->

<div class="decorate">
    <div class="container decorate">
        <div class="top"><h3>装修课堂</h3><label>完整装修流程与攻略</label><span><a href="<?php echo U('Home/News/news');?>">查看更多&nbsp;+</a></span><div class="clearfix"></div></div>
        

        <div class="decorate_dsj">
            <div class="decorate_left">
                <i></i>
                <h2>装修大事件</h2>
                <div class="border"></div>
                <p>简单、适用、新趣味</p>
            </div>
            <div class="decorate_right">
               <div class="decorate_sj">
                   <div class="decorate_top"><h3><?php echo ($cat_sj["name"]); ?></h3>
						<span><a href="<?php echo U('Home/news/news_more/id/'.$cat_sj['id']);?>">查看更多</a></span>
						<div class="clearfix"></div></div>
                    <dl>
                        <?php if(is_array($news_sj)): foreach($news_sj as $key=>$v): ?><dd><a href="<?php echo U('Home/News/news_art/id/'.$v['id']);?>" ><?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; ?>
                    </dl>
               </div>
               <div class="decorate_fs">
                   <div class="decorate_top"><h3><?php echo ($cat_fs["name"]); ?></h3>
						<span><a href="<?php echo U('Home/news/news_more/id/'.$cat_fs['id']);?>">查看更多</a></span>
						<div class="clearfix"></div></div>
                    <dl>
                        <?php if(is_array($news_fs)): foreach($news_fs as $key=>$v): ?><dd><a href="<?php echo U('Home/News/news_art/id/'.$v['id']);?>" ><?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; ?>
                    </dl>
               </div>
                <div class="decorate_rj">
                    <div class="decorate_top"><h3><?php echo ($cat_fs["name"]); ?></h3>
						<span><a href="<?php echo U('Home/news/news_more/id/'.$cat_rj['id']);?>">查看更多</a></span>
						<div class="clearfix"></div></div>
                    <dl>
                        <?php if(is_array($news_rj)): foreach($news_rj as $key=>$v): ?><dd><a href="<?php echo U('Home/News/news_art/id/'.$v['id']);?>" ><?php echo (substr($v["title"],'0','30')); ?>...</a></dd><?php endforeach; endif; ?>
                    </dl>
                </div>
decorate_rj decorate_fs
            </div>
</div>
            <div class="clearfix"></div>
        </div>
</div>


<!--装修服务-->
<div class="container corp_service">
    <?php if(is_array($service)): foreach($service as $key=>$v): ?><dl>
            <dt>
                <img src="/Public/<?php echo ($v["image"]); ?>">
            </dt>
            <dd>
                <h3><?php echo ($v["max_title"]); ?></h3>
                <h4><?php echo ($v["min_title"]); ?></h4>
            </dd>
        </dl><?php endforeach; endif; ?>
</div>
<div class="clearfix"></div>
<!--页底-->
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



            
        <div class="float_bottom_close"><i></i><img src="/Public/Home/picture/bottom_close.png"></div>
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
<script language="javascript" src="/Public/Home/js/lsjs.js"></script>
   


    <div style="display:none">
        <script src="/Public/Home/js/z_stat.js" language="JavaScript"></script>
    </div>
</body>
</html>