<?php
namespace Admin\Controller;
use Think\Controller;
class GuestbookController extends BaseController {
    public function guestbook_list(){

        $this->display();
     }
     public function ajaxPro(){
        $search=isset($_GET['search'])?I('get.search'):NULL;
        $count=M('guestbook')->where("guestbook_name like '%$search%'")->count();
        $Page=new \Think\Page2($count,5);
        $show=$Page->show();
        $guestbook=M('guestbook')
        ->where("guestbook_name like '%$search%'")
        ->order("addtime desc")
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
        $this->assign('guestbook',$guestbook);
        $this->assign('show',$show);
        $this->assign('a',$Page->firstRow+1);
        $this->display();
     }

     public function guestbook_edit(){
        if(I('post.')){
            
            $rules = array(
                 array('guestbook_name','require','风格名必须！'), 
                  array('guestbook_name','','风格名称已经存在！',0,'unique',2), 
                );
            if(!M('guestbook')->validate($rules)->create()){
                $this->error(M('guestbook')->getError());
                exit();
            }   
            $id=I('post.id'); 
            $time=!empty($_POST['addtime'])?strtotime(I('post.addtime')):time();
            $data=array(
               'guestbook_name'=>I('post.guestbook_name'),
                'addtime'=>$time,
                'phone'=>I('post.phone'),
                'level'=>I('post.level'),
                'area'=>I('post.area'),
                'is_read'=>I('post.is_read'),
                );
            
             $res=M('guestbook')->where("id = $id")->save($data);
             if($res){
                $this->success("编辑成功",U('Admin/Guestbook/guestbook_list'));
                exit();
             }else{
                $this->error("数据输入有误，请重新编辑");
                exit();
             }

        }else{

            $id=I('get.id');
            $guestbook=M('guestbook')->where("id=$id")->find();
            $this->assign('guestbook',$guestbook);
            $this->display();
        }
        
     }
     public function guestbook_del(){
        $del_id=I('post.del_id');
        $guestbook=M('guestbook')->where("id = $del_id")->find();
        if($guestbook['is_read']==0){
                echo '请阅读后再删除';
                exit();
        }
        $res=M('guestbook')->where("id = $del_id")->delete();
        if($res){
            echo 1;exit();
        }else{
            echo 0;exit();
        }
    }
    public function click(){
        $click=isset($_GET['click'])?I('get.click'):NULL;
        $is_read=isset($_GET['is_read'])?I('get.is_read'):NULL;
        if($click){
          if($is_read==0){
            $data=array(
                  'is_read'=>1,
                  );
          }else if($is_read==1){
              $data=array(
                  'is_read'=>0,
                  );
          }
          
          $res=M('guestbook')->where("id = $click")->save($data);
          $is_read=M('guestbook')->where("id = $click")->find();
          if($res){
                echo $is_read['is_read'];
                exit();
             }else{
                echo 3;
                exit();
             }

        }
    }
}