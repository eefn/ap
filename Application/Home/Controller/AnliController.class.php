<?php 
namespace Home\Controller;
use Think\Controller;
class AnliController extends CommonController{
	//案例
	public function anli(){
		$style=M('house_style')->select();
		$type=M('house_type')->select();
		$budget=M('house_budget')->select();
		$this->assign('style',$style);
		$this->assign('type',$type);
		$this->assign('budget',$budget);
		$this->display();
	}
	//ajax案例
	public function ajaxAnli(){
		$search=isset($_GET['search'])?I('get.search'):NULL;
		$where=array(
			'house_name'=>array('like',"%$search%"),
		);
		$data=array(
			'style_id'=>I('get.style_id'),
			'budget_id'=>I('get.budget_id'),
			'type_id'=>I('get.type_id'),
		);
		foreach($data as $key=>$value){
			if($value==0){
				continue;
			}else{
				$where[$key]=$value;
			}
		}
		if(I('get.hot_now')==1){
			$order="buy desc";
		}else if(I('get.hot_now')==0){
			$order="addtime desc";
		}else{
			$order="ord desc";
		}
		$count=M('house')->where($where)->count();
		$Page=new \Think\Page2($count,6);
		$show=$Page->show();
		$house=M('house')
			  ->where($where)
			  ->order($order)
			  ->limit($Page->firstRow.','.$Page->listRows)
			  ->select();
		$style=M('house_style')->select();
		$this->assign('house',$house);
		$this->assign('style',$style);
		$this->assign('show',$show);
		$this->display();
	}

	//案例详情
	public function anli_art(){
		$id=I('get.id');
		$house=M('house')->where("id =$id")->find();
		$style=M('house_style')->select();
		$type=M('house_type')->select();
		$this->assign('house',$house);
		$this->assign('style',$style);
		$this->assign('type',$type);
		$this->display();
	}
	public function guestbook(){
		if(I('post.')){
			$rules=array(
				array('guestbook_name','require','称呼不能为空'),
				array('phone','require','手机号码不能为空'),
				array('level','require','档次不能为空'),
				array('area','require','面积不能为空'),
			);
			if(!M('guestbook')->validate($rules)->create()){
					echo '请填好内容!!';
					exit();
				}
			$data=array(
				'guestbook_name'=>I('post.guestbook_name'),
				'phone'=>I('post.phone'),
				'level'=>I('post.level'),
				'area'=>I('post.area'),
				'addtime'=>time(),
				'is_read'=>0,
			);
			$res=M('guestbook')->add($data);
			if($res){
				echo 1;
				exit();
			}else{
				echo 2;
				exit();
			}
		}
	}
}