<?php if (!defined('THINK_PATH')) exit(); if(is_array($house)): foreach($house as $key=>$value): ?><tr>
    <td >
        <?php echo ($a++); ?>
    </td>
    <td>
        <img alt="image" class="" src="/Public/Thumb/<?php echo ($value["image"]); ?>" style="width: 150px;height: 100px;" />
    </td>
    <td >
        <?php echo ($value["house_name"]); ?>
    </td>
    <td >
        <?php echo ($value["style_name"]); ?>
    </td>
    <td >
        <?php echo ($value["type_name"]); ?>
    </td>
    <td >
        <?php echo ($value["size"]); ?>m&sup2
    </td>
    <td >
        <?php echo ($value["designer_name"]); ?>
    </td>
    <td>
       <?php echo ($value["all_price"]); ?>万
    </td>
    <td>
       <?php echo (date("Y-m-d",$value["addtime"])); ?>
    </td>
    <td>
        <a href="<?php echo U('Admin/House/house_edit/id/'.$value['id']);?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>                                        
        <a href="javascript:void(0)" class="btn btn-white btn-sm del" del_id="<?php echo ($value["id"]); ?>"><i class="fa fa-trash"></i> 删除 </a>
    </td>
</tr><?php endforeach; endif; ?>
<tr>
    <td colspan="10" class="page" style="padding: 15px 10px;border:none;">
        <div id="editable_paginate" class="dataTables_paginate paging_simple_numbers">
          <ul class="pagination page" style="margin: 0;">
            <?php echo ($show); ?>
          </ul>
        </div>
    </td>
</tr>
<script>
   $(".del").click(function() {
        var del_id=$(this).attr("del_id");
        var tr=$(this).parent('td').parent('tr');
          swal({
              title: "您确定要删除这条信息吗",
              text: "删除后将无法恢复，请谨慎操作！",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#1647a1",
              confirmButtonText: "确定",
              cancelButtonText: "取消",
              closeOnConfirm: false,
              closeOnCancel: false
          }, function(isConfirm) {
              if (isConfirm) {
                $.ajax({
                  type:'post',
                  url:"<?php echo U('Admin/House/house_del');?>",
                  data:"del_id="+del_id,
                  dataType:'text',
                  success:function(z){
                    if(z){
                      swal("删除成功！", "您已经永久删除了这条信息。", "success");
                      tr.remove();
                    }else{
                      swal("数据输入有误", "请联系管理员");
                    }
                  }
                });
              } else {
                  swal("已取消", "您取消了删除操作！", "error")
              }
          })
  })
</script>