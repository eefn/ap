<?php if (!defined('THINK_PATH')) exit(); if(is_array($designer_style)): foreach($designer_style as $key=>$v): ?><tr>
                                          <td class="count">
                                              <?php echo ++$offset;?>
                                          </td>
                                          <td>
                                              <?php echo ($v["d_name"]); ?>
                                          </td>
                                          <td>
                                              <?php echo ($v["s_name"]); ?>
                                          </td>
                                          <td class="click" value="<?php echo ($v["id"]); ?>" is_show="<?php echo ($v["is_show"]); ?>">
                                              <?php if(($v['is_show']) == "1"): ?><img src="/ap/Public/Admin/img/yes.gif">
                                              <?php else: ?>
                                                  <img src="/ap/Public/Admin/img/no.gif"><?php endif; ?>
                                          </td>
                                          <td>
                                              <a href="<?php echo U('Admin/Designer/designer_style_edit/id/'.$v['id']);?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>                                        
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