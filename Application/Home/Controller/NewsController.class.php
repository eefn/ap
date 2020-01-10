<?php 
namespace Home\Controller;
use Think\Controller;
class NewsController extends CommonController{
	//文章
	public function news(){
		$news_cat=M('news_cat')->select();
		foreach ($news_cat as $key => $value) {
			$cat_id=$value['id'];
			$name=$value['name'];
			$news[$name]=M('news')->alias('n')->where("cat_id ='$cat_id'")->select();
			if($value['ord']==2){
				$tname=$value['name'];
			}
		}
		$this->assign('news_cat',$news_cat);
		$this->assign('name',$tname);
		$this->assign('news',$news);
		$this->display();
	}

	//文章详情
	public function news_art(){
		if(I('get.')){
			$id=I('get.id');
			$news=M('news')->where("id ='$id'")->find();
			$click=$news['click'];
			$click++;
			$data=array(
				'click'=>$click,
			);
			M('news')->where("id ='$id'")->save($data);
			$cat_id=$news['cat_id'];
			$news_cat=M('news_cat')->where("id='$cat_id'")->find();
			$this->assign('news_cat',$news_cat);
			$this->assign('news',$news);
			$this->display();
		}
		
	}
	public function news_more(){
		$id=I('get.id');
		$name=M('news_cat')->field('name')->where("id =$id")->find();
		$this->assign('name',$name['name']);
		$this->assign('id',$id);
		$this->display();

	}
	public function ajax_more(){
		$id=isset($_GET['id'])?I('get.id'):'';
		$count=M('news')->where("cat_id='$id'")->count();
		$page=new \Think\Page2($count,3);
		$show=$page->show();
		$news=M('news')->where("cat_id='$id'")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('show',$show);
		$this->assign('news',$news);
		$this->display();
	}
}