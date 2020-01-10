<?php if (!defined('THINK_PATH')) exit();?><dl>
	<?php if(empty($designer)): ?><h1 style="color:#ccc;text-align:center;font-size:24px;margin-top:20px;">暂无相关设计师信息</h1>
        <?php else: ?>
            <?php if(is_array($designer)): foreach($designer as $key=>$v): ?><dd>
		    <a href="<?php echo U('Home/Designer/designer_art/id/'.$v['id']);?>"><img src="/ap/Public/<?php echo ($v["image"]); ?>" class="lazy" alt="<?php echo ($v["designer_name"]); ?>" style="width: 280px;height: 280px;" /><h4><?php echo ($v["designer_name"]); ?><i><?php echo ($v["lv_name"]); ?></i></h4><div><p>入行时间：<span><?php echo (date('Y',$v["jointime"])); ?></span></p><p>擅长风格：<span><?php echo (html_entity_decode($v["description"])); ?></span></p></div></a><a href="<?php echo U('Home/Designer/designer_art/id/'.$v['id']);?>"><h5>预约设计师</h5></a>
		</dd><?php endforeach; endif; endif; ?>
	
</dl>
<div class="clearfix"></div>
<div class="pags">
    <ul class="pagination">
        <?php echo ($show); ?>
    </ul>
</div>