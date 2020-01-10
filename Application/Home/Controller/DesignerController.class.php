<?php 
namespace Home\Controller;
use Think\Controller;
class DesignerController extends CommonController{
	//设计师
	public function designer(){
		$designer_style=M('house_style')->select();
		$designer_lv=M('designer_lv')->select();
		$get_id=isset($_GET['id'])?I('get.id'):'';
		$this->assign('get_id',$get_id);
		$this->assign('designer_style',$designer_style);
		$this->assign('designer_lv',$designer_lv);
		$this->display();
	}
	//设计师ajax
	public function ajaxdesigner(){
		$where='';
		if(isset($_GET['search'])){
			$search=$_GET['search'];
			$where.="d.designer_name LIKE '%$search%' AND";
		}
		if($_GET['style_id']!=0){
			$style_id=$_GET['style_id'];
			$where.=" c.style_id =$style_id AND";
		}
		if($_GET['lv_id']!=0){
			$lv_id=$_GET['lv_id'];
			$where.=" l.id =$lv_id AND";
		}
		$where=rtrim($where,'AND');
		/*$cat=array(
			'style_id'=>I('get.style_id')==0?'':I('get.style_id'),
			'lv_id'=>I('get.lv_id')==0?'':I('get.lv_id'),
		);
		//echo json_encode($cat);die;
		$data='';
		foreach($cat as $k=>$v){
			if($v==''){
				continue;
			}
			$data.=$k.'='.$v.' and ';
		}
		$data1=$data."name LIKE '%$search%'";
		$data.="d.name LIKE '%$search%'";*/
		//echo $where;die;
		$count=M('designer')->alias('d')
				->join("left join ap_designer_lv as l on d.lv_id=l.id")
				->join("left join ap_designer_common as c on d.id=c.designer_id")
				->join("left join ap_house_style as s on s.id=c.style_id")
				->where($where)
				->group('d.id')
				->select();
		$count=count($count);
		$page=new \Think\Page1($count,4);
		$show=$page->show();
		$designer=M('designer')->alias('d')
				->field('d.*,l.name as l_name')
				->join("left join ap_designer_lv as l on d.lv_id=l.id")
				->join("left join ap_designer_common as c on d.id=c.designer_id")
				->join("left join ap_house_style as s on s.id=c.style_id")
				->where($where)
				->group('d.id')
				->order('d.jointime desc')
				->limit($page->firstRow.','.$page->listRows)
				->select();
			// echo M('designer')->getLastSql();die;
		$this->assign('designer',$designer);
		$this->assign('show',$show);
		$this->display();
	}

	//设计师详情
	public function designer_art(){
		$id=isset($_GET['id'])?I('get.id'):false;
		$designer=M('designer')->alias('d')
				->field('d.*,l.name as l_name')
				->join("left join ap_designer_lv as l on d.lv_id=l.id")
				->where("d.id =$id")
				->order('jointime desc')
				->limit($page->firstRow.','.$page->listRows)
				->find();
		$count=M('house')->where("designer_id =$id")->count();
		$this->assign('designer',$designer);
		$this->assign('count',$count);
		$this->display();
	}

	//设计师详情ajax
	public function ajaxdesigner_art(){
		$designer_id=I('get.designer_id');
		$count=M('house')->where("designer_id =$designer_id")->count();
		$page=new \Think\Page1($count,3);
		$show=$page->show();
		$house=M('house')->where("designer_id =$designer_id")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('house',$house);
		$this->assign('show',$show);
		$this->display();
	}
}