<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends BaseController{
	public function __construct(){
			parent::__construct();
			$this->news=M('news');
			$this->news_cat=M('news_cat');
			$this->nav=M('nav');
			date_default_timezone_set('PRC');
		}
	public function news_list(){
		
		
		$this->display();
	}

	//文章ajax
	public function ajaxNews(){
		$search=isset($_GET['search'])?I('get.search'):NULL;
		$count=$this->news->alias('n')->field('n.*,c.name as cn')->join("left join ap_news_cat as c on n.cat_id=c.id")->where("n.title like '%$search%'")->count();
		$page=new \Think\Page($count,5);
		$show=$page->show();
		$news=$this->news->alias('n')->field('n.*,c.name as cn')->join("left join ap_news_cat as c on n.cat_id=c.id")->where("n.title like '%$search%'")->limit($page->firstRow.','.$page->listRows)->select();
		$offset=$page->firstRow*1;
		$this->assign('offset',$offset);
		$this->assign('show',$show);
		$this->assign('news',$news);
        $this->display();
     }

	public function news_add(){
		if(I('post.')){
			$rules=array(
				array('title','require','标题不能为空'),
				array('title','','标题重复了',0,'unique',1),
			);
			if(!$this->news->validate($rules)->create()){
    			$this->error($this->news->getError());
    			exit();
    		}
    		$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
    		$data=array(
    			'cat_id'=>I('post.cat_id'),
    			'content'=>I('post.content'),
    			'title'=>I('post.title'),
    			'ord'=>I('post.ord'),
    			'addtime'=>$addtime,
    		);
    		if($_FILES['image']['size']){
    			$upload=new \Think\Upload();
    			$upload->maxsize=3145728;
    			$upload->exts =array('jpg','gif','png','jpeg');
    			$upload->rootPath='./Public/';
				$upload->savePath='Upload/News/';
				$info=$upload->upload();
				if(!$info){
					$this->error($upload->error());
					exit();
				}else{
					$image = new \Think\Image(); 
					foreach ($info as $key => $value) {
						$data['image']=$value['savepath'].$value['savename'];
						$img_path='./Public/'.$value['savepath'].$value['savename'];
			            $thumb_path='./Public/Thumb/'.$value['savepath'].$value['savename'];
			            if(!is_dir('./Public/Thumb/'.$value['savepath'])){
		                mkdir('./Public/Thumb/'.$value['savepath'],0777,true);
		                $image->open($img_path);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
          				$image->thumb(50, 50)->save($thumb_path);
					}
				}
    		}
		}
		$res=$this->news->add($data);
		if($res){
			$this->success('添加成功',U('Admin/News/news_list'));
			exit();
		}else{
			$this->error('添加失败');
			exit();
		}
	}else{
		$news_cat=$this->news_cat->select();
		$this->assign('news_cat',$news_cat);
		$this->display();
	}
	
}
	
	public function news_edit(){
		if(I('post.')){
			$id=I('post.id');
			$rules=array(
				array('title','require','标题不能为空'),
				array('title','','标题重复了',0,'unique',2),
			);
			if(!$this->news->validate($rules)->create()){
    			$this->error($this->news->getError());
    			exit();
    		}
    		$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
    		$data=array(
    			'cat_id'=>I('post.cat_id'),
    			'title'=>I('post.title'),
    			'ord'=>I('post.ord'),
    			'addtime'=>$addtime,
    			'content'=>I('post.content'),
    		);
    		if($_FILES['image']['size']){
    			$upload=new \THink\Upload();
    			$upload->maxsize=3145728;
    			$upload->exts =array('jpg','gif','png','jpeg');
    			$upload->rootPath='./Public/';
				$upload->savePath='Upload/News/';
				$info=$upload->upload();
				if(!$info){
					$this->error($upload->error());
					exit();
				}else{
					$image = new \Think\Image(); 
					foreach ($info as $key => $value) {
						$data['image']=$value['savepath'].$value['savename'];
						$img_path='./Public/'.$value['savepath'].$value['savename'];
			            $thumb_path='./Public/Thumb/'.$value['savepath'].$value['savename'];
			            if(!is_dir('./Public/Thumb/'.$value['savepath'])){
		                mkdir('./Public/Thumb/'.$value['savepath'],0777,true);
		                $image->open($img_path);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
          				$image->thumb(50, 50)->save($thumb_path);
					}
				}
    		}

		}
		$res=$this->news->where("id ='$id'")->save($data);
		if($res){
			$this->success('编辑成功',U('Admin/News/news_list'));
			exit();
		}else{
			$this->error('编辑失败');
			exit();
		}
	}else{
		$id=I('get.id');
		$news_cat=$this->news_cat->select();
		$news=$this->news->where("id ='$id'")->find();
		$this->assign('news',$news);
		$this->assign('news_cat',$news_cat);
		$this->display();
	}
	
	}
	public function news_del(){
		$del_id=I('post.del_id');
		$old_img=M('news')->field('image')->where("id =$del_id")->find();
		$res=$this->news->where("id ='$del_id'")->delete();
		if($res){
			$img='./Public/'.$old_img['image'];
			$timg='.Thunm/'.$old_img['image'];
			if(file_exists($img)){
				unlink($img);
			}
			if(file_exists($timg)){
				unlink($timg);
			}
			echo 1;
			exit();
		}else{
			echo 0;
			exit();
		}
	}
	public function news_cat_list(){
		
		$this->display();
	} 

	//文章分类ajax
	public function ajaxNews_cat(){
        $search=isset($_GET['search'])?I('get.search'):NULL;
        $count=$this->news_cat->where("name like '%$search%'")->count();
		$page=new \Think\Page($count,5);
		$show=$page->show();
		$news_cat=$this->news_cat->alias('c')->field("c.*,n.name as nn")->join("left join ap_nav as n on c.nid=n.id")->where("c.name like '%$search%'")->limit($page->firstRow.','.$page->listRows)->select();
		$offset=$page->firstRow*1;
		$this->assign('offset',$offset);
		$this->assign('show',$show);
		$this->assign('news_cat',$news_cat);
        $this->display();
     }

	public function news_cat_add(){
		if(I('post.')){
			$rules=array(
				array('name','require','分类名不能为空'),
				array('name','','分类名不能重复',0,'unique',1),
			);
			if(!$this->news_cat->validate($rules)->create()){
				$this->error($this->news_cat)->getError();
				exit();
			}
			$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
			$data=array(
				'name'=>I('post.name'),
				'addtime'=>$addtime,
				'ord'=>I('post.ord'),
				'nid'=>I('post.nid'),
			);
			$res=$this->news_cat->add($data);
			if($res){
				$this->success('添加成功',U('Admin/News/news_cat_list'));
				exit();
			}else{
				$this->error('添加失败');
				exit();
			}
		}
		$nav=$this->nav->select();
		$this->assign('nav',$nav);
		$this->display();
	}
	public function news_cat_edit(){
		if(I('post.')){
			$ruels=array(
				array('name','require','分类名不能为空'),
				array('name','','分类名不能重复',0,'unique','2'),
			);
			if(!$this->news_cat->validate($rules)->create()){
				$this->error($this->news_cat)->getError();
			}
			$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
			$data=array(
				'name'=>I('post.name'),
				'addtime'=>$addtime,
				'ord'=>I('post.ord'),
				'nid'=>I('post.nid'),
			);
			$res=$this->news_cat->save($data);
			if($res){
				$this->success('编辑成功',U('Admin/News/news_cat_list'));
				exit();
			}else{
				$this->error('编辑失败');
			}
		}else{
			$id=I('get.id');
			$nav=$this->nav->select();
			$news_cat=$this->news_cat->where("id ='$id'")->find();
			$this->assign('news_cat',$news_cat);
			$this->assign('nav',$nav);
			$this->display();
		}
	}
	public function news_cat_del(){
		$del_id=I('post.del_id');
		$result=M('News')->where("cat_id =$del_id")->find();
		if($result){
			echo '存在该分类文章,无法删除此分类';
			exit();
		}
		$res=$this->news_cat->where("id ='$del_id'")->delete();
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