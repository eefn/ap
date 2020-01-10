<?php if (!defined('THINK_PATH')) exit();?> <?php if(is_array($designer_lv)): foreach($designer_lv as $key=>$v): ?><tr>
                                          <td>
                                              <?php echo ++$offset;?>
                                          </td>
                                          <td>
                                              <?php echo ($v["name"]); ?>
                                          </td>
                                          <td>
                                              <?php echo (date('Y-m-d',$v["addtime"])); ?>
                                          </td>
                                          <td>
                                              <?php echo ($v["ord"]); ?>
                                          </td>
                                          <td>
                                              <a href="<?php echo U('Admin/Designer/designer_lv_edit/id/'.$v['id']);?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>                                        
                                              <a href="javascript:void(0)" del_id="<?php echo ($v['id']); ?>" class="btn btn-white btn-sm del"><i class="fa fa-trash"></i> 删除 </a>
                                          </td>
                                      </tr><?php endforeach; endif; ?>
                                      <tr>
                                          <td colspan="9">
                                            <div class="page">
                                              <?php echo ($show); ?>
                                            </div>
                                          </td>
                                      </tr>