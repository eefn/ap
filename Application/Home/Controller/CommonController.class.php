<?php 
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
	public function __construct(){
		header('Content-Type:text/html;charset=utf-8');
		parent::__construct();
		$nav=M('nav')->order('ord ASC')->select();
		$nav_list=array();
		foreach($nav as $v){
			if($v['pid']==0){
				$nav_list[]=$v;
			}
		}

		foreach($nav as $value){
			if($value['pid']==0){
				continue;
			}
			
			foreach($nav_list as $k=>$v){
				$id=$v['id'];
				if($value['pid']==$v['id']){
					$nav_list[$k]['son'][]=$value;
				}
			}
		}
		foreach($nav_list as $k=>$v){
				$id=$v['id'];
				$cat=M('news_cat')->where("nid ='$id'")->select();
				foreach ($cat as $ke => $val) {
					$nav_list[$k]['cat'][]=$val;
				}
			}
		foreach($nav_list as $k=>$v){
				$id=$v['id'];
				$about=M('about')->field('id,name')->where("nid =$id")->select();
				foreach ($about as $ke => $val) {
						$nav_list[$k]['about'][]=$val;
				}
			}
		$designer_lv=M('designer_lv')->field('name,id')->select();
		$this->assign('designer_lv',$designer_lv);
		$this->assign('nav_list',$nav_list);
	}
}