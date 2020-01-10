<?php
namespace Admin\Controller;
use Think\Controller;
class AboutController extends BaseController{
	public function __construct(){
			parent::__construct();
			$this->about=M('about');
			$this->nav=M('nav');
			date_default_timezone_set('PRC');
		}
		public function about_list(){
			
			$this->display();
		}

		//ajax
		public function ajaxAbout(){
	        $search=isset($_GET['search'])?I('get.search'):NULL;
	        $count=$this->about->where("name like '%$search%'")->count();
			$page=new \Think\Page($count,5);
			$show=$page->show();
			$about=$this->about->alias('a')->field("a.*,n.name as nn")->join("left join ap_nav as n on a.nid=n.id")->where("a.name like '%$search%'")->limit($page->firstRow.','.$page->listRows)->select();
			$offset=$page->firstRow*1;
			$this->assign('offset',$offset);
			$this->assign('show',$show);
			$this->assign('about',$about);
	        $this->display();
	     }

		public function about_add(){
			if(I('post.')){
				$rules=array(
					array('name','require','名字不能留空'),
					array('name','','名字不能重复',0,'unique',1),
				);
				if(!$this->about->validate($rules)->create()){
					$this->error($this->about->getError());
					exit();
				}
				$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
				$data=array(
					'name'=>I('post.name'),
					'content'=>I('post.content'),
					'addtime'=>$addtime,
					'ord'=>I('post.ord'),
					'nid'=>I('post.nid'),
				);
				$res=$this->about->add($data);
				if($res){
					$this->success('添加成功',U('Admin/About/about_list'));
					exit();
				}else{
					$this->error('添加失败');
				}
			}else{
				$nav=$this->nav->select();
				$this->assign('nav',$nav);
				$this->display();
			}
		}
		public function about_edit(){
			if(I('post.')){
				$id=I('post.id');
				$rules=array(
					array('name','require','名字不能留空'),
					array('name','','名字不能重复',0,'unique',2),
				);
				if(!$this->about->validate($rules)->create()){
					$this->error($this->about->getError());
					exit();
				}
				$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
				$data=array(
					'name'=>I('post.name'),
					'content'=>I('post.content'),
					'addtime'=>$addtime,
					'ord'=>I('post.ord'),
					'nid'=>I('post.nid'),
				);
				$res=$this->about->where("id='$id'")->save($data);
				if($res){
					$this->success('编辑成功',U('Admin/About/about_list'));
					exit();
				}else{
					$this->error('编辑失败');
				}
			}else{
				$id=I('get.id');
				$nav=$this->nav->select();
				$about=$this->about->where("id ='$id'")->find();
				$this->assign('nav',$nav);
				$this->assign('about',$about);
				$this->display();
			}
		}

			public function about_del(){
		$id=I('post.del_id');
		$res=$this->about->where("id='$id'")->delete();
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