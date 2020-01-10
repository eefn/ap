<?php 
namespace Admin\Controller;
use Think\Controller;
class BannerController extends BaseController{
	//轮播图列表
	public function banner_list(){
		$count=M('banner')->count();
		$page=new \Think\Page($count,5);
		$show=$page->show();
		$banner=M('banner')->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('offset',$offset);
		$this->assign('banner',$banner);
		$this->assign('show',$show);
		$this->display();
	}

	//轮播图添加
	public function banner_add(){
		if(I('post.')){
			$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
			$data=array(
				'addtime'=>$addtime,
				'ord'=>I('post.ord'),
				);
			$upload=new \Think\Upload();
			$upload->maxSize=3145728;
			$upload->rootPath='./Public/';
			$upload->savePath='Upload/Banner/';
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
			$res=M('banner')->add($data);
			if($res){
				$this->success('添加成功',U('Admin/Banner/banner_list'));
				exit();
			}else{
				$this->error('数据输入有误，请重新输入');
				exit();
			}
		}
		$this->display();
	}

	//轮播图编辑
	public function banner_edit(){
		if(I('post.')){
			$id=I('post.id');
			$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
			$data=array(
				'addtime'=>$addtime,
				'ord'=>I('post.ord'),
				);
			if(is_uploaded_file($_FILES['image']['tmp_name'])){
				$upload=new \Think\Upload();
				$upload->maxSize=3145728;
				$upload->rootPath='./Public/';
				$upload->savePath='Upload/Banner/';
				$upload->exts=array('jpg','gif','png','jpeg');
				$info=$upload->upload();
				if($info){
					$old_img=M('banner')->field('image')->where("id =$id")->find();
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
			$res=M('banner')->where("id =$id")->save($data);
			if($res){
				$this->success('编辑成功',U('Admin/Banner/banner_list'));
				exit();
			}else{
				$this->error('数据输入有误，请重新输入');
				exit();
			}
		}else{
			$id=I('get.id');
			$banner=M('banner')->where("id =$id")->find();
			$this->assign('banner',$banner);
			$this->display();
		}
	}

	//轮播图删除
	public function banner_del(){
		$del_id=I('post.del_id');
		$old_img=M('banner')->field('image')->where("id =$del_id")->find();
		$res=M('banner')->where("id =$del_id")->delete();
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