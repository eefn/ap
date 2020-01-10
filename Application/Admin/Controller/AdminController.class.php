<?php 
namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController{
	public function admin_list(){
		//管理员列表
		
		$this->display();
	}

	//管理员ajax
	public function ajaxAdmin(){
        $search=isset($_GET['search'])?I('get.search'):NULL;
        $count=M('admin')->where("name like '%$search%'")->count();
		$page=new \Think\Page($count,4);
		$show=$page->show();
		$admin=M('admin')
				->where("name like '%$search%'")
				->order('lasttime desc')
				->limit($page->firstRow.','.$page->listRows)
				->select();
		$this->assign('admin',$admin);
		$this->assign('offset',$page->firstRow);
		$this->assign('show',$show);
        $this->display();
     }

	//添加管理员
	public function admin_add(){
		if(I('post.')){
			$rules=array(
				array('name','','该用户名已存在','0','unique','1'),
				array('pwd','require','密码不能为空!'),
			);
			if(!M('admin')->validate($rules)->create()){
				$this->error(M('admin')->getError());
			}
			$lasttime=I('post.lasttime')?strtotime(I('post.lasttime')):time();
			$data=array(
				'name'=>I('post.name'),
				'pwd'=>md5(I('post.pwd')),
				'lasttime'=>$lasttime,
			);
			$upload=new \Think\Upload();
			$upload->maxSize=3145728;
			$upload->rootPath='./Public/';
			$upload->savePath='Upload/Admin/';
			$upload->exts=array('jpg','png','gif','jpeg');
			$info=$upload->upload();
			if($info){
				foreach($info as $v){
					$data['image']=$v['savepath'].$v['savename'];
				}
			}else{
				$this->error($upload->getError());
				exit();
			}
			$res=M('admin')->add($data);
			if($res){
				$this->success('添加成功',U('Admin/Admin/admin_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}	
		$this->display();
	}

	//编辑管理员
	public function admin_edit(){
		if(I('post.')){
			$rules=array(
				array('name','','该用户名已存在','0','unique','1'),
				array('pwd','require','密码不能为空!'),
			);
			if(!M('admin')->validate($rules)->create()){
				$this->error(M('admin')->getError());
			}
			$id=I('post.id');
			$pwd=I('post.pwd');
			$pwd=M('admin')->field('pwd')->where("id =$id and pwd ='$pwd'")->find()?$pwd:md5($pwd);
			$lasttime=I('post.lasttime')?strtotime(I('post.lasttime')):time();
			$data=array(
				'name'=>I('post.name'),
				'pwd'=>$pwd,
				'lasttime'=>$lasttime,
			);
			if(is_uploaded_file($_FILES['image']['tmp_name'])){
				$upload=new \Think\Upload();
				$upload->maxSize=3145728;
				$upload->rootPath='./Public/';
				$upload->savePath='Upload/Admin/';
				$upload->exts=array('jpg','png','gif','jpeg');
				$info=$upload->upload();
				if($info){
					$old_img=M('admin')->field('image')->where("id =$id")->find();
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
			$res=M('admin')->where("id =$id")->save($data);
			if($res){
				$this->success('编辑成功',U('Admin/Admin/admin_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}else{
			$id=I('get.id');
			$admin=M('admin')->where("id =$id")->find();
			$this->assign('admin',$admin);
			$this->display();
		}
	}

	//删除管理员
	public function admin_del(){
		$del_id=I('post.del_id');
		$old_img=M('admin')->field('image')->where("id =$del_id")->find();
		$res=M('admin')->where("id =$del_id")->delete();
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