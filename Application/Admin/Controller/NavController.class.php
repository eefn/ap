<?php
namespace Admin\Controller;
use Think\Controller;
class NavController extends BaseController{
	public function __construct(){
			parent::__construct();
			$this->nav=M('nav');
			date_default_timezone_set('PRC');
		}
		public function nav_list(){
			$this->display();
		}
		public function ajaxPro(){
			$id=isset($_GET['id'])?I('get.id'):0;
			$search=isset($_GET['search'])?I('get.search'):NULL;
			if($search==null){
				$count=$this->nav->where("pid='$id'")->count();
			}else{
				$count=$this->nav->where("pid='$id' AND name like '%$search%'")->count();
				
			}
			$page=new \Think\Page($count,5);
			$show=$page->show();
			if($search==null){
				$nav=$this->nav->where("pid='$id'")->limit($page->firstRow.','.$page->listRows)->select();
			}else{
				$nav=$this->nav->where("pid='$id' && name like '%$search%'")->limit($page->firstRow.','.$page->listRows)->select();
			}
			
			foreach ($nav as $key => $value) {
				
			}
			$offset=$page->firstRow*1;
			$this->assign('offset',$offset);
			$this->assign('nav',$nav);
			$this->assign('show',$show);
			$this->display();
		}
		public function nav_add(){
			if(I('post.')){
				$rules=array(
					array('name','require','导航名不能为空'),
					array('name','','导航名不能重复',0,'unique',1),
					);
				if(!$this->nav->validate($rules)->create()){
					$this->error($this->nav->getError());
					exit();
				}
				$data=array(
					'name'=>I('post.name'),
					'url'=>I('post.url'),
					'pid'=>I('post.pid'),
					'ord'=>I('post.ord'),
					);
				$res=$this->nav->where("pid='$id'")->add($data);
				if($res){
					$this->success('添加成功',U('Admin/Nav/nav_list/id/'.$id));
					exit();
				}else{
					$this->error('添加失败');
					exit();
				}
			}else{
				$nav=$this->nav->where("pid =0")->select();
				foreach ($nav as $key => $value) {
					$id=$value['id'];
					$nav[$key]['son']=$this->nav->where("pid=$id")->select();
				}
				$this->assign('nav',$nav);
				$this->display();
			}
		}
		public function nav_edit(){
			if(I('post.')){
				$id=I('post.id');
				$rules=array(
					array('name','require','导航名不能为空'),
					array('name','','导航名不能重复',0,'unique',2),
					);
				if(!$this->nav->validate($rules)->create()){
					$this->error($this->nav->getError());
					exit();
				}
				$data=array(
					'name'=>I('post.name'),
					'pid'=>I('post.pid'),
					'url'=>I('post.url'),
					'ord'=>I('post.ord'),
					);
				$res=$this->nav->where("id='$id'")->save($data);
				if($res){
					$this->success('编辑成功',U('Admin/Nav/nav_list'));
					exit();
				}else{
					$this->error('编辑失败');
					exit();
				}
			}else{
				$id=I('get.id');
				$nav=$this->nav->where("id='$id'")->find();
				$mnav=$this->nav->where("pid =0")->select();
				foreach ($mnav as $key => $value) {
					$id=$value['id'];
					$mnav[$key]['son']=$this->nav->where("pid=$id")->select();
				}
				$this->assign('mnav',$mnav);
				$this->assign('nav',$nav);
				$this->display();
			}
		}
		public function nav_del(){
			$id=I('post.del_id');
			$res=$this->nav->where("id='$id'")->delete();
			if($res){
				echo 1;
				exit();
			}else{
				echo 0;
				exit();
			}
		}
}
?>