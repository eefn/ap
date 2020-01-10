<?php if (!defined('THINK_PATH')) exit();?><dl id="dl">
	<?php if(empty($house)): ?><h1 style="color:#ccc;text-align:center;font-size:24px;margin-top:20px;">暂无相关案例信息</h1>
	<?php else: ?>
		<?php if(is_array($house)): foreach($house as $key=>$value): ?><dd>
				<i><a href="<?php echo U('Home/Anli/anli_art/id/'.$value['id']);?>">了解详细</a></i>
				<a href="">
					<label><a href="<?php echo U('Home/Anli/anli_art/id/'.$value['id']);?>"><img src="/ap/Public/<?php echo ($value["image"]); ?>" style="width: 386px;height: 240px;"></a></label>
					<div>
						<h4><?php echo ($value["house_name"]); ?></h4>
						<?php if(is_array($style)): foreach($style as $key=>$v): if(($value["style_id"]) == $v["id"]): ?><span><?php echo ($value["all_price"]); ?>万丨 <?php echo ($v["style_name"]); ?>丨 <?php echo ($value["size"]); ?>m²</span><?php endif; endforeach; endif; ?>
					</div>
				</a>
			</dd><?php endforeach; endif; endif; ?>
	
	</dl>
<div class="pags">
<ul class="pagination">
    <?php echo ($show); ?>
</ul>
</div>

 <script>

 </script>