<?php if (!defined('THINK_PATH')) exit(); if(is_array($guestbook)): foreach($guestbook as $key=>$v): ?><tr>
                                        <td>
                                            <span class="count"><?php echo ($a++); ?></span>
                                        </td>
                                         <td >
                                            <?php echo ($v["guestbook_name"]); ?>
                                        </td>   
                                        <td >
                                           <?php echo (date("Y-m-d",$v["addtime"])); ?>
                                        </td>
                                        <td >
                                             <?php echo ($v["phone"]); ?>
                                        </td>
                                        <td >
                                             <?php echo ($v["level"]); ?>
                                        </td>
                                        <td >
                                             <?php echo ($v["area"]); ?>
                                        </td>
                                        <td class="click" value="<?php echo ($v["id"]); ?>" is_read="<?php echo ($v["is_read"]); ?>">
                                        <?php if(($v['is_read']) == "1"): ?><img src="/ap/Public/Admin/img/yes.gif">
                                        <?php else: ?>
                                            <img src="/ap/Public/Admin/img/no.gif"><?php endif; ?>
                                        
                                        </td>            
                                        <td>
                                            <a href="<?php echo U('Admin/Guestbook/guestbook_edit/id/'.$v['id']);?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a> 
                                            <a href="javascript:void(0)" class="btn btn-white btn-sm del" del_id="<?php echo ($v["id"]); ?>"><i class="fa fa-trash"></i> 删除 </a>
                                        </td>
                                    </tr><?php endforeach; endif; ?>
<tr>
    <td colspan="9" class="page"><?php echo ($show); ?></td>
</tr>