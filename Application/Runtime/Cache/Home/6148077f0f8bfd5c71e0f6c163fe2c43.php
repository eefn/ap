<?php if (!defined('THINK_PATH')) exit();?>
    <dl>
        <?php if(empty($house)): ?><h1 style="color:#ccc;text-align:center;font-size:24px;margin-top:20px;">暂无相关产品信息</h1>
        <?php else: ?>
            <?php if(is_array($house)): foreach($house as $key=>$v): ?><dd>
                <i><a href="">标题</a></i>
                <a href="<?php echo U('Home/Anli/anli_art/id/'.$v['id']);?>">
                    <label><img src="/ap/Public/<?php echo ($v["image"]); ?>" style="width: 386px;height: 240px;"></label>
                    <div>
                        <h4><?php echo ($v["name"]); ?></h4>
                        <span><?php echo ($v["all_price"]); ?>万丨 <?php echo ($v["t_name"]); ?>丨 <?php echo ($v["size"]); ?>m&sup2</span>
                    </div>
                </a>
            </dd><?php endforeach; endif; endif; ?>
        </dl>
        <div class="pags">
        <ul class="pagination">
            <?php echo ($show); ?>
        </ul>
        </div>