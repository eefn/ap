<?php
namespace Admin\Controller;
use Think\Controller;
class ServiceController extends BaseController{
	//服务列表
	public function service_list(){
		
		$this->display();
	}

	//服务列表ajax
	public function ajaxService(){
        $search=isset($_GET['search'])?I('get.search'):NULL;
        $count=M('service')->where("max_title like '%$search%'")->count();
		$page=new \Think\Page($count,4);
		$show=$page->show();
		$service=M('service')->where("max_title like '%$search%'")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('offset',$offset);
		$this->assign('service',$service);
		$this->assign('show',$show);
		$this->display();
     }

	//服务添加
	public function service_add(){
		if(I('post.')){
			$data=array(
				'max_title'=>I('post.max_title'),
				'min_title'=>I('post.min_title'),
				'ord'=>I('post.ord'),
				);
			$upload=new \Think\Upload();
			$upload->maxSize=3145728;
			$upload->rootPath='./Public/';
			$upload->savePath='Upload/Service/';
			$upload->exts=array('jpg','gif','png','jpeg');
			$info=$upload->upload();
			if($info){
				foreach($info as $v){
					$data['image']=$v['savepath'].$v['savename'];
				}
			}else{
				$this->error($upload->getError());
				exit();
			}
			$res=M('service')->add($data);
			if($res){
				$this->success('添加成功',U('Admin/Service/service_list'));
				exit();
			}else{
				$this->error('数据输入有误，请重新输入');
				exit();
			}
		}
		$this->display();
	}

	//服务编辑
	public function service_edit(){
		if(I('post.')){
			$id=I('post.id');
			$data=array(
				'max_title'=>I('post.max_title'),
				'min_title'=>I('post.min_title'),
				'ord'=>I('post.ord'),
				);
			if(is_uploaded_file($_FILES['image']['tmp_name'])){
				$upload=new \Think\Upload();
				$upload->maxSize=3145728;
				$upload->rootPath='./Public/';
				$upload->savePath='Upload/Service/';
				$upload->exts=array('jpg','gif','png','jpeg');
				$info=$upload->upload();
				if($info){
					$old_img=M('service')->field('image')->where("id =$id")->find();
					$img='./Public/'.$old_img['image'];
					if(file_exists($img)){
						unlink($img);
					}
					foreach($info as $v){
						$data['image']=$v['savepath'].$v['savename'];
					}
				}else{
					$this->error($upload->getError());
					exit();
				}
			}
			$res=M('service')->where("id =$id")->save($data);
			if($res){
				$this->success('编辑成功',U('Admin/Service/service_list'));
				exit();
			}else{
				$this->error('数据输入有误，请重新输入');
				exit();
			}
		}else{
			$id=I('get.id');
			$service=M('service')->where("id =$id")->find();
			$this->assign('service',$service);
			$this->display();
		}
	}

	//服务删除
	public function service_del(){
		$del_id=I('post.del_id');
		$old_img=M('service')->field('image')->where("id =$del_id")->find();
		$res=M('service')->where("id =$del_id")->delete();
		if($res){
			$img='./Public/'.$old_img['image'];
			if(file_exists($img)){
				unlink($img);
			}
			echo 1;
			exit();
		}else{
			echo 0;
			exit();
		}
	}
}