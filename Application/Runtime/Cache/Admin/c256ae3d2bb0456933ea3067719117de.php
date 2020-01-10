<?php if (!defined('THINK_PATH')) exit(); if(is_array($service)): foreach($service as $key=>$v): ?><tr>
                                          <td>
                                              <?php echo ++$offset;?>
                                          </td>
                                          <td>
                                              <?php echo ($v["max_title"]); ?>
                                          </td>
                                          <td>
                                              <?php echo ($v["min_title"]); ?>
                                          </td>
                                          <td>
                                              <img src="/ap/Public/<?php echo ($v["image"]); ?>" alt="" style="width:50px;height:50px;">
                                          </td>
                                          <td>
                                              <?php echo ($v["ord"]); ?>
                                          </td>
                                          <td>
                                              <a href="<?php echo U('Admin/Service/service_edit/id/'.$v['id']);?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>                                        
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