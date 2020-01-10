<?php if (!defined('THINK_PATH')) exit(); if(is_array($designer)): foreach($designer as $key=>$v): ?><tr>
                                          <td>
                                              <?php echo ++$offset;?>
                                          </td>
                                          <td>
                                              <?php echo ($v["designer_name"]); ?>
                                          </td>
                                          <td>
                                              <img src="/Public/<?php echo ($v["image"]); ?>" alt="" style="width:50px;height:50px;">
                                          </td>
                                          <td>
                                              <?php echo ($v["l_name"]); ?>
                                          </td>
                                          <td>
                                              <?php echo ($v["click"]); ?>
                                          </td>
                                          <td>
                                              <?php echo ($v["price"]); ?>
                                          </td>
                                          <td>
                                              <?php echo (date('Y-m-d',$v["jointime"])); ?>
                                          </td>
                                          <td>
                                              <?php if(($v['is_king']) == "1"): ?>是
                                              <?php else: ?>
                                                  否<?php endif; ?>
                                          </td>
                                          <td>
                                              <?php echo ($v["ord"]); ?>
                                          </td>
                                          <td>
                                              <a href="<?php echo U('Admin/Designer/designer_edit/id/'.$v['id']);?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>                                        
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