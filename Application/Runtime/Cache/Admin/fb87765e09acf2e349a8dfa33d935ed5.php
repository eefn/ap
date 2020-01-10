<?php if (!defined('THINK_PATH')) exit(); if(is_array($type)): foreach($type as $key=>$v): ?><tr>
                                        <td>
                                            <?php echo ($a++); ?>
                                        </td>
                                         <td >
                                            <?php echo ($v["type_name"]); ?>
                                        </td>   
                                        <td >
                                           <?php echo (date("Y-m-d",$v["addtime"])); ?>
                                        </td>
                                        <td >
                                             <?php echo ($v["ord"]); ?>
                                        </td>            
                                        <td>
                                            <a href="<?php echo U('Admin/Type/type_edit/id/'.$v['id']);?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a> 
                                            <a href="javascript:void(0)" class="btn btn-white btn-sm del" del_id="<?php echo ($v["id"]); ?>"><i class="fa fa-trash"></i> 删除 </a>
                                        </td>
                                    </tr><?php endforeach; endif; ?>
<tr>
    <td colspan="9" class="page"><?php echo ($show); ?></td>
</tr>