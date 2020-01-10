<?php if (!defined('THINK_PATH')) exit(); if(is_array($nav)): foreach($nav as $key=>$v): ?><tr>
                                        <td>
                                            <?php echo ++$offset;?>
                                        </td>
                                         <td class="aaaa">
                                            <a  aaa="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a>
                                        </td>   
                                        <td >
                                           <?php echo ($v["url"]); ?>
                                        </td>
                                        <td >
                                           <?php echo ($v["pname"]); ?>
                                        </td>
                                        <td >
                                             <?php echo ($v["ord"]); ?>
                                        </td>            
                                        <td>
                                            <a href="<?php echo U('Admin/nav/nav_edit/id/'.$v['id']);?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a> 
                                            <a href="javascript:void(0)" class="btn btn-white btn-sm del" del_id="<?php echo ($v["id"]); ?>"><i class="fa fa-trash"></i> 删除 </a>
                                        </td>
                                    </tr><?php endforeach; endif; ?>
<tr>
                                          <td colspan="9">
                                            <div class="page">
                                              <?php echo ($show); ?>
                                            </div>
                                          </td>
                                      </tr>