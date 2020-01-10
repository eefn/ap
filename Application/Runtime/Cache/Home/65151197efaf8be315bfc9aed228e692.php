<?php if (!defined('THINK_PATH')) exit();?><dl>
        <?php if(is_array($house)): foreach($house as $key=>$v): ?><dd>
                <i><a href="<?php echo U('Home/Anli/anli_art/id/'.$v['id']);?>">标题</a></i>
                <a href="<?php echo U('Home/Anli/anli_art/id/'.$v['id']);?>">
                    <label><img src="/Public/<?php echo ($v["image"]); ?>" style="width: 386px;height: 240px;"></label>
                    <div>
                        <h4><?php echo ($v["house_name"]); ?></h4>
                        <span><?php echo ($v["all_price"]); ?>万丨 <?php echo ($v["t_name"]); ?>丨 <?php echo ($v["size"]); ?>m&sup2</span>
                    </div>
                </a>
            </dd><?php endforeach; endif; ?>
        </dl>
        <div class="pags">
        <ul class="pagination">
            <?php echo ($show); ?>
        </ul>
        </div>